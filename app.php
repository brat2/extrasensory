<?php
session_start();

require_once 'class/Number.php';
require_once 'class/Extrasensory.php';
require_once 'class/View.php';
require_once 'class/Sess.php';

$extr = new Extrasensory(
  [
    'Влад Кадони',
    'Ванга',
    'Нострадамус'
  ]
);
$number = new Number();
$view = new View();

if (!$_GET and !$_POST) {
  $view->startScreen();
}

if (isset($_GET['guess'])) {
  $extr->makeGuess();
  $view->guessScreen(Sess::getSession('extrasensory'));
}

if ($_POST['answer']) {
  $answer = $_POST['answer'];
  if (!is_int($answer) and !($answer >= 10 and $answer <= 99)) $view->answerErr();
  else {
    $extr->result($answer);
    $number->setter($answer);
    $view->resultScreen(
      Sess::getSession('extrasensory'),
      Sess::getSession('numbers')
    );
  }
}

print_r(Sess::getSession('extrasensory'));
print_r(Sess::getSession('numbers'));
