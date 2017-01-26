<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class TableRowElement extends HtmlElement
{

  /**
   * TableRowElement constructor.
   *
   * @param null  $content
   * @param array $attributes
   */
  public function __construct($content = null, array $attributes = [])
  {
    parent::__construct('tr', $attributes, null);
    $this->setContent($content);
  }

  /**
   * @param null $content
   * @return TableCellElement
   */
  public function cell($content = null)
  {
    $cell = new TableCellElement($content);
    $this->appendContent($cell);

    return $cell;
  }

}
