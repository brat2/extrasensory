<?php

use app\views\View;
use app\models\User;
use app\services\Extrasensory;
use app\controllers\Controller;

session_start();

spl_autoload_register(function (string $className) {
  require_once __DIR__ . '\\' . $className . '.php';
});

$extrasensory = new Extrasensory(
  [
    'Нострадамус',
    'Ванга',
    'Влад Кадони'
  ]
);
$user = new User();
$view = new View(__DIR__ . '\\templates\\');
$controller = new Controller(
  $extrasensory,
  $user,
  $view
);

if (!$_GET and !$_POST) {
  $controller->start();
}

if (isset($_GET['go'])) {
  $controller->makeGuess();
}

if (isset($_GET['guess'])) {
  $controller->showGuess();
}

if (isset($_POST['answer'])) {
  $controller->setResult($_POST['answer']);
}

if (isset($_GET['result'])) {
  $controller->showResult();
}
