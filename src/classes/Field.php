<?php


namespace Textilz\Jsondb4php\classes;

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
    ];

    static public function create(): stdClass
    {
        $result = (object) self::$params; // Создаем объект из текущих параметров
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

    static public function default(mixed $value = true): FieldInterface
    {
        self::$params['default'] = $value;
        return new self();
    }
}