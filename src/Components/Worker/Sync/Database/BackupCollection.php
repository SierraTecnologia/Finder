<?php
/**
 * 
 */

namespace Finder\Components\Worker\Sync\Database;

use Fabrica\Tools\Databases\Mysql\Mysql as MysqlTool;
use Fabrica\Models\Infra\DatabaseCollection;
use Operador\Contracts\ActionInterface;

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
