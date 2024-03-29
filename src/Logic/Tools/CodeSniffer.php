<?php
namespace Finder\Logic\Tools;

use Finder\Logic\AnalysisResult;
use Muleta\Helps\ArrayHelper;
use Sabre\Xml\Reader;

/**
 * Integration of CodeAnalyser with CodeSniffer.
 *
 * @see https://github.com/squizlabs/PHP_CodeSniffer
 */
class CodeSniffer extends AbstractTool
{
    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'CodeSniffer';
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getIgnoredArgument(): string
    {
        if (!empty($this->ignoredPaths)) {
            return '--ignore=' . implode(',', $this->ignoredPaths) . ' ';
        }
        return '';
    }

    /**
     * @inheritdoc
     */
    public function getCommand($targetPaths)
    {
        return $this->binariesPath . 'phpcs -p --standard=PSR2 --report=xml '
            . $this->getIgnoredArgument() . '--report-file="'
            . $this->temporaryFilePath . '" ' . implode(' ', $targetPaths);
    }

    /**
     * @inheritdoc
     */
    protected function addIssuesFromXml(Reader $xml)
    {
        $xmlArray = $xml->parse();

        foreach ((array) $xmlArray['value'] as $fileTag) {
            if ($fileTag['name'] != '{}file') {
                continue;
            }

            $fileName = $fileTag['attributes']['name'];

            foreach ((array) $fileTag['value'] as $issueTag) {
                $line = $issueTag['attributes']['line'];
                $tool = 'CodeSniffer';
                $type = $issueTag['attributes']['source'];
                $message = $issueTag['value'];

                $this->result->addIssue($fileName, $line, $tool, $type, $message);
            }
        }
    }
}
