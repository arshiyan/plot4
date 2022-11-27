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
    public $done = false;


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
        if(!$this->horizontalWinCheck())
        {
            $this->verticalWinCheck();
        }

        $this->checkBoardIsFull();
    }

    //check winnwr in columns
    public function verticalWinCheck()
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
                    return true;
                }
            }
        }
        return false;
    }


    //check winner in row
    public function horizontalWinCheck()
    {
        $rows = $this->matrixArray['rows'];
        $columns = $this->matrixArray['columns'];
        for ($i = $rows; $i >= 1; $i--)
        {
            $win = 0;

            for($x =$columns; $x >= 1 ;$x-- )
            {

                if($this->validator->checkNotEmpty($this->playPosition[$i][$x]))
                {
                    if(($this->validator->checkNotEmpty($this->playPosition[$i][$x-1])) && ($this->playPosition[$i][$x] == $this->playPosition[$i][$x-1]))
                    {

                        $win = $win + 1;
                    }
                }

                if($win >= 3)
                {
                    $this->fireWine($this->playPosition[$i][$x]);
                    return true;

                }
            }

        }
        return false;
    }

    public function fireWine($symbole)
    {
        $this->done = true; //finish game
        $playerWinner = null;
        foreach ($this->players as $player)
        {
            if($player->getSymbol() == $symbole)
            {
                $playerWinner = $player;
            }
        }
        if($this->validator->checkNotEmpty($playerWinner))
        {
            $this->winMessage($playerWinner);
        }
        return true;

    }

    public function winMessage($player)
    {
        echo "Player ". $player->getName()." won";
        echo " \n ";
        echo "Game over!";
        echo " \n ";
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
                        $this->done = true;
                    }
                }
        }

    }
}
