<?php

namespace Textilz\Jsondb4php\interfaces\Query;

interface QueryDatabaseInterface
{
    /**
     * Создать базу данных
     *
     * @return bool
     */
    public function createDatabase(): bool;

    /**
     * Проверить существование базы данных
     *
     * @return false|array
     */
    public function isExistsDatabase(): false|array;

    /**
     * Удалить базу данных
     *
     * @return bool
     */
    public function dropDatabase(): bool;
}