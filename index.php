<?php
session_start();

require_once 'class/riddle.php';
require_once 'class/extrasensory.php';
require_once 'class/view.php';

$view = new View();
$extr = new Extrasensory(
  'Влад Кадони',
  'Ванга',
  'Нострадамус'
);

if (!$_GET and !$_POST) {
  $view->getStartScreen();
}

if (isset($_GET['guess'])) {
  $extr->setGuesses();
  $view->getGuessScreen($extr->getGuesses());
}

if ($_POST['answer']) {
  $view->getResultScreen();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тестовое задание</title>
</head>

<body>

  <?php $view->render(); ?>

</body>

</html>