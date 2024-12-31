<?php

namespace Textilz\Jsondb4php\classes\Query;

use Textilz\Jsondb4php\interfaces\Query\QueryFieldInterface;

abstract class QueryField extends QueryEntry implements QueryFieldInterface
{
    public function getFields(string $table): array
    {
        return [];
    }

    public function createField(string $table, array $params): bool
    {
        return true;
    }

    public function isExistField(string $table, string $field): bool
    {
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