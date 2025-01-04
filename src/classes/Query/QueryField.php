<?php

namespace Textilz\Jsondb4php\classes\Query;

use Exception;
use stdClass;
use Textilz\Jsondb4php\interfaces\Query\QueryFieldInterface;

abstract class QueryField extends QueryEntry implements QueryFieldInterface
{
    /**
     * @throws Exception
     */
    public function getFields(string $table, ?string $field = null): array|null
    {
        $file = $this->file($this->fullPath);
        $array = [];

        foreach ($file['tables'] as $item) {
            if ($item['name'] === $table) {
                if ($field === null) $array = $item['fields'];
                else $array = $item['fields'][$field] ?? null;
                break;
            }
        }

        return $array;
    }

    public function createField(int $tableIndex, stdClass $params): bool
    {
        if ($this->getFields($this->tableName, $params->name)) throw new Exception("Поле {$params->name} уже существует");
        $file = $this->file($this->fullPath);

        foreach ($params as $key => $param) {
            if ($key == "name") continue;
            $args[$key] = $param;
        }
        $args['created'] = time();

        $file['tables'][$tableIndex]['fields'][$params->name] = $args;

        $this->save($file, $this->fullPath);

        return true;
    }

    public function isExistField(string $table, string $field): false|array
    {
        $fields = $this->getFields($table);
        $keys = array_keys($fields);
        if (count(array_filter($keys, function ($item) use ($field) {return $item === $field;})) <= 0) return false;
        else return $fields[$field];
    }

    /**
     * @throws Exception
     */
    public function fieldOverlap(string $table, stdClass $params): bool
    {
        $fields = $this->getFields($table);
        $fields = $fields[$params->name] ?? null;
        if ($fields === null) return throw new Exception("Поле {$params->name} не существует");
        foreach ($params as $key => $value) {
            if ($key == "name") continue;
            if (empty($value) && empty($fields[$key])) continue;
            if (
                !empty($value) && empty($fields[$key])
                || empty($value) && !empty($fields[$key])
                || $value != $fields[$key]
            ) return false;

        }
        return true;
    }

    public function updateField(string $table, string $fieldName, array $params): bool
    {
        return true;
    }

    public function deleteField(string $table, string $fieldName): bool
    {
        return true;
    }

    public function entriesField(string $table, string $fieldName): array
    {
        return [];
    }

    public function checkEntriesField(string $table, string $fieldName): bool
    {
        return true;
    }
}