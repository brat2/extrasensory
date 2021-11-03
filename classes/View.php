<?php

namespace classes;

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
}
