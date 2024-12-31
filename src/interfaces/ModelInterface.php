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

    public function migrate(): bool;
}