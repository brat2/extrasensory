<?php

class Extrasensory
{
  private $info = [];

  public function __construct(...$persons)
  {
    foreach ($persons as $k => $person) {
      $this->info[$k]['name'] = $person;
      $this->info[$k]['guesses'] = [];
      $this->info[$k]['result'] = 0;
    }
     $_SESSION['info'] = $this->info;
  }

  public function setGuesses()
  {
    for ($i = 0; $i < count($this->info); $i++) {
      $this->info[$i]['guesses'][] = rand(10, 99);
    }
    $_SESSION['info'] = $this->info;
  }

  public function getGuesses()
  {
    print_r($_SESSION['info']);
    exit;
    // foreach($this->persons){

    // }
  }
}
