<?php

namespace Textilz\Jsondb4php\interfaces;

use Exception;

interface DatabaseInterface
{
    /**
     * @param string $name
     * @param string $path
     */
    public function __construct(string $name, string $path);
}