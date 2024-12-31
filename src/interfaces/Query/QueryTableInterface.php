<?php

namespace Textilz\Jsondb4php\interfaces\Query;

use Exception;
use Textilz\Jsondb4php\classes\Database;

interface QueryTableInterface
{
    /**
     * Все таблицы
     *
     * @param string|null $table
     * @return array
     * @throws Exception
     */
    public function getTables(?string $table = null): array;

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
     * @return false|array
     */
    public function isExistTable(string $name): false|array;

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

    /**
     * Индекс таблицы
     *
     * @param string $table
     * @return int
     */
    public function getTableIndex(string $table): int;
}