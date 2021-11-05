<?php

namespace app\views;

class View
{
  private $viewsPath;

  public function __construct(string $path)
  {
    $this->viewsPath = $path;
  }

  public function renderHtml(string $fileName, array $data = []): void
  {
    foreach ($data as $key => $value) {
      ${$key} = $value;
    }
    include $this->viewsPath . $fileName;
    exit;
  }
}
