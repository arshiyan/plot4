<?php
echo "Plot Four";





class Game_init
{
    private $player1;
    private $player2;

    public function _input_playes()
    {
        $this->player1 = readline('First player`s name: ');
        $this->player2 = readline('Second player`s name: ');

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
        $columns = (!isset($columns) || empty($columns)) ? 7 : $columns;

        return ['rows'=>$rows,'columns'=>$columns];
    }

}







