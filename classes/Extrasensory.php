<?php

class Extrasensory
{

  public function __construct(array $names)
  {
    foreach ($names as $k => $name) {
      $extrasensory[$k]['name'] = $name;
      $extrasensory[$k]['guesses'] = [];
      $extrasensory[$k]['result'] = 0;
    }

    Sess::setSession(['extrasensory' => $extrasensory]);
  }

  public function makeGuess(): void
  {
    $extrasensory = Sess::getSession('extrasensory');

    for ($i = 0; $i < count($extrasensory); $i++) {
      array_push($extrasensory[$i]['guesses'], rand(10, 99));
    }
    Sess::updateSession(['extrasensory' => $extrasensory]);
  }

  public function setRating(int $answer): void
  {
    $extrasensory = Sess::getSession('extrasensory');

    for ($i = 0; $i < count($extrasensory); $i++) {
      $last = end($extrasensory[$i]['guesses']);
      if ($last == $answer)
        $extrasensory[$i]['result']++;
      else
        $extrasensory[$i]['result']--;
    }
    Sess::updateSession(['extrasensory' => $extrasensory]);
  }
}
