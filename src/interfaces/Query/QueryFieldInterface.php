<?php

namespace Textilz\Jsondb4php\interfaces\Query;

use stdClass;
use Textilz\Jsondb4php\classes\Field;

interface QueryFieldInterface
{
    /**
     * Получить все поля таблицы
     *
     * @param string $table
     * @param string|null $field
     * @return array|null
     */
    public function getFields(string $table, ?string $field = null): array|null;

    /**
     * Создать поле
     *
     * @param int $tableIndex
     * @param stdClass $params
     * @return bool
     */
    public function createField(int $tableIndex, stdClass $params): bool;

    /**
     * Проверка поля на существование
     *
     * @param string $table
     * @param string $field
     * @return false|array
     */
    public function isExistField(string $table, string $field): false|array;

    /**
     * Обновить поле
     *
     * @param string $table
     * @param string $fieldName
     * @param array $params
     * @return bool
     */
    public function updateField(string $table, string $fieldName, array $params): bool;

    /**
     * Удалить поле
     *
     * @param string $table
     * @param string $fieldName
     * @return bool
     */
    public function deleteField(string $table, string $fieldName): bool;

    /**
     * Записи поля
     *
     * @param string $table
     * @param string $fieldName
     * @return array
     */
    public function entriesField(string $table, string $fieldName): array;

    /**
     * Проверка записей для изменения поля
     *
     * @param string $table
     * @param string $fieldName
     * @return bool
     */
    public function checkEntriesField(string $table, string $fieldName): bool;

    /**
     * Совпадение параметров поля
     *
     * @param string $table
     * @param stdClass $params
     * @return bool
     */
    public function fieldOverlap(string $table, stdClass $params): bool;
}