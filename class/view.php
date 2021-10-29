<?php

class View
{
  private $infoBlock;
  private $formBlock;
  private $historyBlock;

  public function startScreen()
  {
    $this->formBlock = '
    <h3>Загадайте двузначное число и нажмите на кнопку</h3>
    <button onclick="window.location.href = \'?guess\';">Готово</button>';
  }

  public function guessScreen()
  {

    $this->infoBlock = $this->getData()['info'];

    $this->formBlock = '
    <div>
    <form action="/" method="POST"><input type="text" name="answer">
      <input type="submit" value="отправить">
    </form>
  </div>
    ';
    $this->historyBlock = $this->getData()['history'];
  }

  public function resultScreen()
  {
    $this->formBlock = ' 
    <h2>Давайте попробуем ещё разок?</h2>
    <h3>Загадайте двузначное число и нажмите на кнопку</h3>
    <button onclick="window.location.href = \'?guess\';">Готово</button>';

    $this->historyBlock = $this->getData()['history'];
  }

  public function answerErr()
  {
    $this->infoBlock = $this->getData()['info'];

    $this->formBlock = '
    <div>
    <span style="color: red">Неверно указано число!</span>
    <form action="/" method="POST"><input type="text" name="answer">
      <input type="submit" value="отправить">
    </form>
  </div>
    ';
    $this->historyBlock = $this->getData()['history'];
  }

  public function infoBlock()
  {
    echo $this->infoBlock;
  }

  public function formBlock()
  {
    echo $this->formBlock;
  }

  public function historyBlock()
  {
    echo $this->historyBlock;
  }

  private function getData(): array
  {
    $extrasensory = Sess::getSession('extrasensory');
    $numbers = Sess::getSession('numbers');
    $info = '<h2>Догадки экстрасенсов:</h2><ul>';
    $history = '<h2>История загаданных чисел: ';

    foreach ($numbers as $value) {
      $history .= $value . ' ';
    }

    $history .= '</h2><ul>';

    foreach ($extrasensory as $value) {
      $info .= '<li><p>' . $value['name'] . ': ' . end($value['guesses']) . '</p></li>';

      $history .= '<li><p><b>' . $value['name'] . '</b></p><p>история догадок:  ';
      foreach ($value['guesses'] as $val) {
        $history .= $val . ' ';
      };
      $history .= '</p><p>достоверность: ' . $value['result'] . '</p></li>';
    }
    $info .= '</ul>';
    $history .= '</ul>';

    return [
      'info' => $info,
      'history' => $history
    ];
  }
}
