<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

/**
 * Class LiElement
 * @package Dez\Html\Element
 */
class LiElement extends HtmlElement
{

  /**
   * LiElement constructor.
   *
   * @param null  $content
   * @param array $attributes
   */
  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('li', $attributes, null);
    $this->setSingle(false)->setContent($content);
  }

}