<?php
require_once "config.php";

class TestGame
{

    public function TestBoardFormat()
    {
        //test parameters
        $fakers = array("4x7", "10x7", "7 x 4","7 X 10","5X9","6 7","6_7","6 V 7","6x7");

        $input_player = new GameClass();

        foreach ($fakers as $faker)
        {
            echo $faker;
            echo " \n ";
            $input_player->testMode=true;// fire test mode
            $result = $input_player-> _input_board($faker);

            if(isset($result) && !empty($result))
            {
                $players = $this->fakePlayer();
                $input_player->startGame( $players['player1'],$players['player2'],$result['rows'],$result['columns']);
            }
        }
    }

    public function TestBoardDraw()
    {
        $fakers = array("8x8", "6x7", "7x8");


        foreach ($fakers as $faker)
        {
            echo $faker;
            echo " \n ";
            $board = explode('x',$faker);
            $drawBoard = new BoardClass($board[0],$board[1]);
            $drawBoard->testMode=true;// fire test mode
            $drawBoard->draw();
        }

    }

    public function testGamePlay()
    {
        $fakers =
            [

                ["board"=>"6x8","args" => [4,4,5,4,7,8,8,1,'end','']],
                ["board"=>"7x8","args" => [0,9,'a12',1,1,1,1,1,1,1,1,'end','']],
                ["board"=>"5x7","args" => [2,3,2,2,1,4,'end','']],
                ["board"=>"6x8","args" => [2,2,3,3,4,4,5,'']],
                ["board"=>"5x7","args" => [3,4,3,4,3,4,2,4,'']],
                ["board"=>"7x7","args" => [3,4,4,5,5,6,5,3,6,6,6,'']],//left diagonal
                ["board"=>"7x8","args" => [3,5,4,4,3,1,7,3,3,2,2,2,1,2,'']],//right diagonal
                ["board"=>"5x5","args" => [1,1,1,1,1,2,3,4,2,2,2,3,3,3,5,4,4,4,4,5,5,5,5,2,3,4,1,1,1,'']],
                ["board"=>"6x7","args" => [7,6,7,5,7,4,7,'']]

            ];
            /*$fakers =
            [
                //["board"=>"7x7","args" => [3,4,4,5,5,6,5,3,6,6,6,'']],//left diagonal
                //["board"=>"7x8","args" => [3,5,4,4,3,1,7,3,3,2,2,2,1,2,1,1,2,1,'']],//right diagonal
                //["board"=>"5x5","args" => [1,1,1,1,1,2,3,4,2,2,2,3,3,3,5,4,4,4,4,5,5,5,5,2,3,4,1,1,1,'']],
                //["board"=>"5x5","args" => [1,1,1,1,1,2,3,4,2,2,2,3,3,'']],

            ];*/
        foreach ($fakers as $faker) {


            $board = explode('x', $faker['board']);
            $drawBoard = new BoardClass($board[0], $board[1]);
            $drawBoard->testMode = true;// fire test mode

            $players = $this->fakePlayer();
            $input_player = new GameClass();
            $input_player->startGame($players['player1'], $players['player2'], $board[0], $board[1]);
            $game = new PlayGameClass($drawBoard->playPosition, $this->fakePlayer());
            $game->matrixArray = ["rows" => $board[0], "columns" => $board[1]];

            $inp = "start";
            foreach ($faker['args'] as $key=>$faker_input) {


                    $drawBoard->draw(); // draw runtime board
                    $Currentplayer = $game->nextPlayer(); //switch player and return current player
                    $winner = new WinnerCheck(
                        $drawBoard->playPosition,
                        $this->fakePlayer(),
                        ["rows" => $board[0], "columns" => $board[1]]
                    );

                    if($winner->winCheck())
                    {
                        break;
                    }
                    echo $Currentplayer->getName()."'s turn: ";
                    echo " \n ";
                    // $inp = readline($Currentplayer->getName()."'s turn: ");
                    echo $faker_input;
                    $inp = $faker_input;
                    echo " \n ";
                    $drawBoard->playPosition = $game->setToColumn($inp, $Currentplayer); // return last player position

                    if($inp == 'end')
                    {
                        break;
                    }
            }

            /*sleep(2);
            echo " \n ";
            echo " Next Test is run:";
            echo " \n ";*/
        }





    }

    public function fakePlayer()
    {
        $player1 = new Player();
        $player1->setName("javad");
        $player1->setSymbol("o");


        $player2 = new Player();
        $player2->setName("hadi");
        $player2->setSymbol("*");

        return ['player1'=>$player1,'player2'=>$player2];

    }

}

$test = new TestGame();
//$test->TestBoardFormat();
//$test->TestBoardDraw();
$test->testGamePlay();
