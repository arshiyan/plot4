<?php
//error_reporting(0);
require_once "Player.php";
require_once "Validetor.php";



class Game_init
{
    private $player1;
    private $player2;
    private $validator;
    public $testMode = false;
    public static $doneGame = false;

    public function __construct()
    {
        $this->StartPrint();
        $this->validator = new Validetor();
    }
    public function _input_playes()
    {
        $player1 = readline('First player`s name: ');
        $player2 = readline('Second player`s name: ');


        $this->player1 = new Player();
        $this->player1->setName($player1);
        $this->player1->setSymbol("o");


        $this->player2 = new Player();
        $this->player2->setName($player2);
        $this->player2->setSymbol("*");

        return ['player1'=>$this->player1,'player2'=>$this->player2];
    }

    public function _input_board($boardInput = null)
    {
        if($this->validator->checkNotEmpty($boardInput))
        {
            $board = $boardInput;
        }
        else
        {
            $board = readline('Set the board dimensions (Rows x Columns) Press Enter for default (6 x 7):');
        }

        if(!$this->validator->checkBoardInput($board))
        {
            echo "Invalid row input";
            echo " \n ";
            $this->returnToStart();
            return false;
        }

        $board = $this->validator->cleanString($board);
        $board = explode('x',$board);

        $rows = $board[0];
        $columns = $board[1];

        $rows = (!$this->validator->checkNotEmpty($rows)) ? 6 : $rows;
        $columns =(!$this->validator->checkNotEmpty($columns)) ? 7 : $columns;

        //check int row
        if(!$this->check_valid($rows))
        {
            echo "Invalid row input";
            echo " \n ";
            $this->returnToStart();
            return false;
        }

        //check int columns
        if(!$this->check_valid($columns))
        {
            echo "Invalid columns input ";
            echo " \n ";
            $this->returnToStart();
            return false;
        }

        //check row between 5 to 9
        if(!$this->int_between($rows,5,9))
        {
            echo "Board rows should be from 5 to 9";
            echo " \n ";
            $this->returnToStart();
            return false;
        }

        //check column between 5 to 9
        if(!$this->int_between($columns,5,9))
        {
            echo "Board columns should be from 5 to 9";
            echo " \n ";
            $this->returnToStart();
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


    // print
    // <1st player`s name> VS <2nd players name>
    //<Rows> X <Columns> board
    public function startGame($player1,$player2,$rows,$columns)
    {
        echo $player1->getName()." VS ".$player2->getName();
        echo " \n ";
        echo $rows." X ".$columns ." Board";
        echo " \n ";
    }

    public function StartPrint()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            system('cls');
        } else {
            system('clear');
        }

        echo "Plot Four";
        echo " \n ";
    }

    public function returnToStart()
    {
        if($this->testMode)
        {

            return false;
        }
        else
        {
            $this->_input_board();
        }
    }

    public function _input_game()
    {

    }





}







