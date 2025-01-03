<?php

namespace Textilz\Jsondb4php\classes;

use Exception;
use Textilz\Jsondb4php\classes\Query\QueryEntry;
use Textilz\Jsondb4php\classes\Query\QueryTable;
use Textilz\Jsondb4php\interfaces\ModelInterface;

class Model extends QueryTable implements ModelInterface
{
    protected Database $database;
    protected string $tableName;

    /**
     * @throws Exception
     */
    public function __construct(Database $database, string $tableName, $fields)
    {
        $this->database = $database;
        $this->tableName = strtolower($tableName);
        $this->fullPath = $database->fullPath;
        $this->migrate($fields);
    }

    /**
     * @throws Exception
     */
    public function migrate($fields): bool
    {
        if (!$this->isExistTable($this->tableName)) {
            $this->createTable($this->tableName);
            foreach ($fields as $field) $this->createField($this->getTableIndex($this->tableName), $field);
        } else {
            // Проверка существования и параметров полей
            foreach ($fields as $field)
                if (!$this->fieldOverlap($this->tableName, $field))
                    throw new Exception("Поле '{$field->name}' имеет другие параметры.");

            // Проверка соответствия названия полей
            if (!$this->matchingDbAndConfigField($fields))
                throw new Exception("Указанные поля в конфигурации не совпадают с существующей базой данных");
        }
//        foreach ($entries as $entry) {
//            if (!$this->isExistField($this->tableName, $entry->name)) {
//                $this->createField($this->getTableIndex($this->tableName), $entry);
//                continue;
//            }
//            if (!$this->fieldOverlap($this->tableName, $entry))
//                throw new Exception("Поле '{$entry->name}' имеет другие параметры.");
//        }
        return true;
    }

    /**
     * Одинаковые ли массивы
     * Используется для проверки переданных полей
     *
     * @param array $configFields
     * @return bool
     * @throws Exception
     */
    private function matchingDbAndConfigField(array $configFields): bool
    {
        $configNames = array_map(function($item) {
            return $item->name;
        }, $configFields);
        $dbNames = array_keys($this->getField($this->tableName));

        sort($configNames);
        sort($dbNames);

        return $configNames === $dbNames;
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