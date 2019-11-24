<?php
namespace Finder\Logic\Output;

use Finder\Logic\AnalysisResult;

class JsonOutput extends AbstractOutput
{
    /**
     * @inheritdoc
     */
    public function result(AnalysisResult $result)
    {
        $this->cli->out(json_encode($result->toArray()));
    }
}
