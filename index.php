<?php
session_start();

require_once 'classes/Number.php';
require_once 'classes/Extrasensory.php';
require_once 'classes/View.php';
require_once 'classes/Sess.php';
require_once 'classes/Validator.php';

$extr = new Extrasensory(
  [
    'Нострадамус',
    'Ванга',
    'Влад Кадони'
  ]
);
$number = new Number();
$view = new View(__DIR__ . 'views/');

if (!$_GET and !$_POST) {
  $view->renderHtml('start.php');
}

if (isset($_GET['start'])) {
  $extr->makeGuess();
  header('Location: /?guess');
  exit;
}

if (isset($_GET['guess'])) {
  $view->renderHtml('guess.php');
}

if (isset($_POST['answer'])) {
  $answer = Validator::checkNum($_POST['answer']);

  if (!$answer) {
    $_SESSION['error'] = 'Неверно указано значение';
    $view->parserHtml('guess.php');
  }

  $extr->setRating($answer);
  $number->addValue($answer);
  $view->parserHtml('result.php');
}
