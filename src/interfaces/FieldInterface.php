<?php

namespace Textilz\Jsondb4php\interfaces;

use stdClass;
use Textilz\Jsondb4php\classes\Model;

interface FieldInterface
{
    /**
     * Создать поле
     *
     * @return stdClass
     */
    static public function create(): stdClass;

    /**
     * Имя поля в таблице
     *
     * @param string $name
     * @return self
     */
    static public function name(string $name): self;

    /**
     * Тип данных поля
     *
     * @param string $type
     * @return self
     */
    static public function type(string $type): self;

    /**
     * Возможность поля быть null
     *
     * @param bool $null
     * @return self
     */
    static public function null(bool $null = true): self;

    /**
     * Primary поля
     *
     * @param bool $primary
     * @return self
     */
    static public function primary(bool $primary = true): self;

    /**
     * Уникальность поля
     *
     * @param bool $unique
     * @return self
     */
    static public function unique(bool $unique = true): self;

    /**
     * Внешний ключ
     *
     * @param ModelInterface $model
     * @param string $foreignEntry
     * @return self
     */
    static public function foreign(Model $model, string $foreignEntry = 'id'): self;

    /**
     * Длинна строки
     * Для типов STRING, ARRAY
     *
     * @param int $length
     * @return self
     */
    static public function length(int $length): self;

    /**
     * Стандартное значение
     *
     * @param mixed $value
     * @return self
     */
    static public function default(mixed $value = true): self;
}