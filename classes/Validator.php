<?php

class Validator
{
  public static function checkNum(string $str)
  {
    if (!is_int($str)) return false;
    if (!($str >= 10 and $str <= 99)) return false;
    return $str;
  }
}
