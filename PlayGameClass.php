<?php
//error_reporting(0);
require_once "Player.php";
require_once "game.php";
require_once "boardClass.php";

class PlayGameClass
{

    private $inp;
    private $players;
    private $playPosition;
    private $playerIndex;

    public function __construct($playPosition,$players)
    {
        $this->playPosition = $playPosition;
        $this->players = $players;
        $this->playerIndex = 1;

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
    
    public function runGame()
    {
        while ($this->inp != "end")
        {
            $this->inp = readline('First player`s name: ');

        }

    }

}
