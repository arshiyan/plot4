<?php
require_once "Player.php";
require_once "game.php";
require_once "boardClass.php";
require_once "Validetor.php";

class WinnerCheck
{
    private $players;
    private $playPosition;
    private $validator;
    public $matrixArray;


    public function __construct($playPosition,$players,$matrixArray)
    {
        $this->playPosition = $playPosition;
        $this->players = $players;
        $this->validator = new Validetor();
        $this->matrixArray = $matrixArray;
    }

    //check for winner
    public function winCheck()
    {

        $rows = $this->matrixArray['rows'];
        $columns = $this->matrixArray['columns'];

        for ($i = $columns; $i >= 1; $i--)
        {
            $win = 0;
            for($x =$rows; $x >= 1 ;$x-- )
            {
                if($this->validator->checkNotEmpty($this->playPosition[$x][$i]))
                {
                    if(($this->validator->checkNotEmpty($this->playPosition[$x-1][$i])) && ($this->playPosition[$x][$i] == $this->playPosition[$x-1][$i]))
                    {
                        $win = $win + 1;

                    }
                }

                if($win >= 3)
                {
                     $this->fireWine($this->playPosition[$x][$i]);
                }
            }
        }
        $this->checkBoardIsFull();
    }

    public function fireWine($symbole)
    {

        foreach ($this->players as $player)
        {
            if($player->getSymbol() == $symbole)
            {

                $this->winMessage($player);
            }
        }
    }

    public function winMessage($player)
    {
        echo "Player ". $player->getName()." won";
        echo " \n ";
        echo "Game over!";
        echo " \n ";
        exit();
    }

    //check the board is full
    public function checkBoardIsFull()
    {
        $rows = $this->matrixArray['rows'];
        $columns = $this->matrixArray['columns'];

        $is_full = 0;
        for ($i = $columns; $i >= 1; $i--)
        {
                if($this->validator->checkNotEmpty($this->playPosition[1][$i]))
                {
                    $is_full++;
                    if($columns == $is_full)
                    {
                        echo "It is a draw";
                        echo " \n ";
                        echo "Game over!";
                        echo " \n ";
                        exit();
                    }
                }
        }

    }
}
