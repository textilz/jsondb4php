<?php

namespace Textilz\Jsondb4php\classes\Query;

use Exception;
use Textilz\Jsondb4php\interfaces\Query\QueryDatabaseInterface;
use Textilz\Jsondb4php\traits\QueryTrait;

abstract class QueryDatabase extends QueryTables implements QueryDatabaseInterface
{
    public function isExistsDatabase(): false|array
    {
        return file_exists($this->fullPath) ? $this->file($this->fullPath) : false;
    }

    public function createDatabase(): bool
    {
        if ($this->isExistsDatabase()) return true;

        $data = [
            "name" => $this->name,
            "created" => time(),
            "tables" => []
        ];

        $this->save($data, $this->fullPath);
        return true;
    }

    public function dropDatabase(): bool
    {
        if (!$this->isExistsDatabase()) throw new Exception('База данных не существует');

        unlink($this->fullPath);
        return true;
    }
}