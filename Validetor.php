<?php
error_reporting(0);

class Validetor
{
    //check string
    public function checkString()
    {

        return true;
    }

    //check integer
    public function checkInt($value)
    {
        return is_numeric($value);
    }

    //check row integer
    public function checkRowInt()
    {

        return true;
    }

    //check column integer
    public function checkColumnInt()
    {

        return true;
    }


    //check format of board input
    public function checkBoardInput($board)
    {
        $board = $this->cleanString($board);

        //enter btn and set default value
        if(strlen($board) == 0 )
        {
           return true;
        }

        //check count of input for board
        if(strlen($board) >= 3 )
        {
            $board = strtolower($board);

            if(!strpos($board,'x'))
            {
                return false;
            }

            $board = explode('x',$board);

            //check not int
            if(!$this->checkInt($board[0]) || !$this->checkInt($board[1]))
            {
                return false;
            }

            return true;
        }

        return false;
    }

    //check number between
    public function checkIntBetween($value, $start, $end)
    {
        return in_array($value, range($start, $end));
    }

    //set and not empty
    public function checkNotEmpty($value)
    {
        return(isset($value) || !empty($value));
    }

    public function cleanString($string)
    {
        $string = trim($string);
        $string = str_replace(' ', '', $string);
        $string = strtolower($string);
        return $string;
    }



}
