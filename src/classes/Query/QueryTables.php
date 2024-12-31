<?php

namespace Textilz\Jsondb4php\classes\Query;

use Exception;
use Textilz\Jsondb4php\classes\Type;
use Textilz\Jsondb4php\interfaces\Query\QueryTableInterface;
use Textilz\Jsondb4php\classes\Query\QueryField;

abstract class QueryTables extends QueryField implements QueryTableInterface
{
    public function createTable($name): bool
    {
        $file = $this->file($this->fullPath);
        $file['tables'][] = [
            'name' => $name,
            'fields' => [
                'id' => [
                    'type' => Type::INT,
                    'primary' => true,
                    'autoIncrement' => true,
                ]
            ],
            'entries' => [],
            'created' => time()
        ];
        $this->save($file, $this->fullPath);

        return true;
    }

    public function getTables(): array
    {
        return [];
    }

    /**
     * @throws Exception
     */
    public function isExistTable(string $name): bool
    {
        $file = $this->file($this->fullPath);
        $exists = false;

        foreach ($file['tables'] as $item) {
            if ($item['name'] === 'users') {
                $exists = true;
                break;
            }
        }

        return $exists;
    }

    public function updateTable(string $name, string $newName): bool
    {
        return true;
    }

    public function dropTable(string $name): bool
    {
        return true;
    }
}