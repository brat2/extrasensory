<?php

class View
{
  private $content;

  public function getStartScreen()
  {
    $this->content = '
    <div>
    <p>Загадайте двузначное число и нажмите на кнопку</p>
      <a href="?guess">Загадал(а)</a>
    </div>
  ';
  }

  public function getGuessScreen(array $extr)
  {
    $a = null;
    foreach ($extr as $item) {
      $a .= $item . ' ';
    }
    $this->content = $a . '
    <div>
    догадки экстрасенсов
  </div>
    <div>
    <form action="/" method="POST"><input type="text" name="answer">
      <input type="submit" value="отправить">
    </form>
  </div>
    ';
  }

  public function getResultScreen()
  {
    $this->content = '
    <div>
      результаты
    </div>
    <div>
    <p>Давайте попробуем ещё разок?
    Загадайте двузначное число и нажмите на кнопку</p>
    <a href="?start">Загадал(а)</a>
    </div>
  ';
  }

  public function render()
  {
    echo $this->content;
  }
}
