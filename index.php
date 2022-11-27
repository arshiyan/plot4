<?php
error_reporting(E_ERROR | E_PARSE);

require_once "Player.php";
require_once "game.php";
require_once "boardClass.php";
require_once "PlayGameClass.php";


$input_player = new Game_init();

//input players
$playes = $input_player->_input_playes();

//input board : Rows and Columns
$boardInput = $input_player->_input_board();

//echo "Rows and Columns: ";
$input_player->startGame($playes['player1'],$playes['player2'],$boardInput['rows'],$boardInput['columns']);

$board = new BoardClass($boardInput['rows'],$boardInput['columns']);
$game = new PlayGameClass($board->playPosition,$playes);
$game->matrixArray = ["rows" => $boardInput['rows'],"columns" => $boardInput['columns']];

$inp = "start";
while ($inp != "end")
{
    $board->draw(); // draw runtime board
    $Currentplayer = $game->nextPlayer(); //switch player and return current player
    $inp = readline($Currentplayer->getName()."'s turn: ");
    $board->playPosition = $game->setToColumn($inp,$Currentplayer); // return last player position
}







