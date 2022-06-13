<?php

namespace Sergey00708\Builder;

use Aigletter\Contracts\Builder\DbInterface;
use Aigletter\Contracts\Builder\QueryInterface;
use PDO;
class DB implements DbInterface
{

    protected $pdo;
    protected $settings = [];

    public function __construct(array $settings)
    {
        $dsn = 'mysql:host' . $this->settings['host'] . ';dbname=' . $this->settings['dbname'];
        $this->pdo = new PDO($dsn, $this->settings['user'], $this->settings['password']);
    }

    public function one(QueryInterface $query): object
    {
        $one = $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
        if ($one){
            return $one;
        }
        return [];
    }

    public function all(QueryInterface $query): array
    {
        $all = $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
        if ($all){
            return $all;
        }
        return [];
    }
}