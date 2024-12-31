<?php

namespace Textilz\Jsondb4php\interfaces;

use \Textilz\Jsondb4php\classes\Database;

interface ModelInterface
{
    /**
     * @param Database $database
     * @param string $tableName
     * @param array $entries
     */
    public function __construct(Database $database, string $tableName, array $entries);

    /**
     * Создание таблицы с полями
     *
     * @param $entries
     * @return bool
     */
    public function migrate($entries): bool;
}