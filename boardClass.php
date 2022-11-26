<?php
error_reporting(0);

class BoardClass
{
    public $row;
    public $columns;

    function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function getRow()
    {
        return $this->rows;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function draw()
    {
        $this->boxDraw();
        //$this->plainText();

    }

    //draw box
    public function boxDraw()
    {

        for ($x = 0; $x <= $this->columns; $x++) {
            echo(" $x ");
        }
        echo "\n";

        for ($i = 0; $i < $this->rows; $i++) {
            for ($x = 0; $x <= $this->columns; $x++) {
                echo "║" . $i . $x;

                if ($x == $this->columns) {
                    echo "║";
                }
            }
            echo "\n";
        }

        //draw footer
        echo "╚═";
        for ($x = 0; $x <= $this->columns - 1; $x++) {
            //echo (" ╩ ");
            echo("═╩═");
        }
        echo "═╝";
        echo "\n";


    }

    //draw plain text
    public function plainText()
    {

        for ($x = 0; $x <= $this->columns; $x++) {
            echo(" $x ");
        }
        echo "\n";

        for ($i = 0; $i < $this->rows; $i++) {
            for ($x = 0; $x <= $this->columns; $x++) {
                echo "|" . $i . $x;

                if ($x == $this->columns) {
                    echo "|";
                }
            }
            echo "\n";
        }

        //draw footer
        echo "==";
        for ($x = 0; $x <= $this->columns - 1; $x++) {
            echo("===");
        }
        echo "==";
        echo "\n";


    }
}
