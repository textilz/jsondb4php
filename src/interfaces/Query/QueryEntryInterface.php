<?php

namespace Textilz\Jsondb4php\interfaces\Query;

interface QueryEntryInterface
{
    /**
     * Выбрать требуемые поля записей
     *
     * @param ...$args
     * @return self
     */
    public function select(...$args): self;

    /**
     * Создать запись в таблице
     *
     * @param ...$params
     * @return bool
     */
    public function create(...$params): bool;

    /**
     * Обновить запись
     *
     * @param $id
     * @param ...$params
     * @return bool
     */
    public function update($id, ...$params): bool;

    /**
     * Удалить запись
     *
     * @param $id
     * @param ...$params
     * @return bool
     */
    public function delete($id, ...$params): bool;

    /**
     * Условие для фильтрации
     *
     * @param $field
     * @param $value
     * @param string $equal
     * @return self
     */
    public function where($field, $value, string $equal = '='): self;

    /**
     * Ограничение по количеству записей
     *
     * @param int $limit
     * @return self
     */
    public function limit(int $limit = 1): self;

    /**
     * Сортировка записей
     *
     * @param string $filed
     * @param string $sort
     * @return self
     */
    public function order(string $filed, string $sort = 'asc'): self;
}