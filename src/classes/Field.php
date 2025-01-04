<?php


namespace Textilz\Jsondb4php\classes;

use Exception;
use stdClass;
use Textilz\Jsondb4php\interfaces\FieldInterface;
use Textilz\Jsondb4php\interfaces\TypeInterface;

class Field implements FieldInterface
{
    static array $params = [
        'name' => null,
        'type' => TypeInterface::NULL,
        'null' => false,
        'primary' => false,
        'unique' => false,
        'foreignModel' => false,
        'foreignEntry' => false,
        'length' => null,
        'default' => null,
        'autoincrement' => false,
    ];

    static public function create(): stdClass
    {
        Field::checkCompatibilityValues();
        $result = (object) self::$params;
        self::resetParams();
        return (object) $result;
    }

    static private function resetParams(): void {
        self::$params = [
            'name' => null,
            'type' => 'NULL',
            'null' => false,
            'primary' => false,
            'unique' => false,
            'foreign' => false,
            'length' => null,
            'default' => null,
            'autoincrement' => false,
        ];
    }

    static public function name(string $name): FieldInterface
    {
        self::$params['name'] = $name;
        return new self();
    }

    static public function type(string $type): FieldInterface
    {
        self::$params['type'] = $type;
        return new self();
    }

    static public function null(bool $null = true): FieldInterface
    {
        self::$params['null'] = $null;
        return new self();
    }

    static public function primary(bool $primary = true): FieldInterface
    {
        Field::unique();
        Field::null(false);
        self::$params['primary'] = $primary;
        return new self();
    }

    static public function unique(bool $unique = true): FieldInterface
    {
        self::$params['unique'] = $unique;
        return new self();
    }

    static public function foreign(Model $model, string $foreignEntry = 'id'): FieldInterface
    {
        self::$params['foreignModel'] = $model;
        self::$params['foreignEntry'] = $foreignEntry;
        return new self();
    }

    static public function length(int $length): FieldInterface
    {
        self::$params['length'] = $length;
        return new self();
    }

    static public function default(mixed $value = null): FieldInterface
    {
        self::$params['default'] = $value;
        return new self();
    }

    static public function autoincrement(bool $autoincrement = true): FieldInterface
    {
        Field::unique();
        self::$params['autoincrement'] = $autoincrement;
        return new self();
    }

    static private function checkCompatibilityValues(): void
    {
        if (self::$params['type'] !== Type::INT && self::$params['autoincrement'])
            throw new Exception("Авто инкремент должен быть INT");

        if (
            (self::$params['type'] !== Type::INT
            && self::$params['type'] !== Type::STRING)
            && self::$params['primary'])
            throw new Exception("Внешний ключ может быть только INT или STRING");

        if (self::$params['primary'] && !self::$params['unique'])
            throw new Exception("Внешний ключ должен быть уникальным");

        if (self::$params['primary'] && !self::$params['unique'])
            throw new Exception("Внешний ключ должен быть уникальным");

    }
}