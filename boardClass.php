<?php
//error_reporting(0);

class BoardClass
{
    public $row;
    public $columns;

    public $playPosition;
    private $validitor;
    public $testMode = false;

    function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        //$this->generateMatrix();
        $this->validitor = new Validetor();


        /*$this->playPosition[1][1] = "*";
        $this->playPosition[$this->rows-2][$this->columns-4] = "o";
        $this->playPosition[$this->rows-4][$this->columns-2] = "*";
        $this->playPosition[$this->rows][$this->columns] = "o";*/

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

            if($this->playPosition[$row][$col] == "o")
            {
                $this->colorPlayer(" ".$this->playPosition[$row][$col],'i');
            }
            else
            {
                $this->colorPlayer(" ".$this->playPosition[$row][$col],'s');
            }
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

        for ($x = 1; $x <= $this->columns; $x++) {
            echo(" $x ");
        }
        echo "\n";

        for ($i = 1; $i < $this->rows; $i++) {
            for ($x = 1; $x <= $this->columns; $x++) {
                echo "|" . $i . $x;

                if ($x == $this->columns) {
                    echo "|";
                }
            }
            echo "\n";
        }

        //draw footer
        echo "==";
        for ($x = 1; $x <= $this->columns - 1; $x++) {
            echo("===");
        }
        echo "==";
        echo "\n";


    }

    public function colorPlayer($str, $type = 'i'){
        switch ($type) {
            case 'e': //error
                echo "\033[31m$str\033[0m";
                break;
            case 's': //success
                echo "\033[32m$str\033[0m";
                break;
            case 'w': //warning
                echo "\033[33m$str\033[0m";
                break;
            case 'i': //info
                echo "\033[36m$str\033[0m";
                break;
        }
    }

    //make default matrix
    public function generateMatrix()
    {
        for ($i = 1; $i < $this->rows; $i++) {
            for ($x = 1; $x <= $this->columns; $x++)
            {
                $this->playPosition[$this->rows][$this->columns] = "0";
            }
        }
    }

}
