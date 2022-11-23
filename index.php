<?php
require_once "game.php";



$input_player = new Game_init();

//input players
$playes = $input_player->_input_playes();

//echo "players: ";
//print_r($playes);

//input board : Rows and Columns
$board = $input_player->_input_board();

//echo "Rows and Columns: ";
//print_r($board);

$input_player->startGame($playes['player1'],$playes['player2'],$board['rows'],$board['columns']);




