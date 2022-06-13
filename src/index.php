<?php

use Sergey00708\Builder\DB;
use Sergey00708\Builder\QueryBuilder;

require __DIR__ . '/../vendor/autoload.php';

$builder = new QueryBuilder();
$zapros = $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();

$config = require_once 'config.php';
$db = new DB($config);

$test = $db->one($zapros);
var_dump($test);