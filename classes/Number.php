<?php

class Number
{
  public function __construct()
  {
    Sess::setSession(['numbers' => []]);
  }

  public function setter($number)
  {
    $numbers = Sess::getSession('numbers');
    array_push($numbers, $number);
    Sess::updateSession(['numbers' => $numbers]);
  }
}