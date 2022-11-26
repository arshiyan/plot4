<?php
error_reporting(0);

class BoardClass
{
    public $row;
    public $columns;

    public $playPosition;
    private $validitor;

    function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;

        $this->validitor = new Validetor();

        $this->playPosition[$this->rows-1][$this->columns-2] = "*";
        $this->playPosition[$this->rows-2][$this->columns-4] = "o";
        $this->playPosition[$this->rows-4][$this->columns-2] = "*";
        $this->playPosition[$this->rows-3][$this->columns-2] = "o";

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

    public function runTimeDraw($row,$col)
    {
        if($this->validitor->checkNotEmpty($this->playPosition[$row][$col]))
        {
            echo " ".$this->playPosition[$row][$col];
        }
        else
        {
            //echo $row.$col;
            echo "  ";
        }
    }


    //draw box
    public function boxDraw()
    {

        for ($x = 1; $x <= $this->columns; $x++) {
            echo " ".($x)." " ;
        }
        echo "\n";

        for ($i = 1; $i <= $this->rows; $i++) {
            for ($x = 1; $x <= $this->columns; $x++) {
                echo "║";
                $this->runTimeDraw($i,$x);
                if ($x == $this->columns) {
                    echo "║ ";
                }
            }

            echo " ".($i);
            echo "\n";
        }

        //draw footer
        echo "╚═";
        for ($x = 1; $x <= $this->columns - 1; $x++) {
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
