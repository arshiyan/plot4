<?php


class boardClass
{
    public $row;
    public $columns;

    function __construct($row,$columns) {
        $this->row = $row;
        $this->columns = $columns;

    }
    function get_row() {
        return $this->row;
    }

    function get_columns() {
        return $this->columns;
    }

    public function draw()
    {
        //drow board
    }
}
