<?php

namespace Textilz\Jsondb4php\classes\Query;

use Textilz\Jsondb4php\classes\Type;
use Textilz\Jsondb4php\interfaces\Query\QueryEntryInterface;
use Textilz\Jsondb4php\traits\QueryTrait;

abstract class QueryEntry implements QueryEntryInterface
{
    use QueryTrait;

    protected array $params = [
        'select' => [],
        'where' => [
            'set' => false,
            'entry' => null,
            'value' => null,
            'equal' => '='
        ],
        'limit' => null,
        'order' => [
            'set' => false,
            'entry' => null,
            'sort' => 'asc',
        ],
    ];

    public function select(...$args): QueryEntryInterface
    {
        $this->params = array_merge($this->params, $args);
        return $this;
    }

    public function create(...$params): bool
    {
//        $file = $this->file();
//        var_dump($file);

        return true;
    }

    public function update($id, ...$params): bool
    {
        return true;
    }

    public function delete($id, ...$params): bool
    {
        return true;
    }

    public function where($field, $value, string $equal = '='): QueryEntryInterface
    {
        return $this;
    }

    public function limit(int $limit = 1): QueryEntryInterface
    {
        return $this;
    }

    public function order($filed, string $sort = 'asc'): QueryEntryInterface
    {
        return $this;
    }

    protected function getEntry($table): array
    {
        return [];
    }

    protected function firstEntry($table): array
    {
        return [];
    }

    protected function lastEntry($table): array
    {
        return [];
    }
}