<?php
require_once "game.php";



$input_player = new Game_init();
$playes = $input_player->_input_playes();

var_dump($playes);
