<?php
error_reporting(0);
require_once "Player.php";
require_once "Validetor.php";
require_once "game.php";
require_once "boardClass.php";

class TestGame
{


    public function TestPLayerName()
    {

    }

    public static function TestBoardFormat()
    {
        //test parameters
        $fakers = array("4x7", "10x7", "7 x 4","7 X 10","5X9","6 7","6_7","6 V 7","6x7");

        $input_player = new Game_init();

        foreach ($fakers as $faker)
        {
            $input_player->testMode=true;// fire test mode
            $input_player-> _input_board($faker);
        }
    }

    public function TestBoardDraw()
    {
        $fakers = array("8x8", "6x7", "7x8");


        foreach ($fakers as $faker)
        {
            $board = explode('x',$faker);
            $drawBoard = new BoardClass($board[0],$board[1]);
            $drawBoard->testMode=true;// fire test mode
            $drawBoard-> draw();
        }

    }

}

$test = new TestGame();
$test->TestBoardFormat();
$test->TestBoardDraw();
