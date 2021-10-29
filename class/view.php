<?php

class View
{
  private $content;

  public function startScreen()
  {
    $this->content = '
    <div>
    <p>Загадайте двузначное число и нажмите на кнопку</p>
      <a href="?guess">Загадал(а)</a>
    </div>
  ';
  }

  public function guessScreen(array $extrasensory)
  {
   
    $a = null;
    // foreach ($extr as $item) {
    //   $a .= $item . ' ';
    // }
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

  public function resultScreen()
  {
    $this->content = '
    <div>
      результаты
    </div>
    <div>
    <p>Давайте попробуем ещё разок?
    Загадайте двузначное число и нажмите на кнопку</p>
    <a href="?guess">Загадал(а)</a>
    </div>
  ';
  }

  public function answerErr()
  {
    $this->content = 'ошибка ответа';
  }

  public function render()
  {
    echo $this->content;
  }
}
