<?php
/**
 * 
 */

namespace Finder\Actions\Worker\Sync\Database;

use SiUtils\Tools\Databases\Mysql\Mysql as MysqlTool;
use Finder\Models\Digital\Infra\DatabaseCollection;
use Finder\Actions\Contracts\ActionInterface;

class BackupCollection implements ActionInterface
{

    protected $collection = false;

    public function __construct(DatabaseCollection $collection)
    {
        $this->collection = $collection;
    }

    public function execute()
    {
        return (new MysqlTool($this->collection))->export();
    }
}
