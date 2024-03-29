<?php
namespace Finder\Logic\Tools;

use Finder\Logic\AnalysisResult;
use Muleta\Helps\ArrayHelper;
use Sabre\Xml\Reader;

/**
 * Integration of CodeAnalyser with CopyPasteDetector.
 *
 * @see https://github.com/sebastianbergmann/phpcpd
 */
class CopyPasteDetector extends AbstractTool
{
    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'CopyPasteDetector';
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getIgnoredArgument(): string
    {
        if (!empty($this->ignoredPaths)) {
            return '--exclude={' . implode(',', $this->ignoredPaths) . '} ';
        }
        return '';
    }

    /**
     * @inheritdoc
     */
    public function getCommand($targetPaths)
    {
        return $this->binariesPath . 'phpcpd '
            . implode(' ', $targetPaths) . ' '
            . $this->getIgnoredArgument() . '--log-pmd="'
            . $this->temporaryFilePath . '"';
    }

    /**
     * @inheritdoc
     */
    protected function addIssuesFromXml(Reader $xml)
    {
        $xmlArray = $xml->parse();

        foreach ((array) $xmlArray['value'] as $duplicationTag) {
            if ($duplicationTag['name'] != '{}duplication'
                || empty($duplicationTag['value'])
            ) {
                continue;
            }

            foreach ((array) $duplicationTag['value'] as $fileTag) {
                if ($fileTag['name'] != '{}file') {
                    continue;
                }

                $fileName = $fileTag['attributes']['path'];
                $line = $fileTag['attributes']['line'];
                $tool = 'CopyPasteDetector';
                $type = 'duplication';
                $message = 'Duplicated code';

                $this->result->addIssue($fileName, $line, $tool, $type, $message);
            }
        }
    }
}
