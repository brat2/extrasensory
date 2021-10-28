<?php

class View
{
  private $content;

  public function getStartScreen()
  {
    $this->content = '
    <div>
      <a href="?start">СТАРТ</a>
    </div>
  ';
  }

  public function getGuessScreen()
  {
    $this->content = '
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
    <a href="?start">СТАРТ</a>
    </div>
  ';
  }

  public function render()
  {
    echo $this->content;
  }
}
