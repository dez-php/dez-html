<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

/**
 * Class StyleElement
 * @package Dez\Html\Element
 */
class StyleElement extends HtmlElement
{
  
  /**
   * StyleElement constructor.
   * @param null $content
   * @param array $attributes
   */
  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('style', $attributes, null);
    
    $this->setSingle(false)->setContent($content);
  }
  
}