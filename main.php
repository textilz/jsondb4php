<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            background-color: #313131;
            color: white;
            font-family: sans-serif;
            font-size: 16px;
        }
        body {
            margin: 50px;
        }
    </style>
</head>
<body>

</body>
</html>

<?php

require 'vendor/autoload.php';

use Textilz\Jsondb4php\classes\Database;
use Textilz\Jsondb4php\classes\Field;
use Textilz\Jsondb4php\classes\Model;
use Textilz\Jsondb4php\classes\Type;


$db = new Database('controller');
//$db->dropDatabase();
//$db->createDatabase();

$users = new Model($db, 'users', [
    Field::name('id')->primary()->type(Type::INT)->create()
]);

