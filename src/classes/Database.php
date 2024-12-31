<?php

namespace Textilz\Jsondb4php\classes;

use Exception;
use Textilz\Jsondb4php\classes\Query\QueryDatabase;
use Textilz\Jsondb4php\classes\Query\QueryEntry;
use Textilz\Jsondb4php\interfaces\DatabaseInterface;
use Textilz\Jsondb4php\traits\QueryTrait;

class Database extends QueryDatabase implements DatabaseInterface
{
    use QueryTrait;

    protected string $name;
    protected string $path;

    public function __construct(string $name, string $path = '')
    {
        $this->name = $name;
        $this->path = $path;
        $this->fullPath = $this->path . $this->name . '.json';

        $this->createDatabase();
    }

    public function get($tableName): array
    {
        return parent::getEntry($tableName);
    }

    public function first($tableName): array
    {
        return parent::firstEntry($tableName);
    }

    public function last($tableName): array
    {
        return parent::lastEntry($tableName);
    }
}