<?php

namespace app\services;

class Sess
{
  public static function set(array $arr): void
  {
    $s_data = serialize($arr[key($arr)]);
    $_SESSION[key($arr)] = $s_data;
  }

  public static function get(string $key)
  {
    return unserialize($_SESSION[$key]);
  }
}
