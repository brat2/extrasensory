<?php

namespace app\controllers;

use app\views\View;
use app\models\User;
use app\services\Extrasensory;

class Controller
{
  private $extrasensory;
  private $user;
  private $view;

  public function __construct(
    Extrasensory $extrasensory,
    User $user,
    View $view
  ) {
    $this->extrasensory = $extrasensory;
    $this->user = $user;
    $this->view = $view;
  }

  public function start()
  {
    $this->view->renderHtml('start.php');
  }

  public function makeGuess()
  {
    $this->extrasensory->makeGuess();
    header('Location: /?guess');
    exit;
  }

  public function showGuess()
  {
    $extrasensList = $this->extrasensory->getExtrasensList();
    $this->view->renderHtml('guess.php', ['extrasensList' => $extrasensList]);
  }

  public function setResult($answer)
  {
    if (!($answer >= 10 and $answer <= 99)) {
      $_SESSION['error'] = 'Введите двузначное число';
      header('Location: /?guess');
      exit;
    }

    $this->extrasensory->setResult($answer);
    $this->user->addNumber($answer);
    header('Location: /?result');
    exit;
  }

  public function showResult()
  {
    $extrasensList = $this->extrasensory->getExtrasensList();
    $numberList = $this->user->getNumberList();
    $this->view->renderHtml('result.php', [
      'extrasensList' => $extrasensList,
      'numberList' => $numberList
    ]);
  }
}
