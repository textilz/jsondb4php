<?php

namespace Textilz\Jsondb4php\classes;

use Exception;
use Textilz\Jsondb4php\classes\Query\QueryEntry;
use Textilz\Jsondb4php\classes\Query\QueryTables;
use Textilz\Jsondb4php\interfaces\ModelInterface;

class Model extends QueryTables implements ModelInterface
{
    protected Database $database;
    protected string $tableName;

    public function __construct(Database $database, string $tableName, $entries)
    {
        $this->database = $database;
        $this->tableName = strtolower($tableName);
        $this->fullPath = $database->fullPath;
        $this->migrate();
    }

    /**
     * @throws Exception
     */
    public function migrate(): bool
    {
        if ($this->isExistTable($this->tableName)) return true;
        else {
//            print_r('qwe');
            $this->createTable($this->tableName);
            return true;
        }
    }

    public function get(): array
    {
        return parent::getEntry($this->tableName);
    }

    public function first(): array
    {
        return parent::firstEntry($this->tableName);
    }

    public function last(): array
    {
        return parent::lastEntry($this->tableName);
    }
}