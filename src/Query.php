<?php
namespace Sergey00708\Builder;

use Aigletter\Contracts\Builder\QueryInterface;

class Query implements QueryInterface
{
    protected $columns;
    protected $conditions;
    protected $table;
    protected $limit;
    protected $offset;
    protected $order;

    public function __construct($columns, $conditions, $table, $limit, $offset, $order)
    {
        $this->columns= $columns;
        $this->conditions = $conditions;
        $this->table = $table;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->order = $order;
    }

    public function __toString(): string
    {
        return $this->toSql();
    }

    public function toSql(): string
    {
        if (isset($this->columns)) {
            $arr[] = "SELECT " . $this->columns;
        }

        if (isset($this->table)) {
            $arr[] = " FROM " . $this->table;
        }

        if (isset($this->conditions)) {
            $arr[] = " WHERE " . $this->conditions;
        }

        if (isset($this->order)) {
            $arr[] = " ORDER BY " . $this->order;
        }

        if (isset($this->limit)) {
            $arr[] = " LIMIT " . $this->limit;
        }

        if (isset($this->offset)) {
            $arr[] = " OFFSET" . $this->offset;
        }

        return implode($arr);
    }
}