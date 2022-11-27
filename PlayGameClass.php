<?php
//error_reporting(0);
require_once "Player.php";
require_once "game.php";
require_once "boardClass.php";
require_once "Validetor.php";

class PlayGameClass
{

    private $inp;
    private $players;
    private $playPosition;
    private $playerIndex;
    private $validator;
    public $matrixArray;

    public function __construct($playPosition,$players)
    {
        $this->playPosition = $playPosition;
        $this->players = $players;
        $this->playerIndex = 1;
        $this->validator = new Validetor();


    }

    //switch to current player
    public function nextPlayer()
    {
        if($this->playerIndex == 1)
        {
            $this->playerIndex = 2;
        }
        else
        {
            $this->playerIndex = 1;
        }
        $index = 'player'.$this->playerIndex;

        return $this->players[$index];
    }

    public function setToColumn($column,$player)
    {
        $index = $this->matrixArray['rows'];
        while($index > 0) {
            if(!$this->validator->checkNotEmpty($this->playPosition[$index][$column]))
            {
                $this->playPosition[$index][$column] = $player->getSymbol();
                break;
            }
            echo $index--;
        }

        return $this->playPosition;
    }


    //get last player position
    public function getPlayPosition()
    {
        return $this->playPosition;
    }
}
