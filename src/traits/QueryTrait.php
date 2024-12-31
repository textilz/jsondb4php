<?php

namespace Textilz\Jsondb4php\traits;

use Exception;

trait QueryTrait
{
    public string $fullPath;

    /**
     * Получить базу данных
     *
     * @param $fullPath
     * @return array
     * @throws Exception
     */
    public function file($fullPath): array
    {
        $file = json_decode(file_get_contents($fullPath), true);
        if (json_last_error() !== JSON_ERROR_NONE) throw new Exception('Ошибка при чтении базы данных');
        return $file;
    }

    /**
     * Сохранить базу данных
     *
     * @param $newFile
     * @param $path
     * @return bool
     */
    public function save($newFile, $path): bool
    {
        file_put_contents($path, json_encode($newFile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return true;
    }
}