<?php

namespace app\models;

use app\services\Sess;

class User
{
  private $numberList = [];

  public function __construct()
  {
    if (isset($_SESSION['numberList'])) {
      $this->numberList = Sess::get('numberList');
    }
  }
  public function getNumberList(): array
  {
    return $this->numberList;
  }

  public function addNumber($number)
  {
    $this->numberList[] = $number;
    Sess::set(['numberList' => $this->numberList]);
  }
}
