<?php

class View
{
  private $viewsPath;

  public function __construct(string $path)
  {
    $this->viewsPath = $path;
  }

  public function renderHtml(string $fileName): void
  {
    $this->viewsPath . $fileName;
    include $this->viewsPath . $fileName;
    exit;
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
