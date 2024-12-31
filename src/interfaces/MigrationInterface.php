<?php

namespace Textilz\Jsondb4php\interfaces;

use Textilz\Jsondb4php\classes\Field;

interface MigrationInterface
{
    /**
     * Создать таблицу
     *
     * @param $name
     * @return bool
     */
    public function createTable($name): bool;

    /**
     * Проверить существует ли таблица
     *
     * @param $name
     * @return bool
     */
    public function isTableExists($name): bool;

    /**
     * Удалить таблицу
     *
     * @param $name
     * @return bool
     */
    public function dropTable($name): bool;

    public function createEntry($table, $name): bool;

    public function isEntryExists($table, $name): bool;

    public function dropEntry($table, $name): bool;
}