<?php
/**
 * 
 */

namespace Finder\Components\Worker\Sync\Keys;

use Fabrica\Tools\Databases\Mysql\Mysql as MysqlTool;
use Integrations\Models\Token;
use Integrations\Connectors\Sentry\Sentry;
use Integrations\Connectors\Jira\Jira;
use Integrations\Connectors\Gitlab\Gitlab;
use Log;
use Support\Contracts\Runners\ActionInterface;

class ImportFromToken implements ActionInterface
{

    protected $token = false;

    public function __construct(Token $token)
    {
        $this->token = $token;
    }

    public function execute()
    {
        if (!$this->token->account || !$this->token->account->status) {
            return false;
        }
        // dd($this->token->account);
        Log::channel('sitec-finder')->info('Tratando Token .. '.print_r($this->token, true));

        if ($this->token->account->integration_id == Sentry::getCodeForPrimaryKey()) {
            // (new \Integrations\Connectors\Sentry\Import($this->token))->bundle();
        } else if ($this->token->account->integration_id == Jira::getCodeForPrimaryKey()) {
            // (new \Integrations\Connectors\Jira\Import($this->token))->bundle();
        } else if ($this->token->account->integration_id == Gitlab::getCodeForPrimaryKey()) {
            (new \Integrations\Connectors\Gitlab\Import($this->token))->bundle();
        }

        return true;
    }
}
