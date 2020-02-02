<?php
/**
 * 
 */

namespace Finder\Components\Worker\Sync\Database;

use SiUtils\Tools\Databases\Mysql\Mysql as MysqlTool;
use Finder\Models\Digital\Infra\DatabaseCollection;

class BackupCollection
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
