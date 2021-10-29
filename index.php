<?php require_once 'app.php'; ?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тестовое задание</title>
  <style>
    p {
      font-size: 18pt;
      margin: 10px;
    }

    li {
      padding-bottom: 10px;
    }
    button{
      padding: 8px;
      font-size: 18pt;
    }
  </style>
</head>

<body>

  <div class="infoBlock">
    <?php $view->infoBlock(); ?>
  </div>

  <div class="formBlock">
    <?php $view->formBlock(); ?>
  </div>

  <div class="historyBlock">
    <?php $view->historyBlock(); ?>
  </div>

</body>

</html>