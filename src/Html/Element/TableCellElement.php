<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class TableCellElement extends HtmlElement
{

  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('td', $attributes, null);
    $this->setContent($content);
  }

}