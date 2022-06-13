<?php

namespace Sergey00708\Builder;

use Aigletter\Contracts\Builder\BuilderInterface;
use Aigletter\Contracts\Builder\QueryBuilderInterface;
use Aigletter\Contracts\Builder\QueryInterface;

class QueryBuilder implements QueryBuilderInterface
{

    protected $columns;
    protected $conditions;
    protected $table;
    protected $limit;
    protected $offset;
    protected $order;

    public function select($columns): BuilderInterface
    {
        $columns = implode(', ',$columns );
        $this->columns = $columns;
        return $this;
    }

    public function where($conditions): BuilderInterface
    {
        foreach ($conditions as $key=>$value){
            $conditions = $key . '=' . $value;
        }
        $this->conditions = $conditions;
        return $this;
    }

    public function table($table): BuilderInterface
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): BuilderInterface
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): BuilderInterface
    {
        $this->offset = $offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        foreach ($order as $key=>$value){
            $order = $key . ' ' . $value;
        }
        $this->order = $order;
        return $this;
    }

    public function build(): QueryInterface
    {
        return new Query($this->columns, $this->conditions, $this->table, $this->limit,$this->offset, $this->order);
    }
}