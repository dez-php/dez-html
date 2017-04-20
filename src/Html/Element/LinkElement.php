<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

/**
 * Class LinkElement
 * @package Dez\Html\Element
 */
class LinkElement extends HtmlElement
{
  
  /**
   * LinkElement constructor.
   * @param null $href
   * @param array $attributes
   */
  public function __construct($href = null, array $attributes = [])
  {
    parent::__construct('link', $attributes, null);
    
    $this->setSingle(true)->setAttribute('href', $href);
  }
  
}