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
     * @return bool
     */
    public function isExistsDatabase(): bool;

    /**
     * Удалить базу данных
     *
     * @return bool
     */
    public function dropDatabase(): bool;
}