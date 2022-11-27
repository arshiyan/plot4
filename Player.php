<?php
//error_reporting(0);

class Player
{
    private $name;// name of player
    private $symbol; // * or O for player


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

}
