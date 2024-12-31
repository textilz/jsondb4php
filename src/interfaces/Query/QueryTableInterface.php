<?php

namespace Textilz\Jsondb4php\interfaces\Query;

use Textilz\Jsondb4php\classes\Database;

interface QueryTableInterface
{
    /**
     * Все таблицы
     *
     * @return array
     */
    public function getTables(): array;

    /**
     * Создать таблицу
     *
     * @param string $name
     * @return bool
     */
    public function createTable(string $name): bool;

    /**
     * Существует ли таблица
     *
     * @param string $name
     * @return bool
     */
    public function isExistTable(string $name): bool;

    /**
     * Обновить таблицу
     *
     * @param string $name
     * @param string $newName
     * @return bool
     */
    public function updateTable(string $name, string $newName): bool;

    /**
     * Удалить таблицу
     *
     * @param string $name
     * @return bool
     */
    public function dropTable(string $name): bool;
}