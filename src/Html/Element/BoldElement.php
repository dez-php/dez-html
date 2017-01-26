<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class BoldElement extends HtmlElement
{

  /**
   * BoldElement constructor.
   *
   * @param       $content
   * @param array $attributes
   */
  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('b', $attributes, null);
    $this->setContent($content);
  }

}