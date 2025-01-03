<?php

namespace Textilz\Jsondb4php\interfaces;

use \Textilz\Jsondb4php\classes\Database;

interface ModelInterface
{
    /**
     * @param Database $database
     * @param string $tableName
     * @param array $fields
     */
    public function __construct(Database $database, string $tableName, array $fields);

    /**
     * Создание таблицы с полями
     *
     * @param $fields
     * @return bool
     */
    public function migrate($fields): bool;
}