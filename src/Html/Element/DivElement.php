<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class DivElement extends HtmlElement
{

  /**
   * DivElement constructor.
   *
   * @param null  $content
   * @param array $attributes
   */
  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('div', $attributes, null);

    $this->setSingle(false)->setContent($content);
  }

}