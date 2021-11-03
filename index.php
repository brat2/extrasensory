<?php
session_start();

require_once 'classes/Number.php';
require_once 'classes/Extrasensory.php';
require_once 'classes/View.php';
require_once 'classes/Sess.php';

$extr = new Extrasensory(
  [
    'Нострадамус',
    'Ванга',
    'Влад Кадони'
  ]
);
$number = new Number();
$view = new View(__DIR__ . '\\views\\');

if (!$_GET and !$_POST) {
  $view->renderHtml('start.php');
}

if (isset($_GET['go'])) {
  $extr->makeGuess();
  header('Location: /?guess');
  exit;
}

if (isset($_GET['guess'])) {
  $view->renderHtml('guess.php');
}

if (isset($_POST['answer'])) {
  $answer = $_POST['answer'];

  if (!($answer >= 10 and $answer <= 99)) {
    $_SESSION['error'] = 'Неверно указано значение';
    header('Location: /?guess');
    exit;
  }

  $extr->setRating($answer);
  $number->addValue($answer);
  header('Location: /?result');
  exit;
}

if (isset($_GET['result'])) {
  $view->renderHtml('result.php');
}
