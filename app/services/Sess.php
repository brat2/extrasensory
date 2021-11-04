<?php

namespace classes;

class Sess
{
  public static function setSession(array $arr): void
  {
    if (!isset($_SESSION[key($arr)])) $_SESSION[key($arr)] = $arr[key($arr)];
  }

  public static function updateSession(array $arr): void
  {
    $_SESSION[key($arr)] = $arr[key($arr)];
  }

  public static function getSession(string $name): array
  {
    return  $_SESSION[$name];
  }
}
