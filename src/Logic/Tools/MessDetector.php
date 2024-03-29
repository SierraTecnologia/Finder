<?php
namespace Finder\Logic\Tools;

use Finder\Logic\AnalysisResult;
use Muleta\Helps\ArrayHelper;
use Sabre\Xml\Reader;

/**
 * Integration of CodeAnalyser with MessDetector.
 *
 * @see https://github.com/phpmd/phpmd
 */
class MessDetector extends AbstractTool
{
    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'MessDetector';
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getIgnoredArgument(): string
    {
        if (!empty($this->ignoredPaths)) {
            return '--exclude ' . implode(',', $this->ignoredPaths) . ' ';
        }
        return '';
    }

    /**
     * @inheritdoc
     */
    public function getCommand($targetPaths)
    {
        return $this->binariesPath . 'phpmd ' . implode(',', $targetPaths) . ' '
            . 'xml cleancode,codesize,controversial,design,naming,unusedcode '
            . $this->getIgnoredArgument() . '> "'
            . $this->temporaryFilePath . '"';
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
                $line = $issueTag['attributes']['beginline'];
                $tool = 'MessDetector';
                $type = $issueTag['attributes']['rule'];
                $message = $issueTag['value'];

                $this->result->addIssue($fileName, $line, $tool, $type, $message);
            }
        }
    }
}
