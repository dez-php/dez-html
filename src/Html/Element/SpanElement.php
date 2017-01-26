<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class SpanElement extends HtmlElement
{

  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('span', $attributes, null);
    $this->setSingle(false)->setContent($content);
  }

}