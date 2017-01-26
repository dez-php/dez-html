<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

/**
 * Class TextAreaElement
 *
 * @package Dez\Html\Element
 */
class TextAreaElement extends HtmlElement
{

  /**
   * TextAreaElement constructor.
   *
   * @param array $attributes
   * @param array $content
   */
  public function __construct(array $attributes, $content)
  {
    parent::__construct('textarea', $attributes, $content);
  }

}