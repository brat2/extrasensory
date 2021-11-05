<?php

namespace app\services;

use app\services\Sess;
use app\models\Extrasens;

class Extrasensory
{
  private $extrasensList = [];

  public function __construct(array $names)
  {
    if (isset($_SESSION['extrasensList'])) {
      $this->extrasensList = Sess::get('extrasensList');
    } else {
      $this->createExtrasens($names);
    }
  }

  public function getExtrasensList(): array
  {
    return $this->extrasensList;
  }

  public function makeGuess(): void
  {
    foreach ($this->extrasensList as $extrasens) {
      $guess = mt_rand(10, 99);
      $extrasens->setGuess($guess);
    }

    Sess::set(['extrasensList' => $this->extrasensList]);
  }

  public function setResult(int $answer): void
  {
    foreach ($this->extrasensList as $extrasens) {
      $lastGuess = $extrasens->getLastGuess();
      if ($lastGuess == $answer)
        $extrasens->setResult(1);
      else
        $extrasens->setResult(-1);
    }

    Sess::set(['extrasensList' => $this->extrasensList]);
  }

  private function createExtrasens(array $names): void
  {
    array_map(function ($name) {
      $this->extrasensList[] = new Extrasens($name);
    }, $names);
  }
}
