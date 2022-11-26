<?php
require_once "Player.php";

echo "Plot Four";

class Game_init
{
    private $player1;
    private $player2;

    public function _input_playes()
    {
        $player1 = readline('First player`s name: ');
        $player2 = readline('Second player`s name: ');


        $this->player1 = new Player();
        $this->player1->setName($player1);


        $this->player2 = new Player();
        $this->player2->setName($player2);

        return ['player1'=>$this->player1,'player2'=>$this->player2];
    }

    public function _input_board()
    {
        $board = readline('Set the board dimensions (Rows x Columns) Press Enter for default (6 x 7):');
        $board = trim($board);
        $board = (explode("x",$board));
        $rows = $board[0];
        $columns = $board[1];

        $rows = (!isset($rows) || empty($rows)) ? 6 : $rows;
        $columns =(!isset($columns) || empty($columns)) ? 7 : $columns;


        //check int row
        if(!$this->check_valid($rows))
        {
            echo "Invalid row input";
            echo " ";
            $this->_input_board();
            return false;
        }

        //check int columns
        if(!$this->check_valid($columns))
        {
            echo "Invalid columns input ";
            echo " ";
            $this->_input_board();
            return false;
        }

        //check row between 5 to 9
        if(!$this->int_between($rows,5,9))
        {
            echo "Board rows should be from 5 to 9";
            echo " ";
            $this->_input_board();
            return false;
        }

        //check column between 5 to 9
        if(!$this->int_between($columns,5,9))
        {
            echo "Board columns should be from 5 to 9";
            echo " ";
            $this->_input_board();
            return false;
        }

        return ['rows'=>$rows,'columns'=>$columns];
    }

    //check number between
    public function int_between($value, $start, $end)
    {
        return in_array($value, range($start, $end));
    }

    public function check_valid($value)
    {
        return is_numeric($value);
    }


    public function startGame($player1,$player2,$rows,$columns)
    {
        echo $player1->getName()." VS ".$player2->getName();
        echo " \n ";
        echo $rows." X ".$columns ." Board";
        echo " \n ";
    }

}







