<?php

namespace app\models;

class Extrasens
{
  private $name;
  private $guessList = [];
  private $result = 0;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setGuess(int $guess): void
  {
    $this->guessList[] = $guess;
  }

  public function getGuessList(): array
  {
    return $this->guessList;
  }

  public function getLastGuess(): int
  {
    return end($this->guessList);
  }

  public function setResult(int $ofset): void
  {
    $this->result += $ofset;
  }

  public function getResult(): int
  {
    return $this->result;
  }
}
