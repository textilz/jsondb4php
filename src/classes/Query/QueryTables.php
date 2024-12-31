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

    public function getTables(?string $table = null): array
    {
        $file = $this->file($table);
        if ($table) return $file['tables'];
        else {
            foreach ($file['tables'] as $item) {
                if ($item['name'] === 'users') {
                    return $item;
                }
            }
            throw new Exception("Таблица '$table' не найдена");
        }
    }

    public function isExistTable(string $name): false|array
    {
        $file = $this->file($this->fullPath);
        $exists = false;

        foreach ($file['tables'] as $item) {
            if ($item['name'] === 'users') {
                $exists = $item;
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

    public function getTableIndex(string $table): int
    {
        $file = $this->file($this->fullPath);

        $tables = $file['tables'];

        $index = array_search($table, array_column($tables, 'name'));

        if ($index !== false) return $index;
        else throw new Exception('Таблица не найдена');
    }
}