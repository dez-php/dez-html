<?php

namespace Dez\Html\Element;

use Dez\Html\HtmlElement;

class SelectElement extends HtmlElement
{

  /**
   * SelectElement constructor.
   *
   * @param null  $name
   * @param array $data
   * @param null  $selectedValue
   * @param array $attributes
   */
  public function __construct($name = null, array $data = [], $selectedValue = null, array $attributes = [])
  {
    parent::__construct('select', $attributes, null);

    $this->setAttribute('name', $name);

    $this->data('selected', $selectedValue);

    foreach ($data as $title => $item) {

      if (is_array($item)) {
        $group = new OptgroupElement();

        foreach ($item as $optionTitle => $optionValue) {
          $option = new OptionElement($optionTitle);
          $group->setAttribute('label', $title)->appendContent($option->setAttribute('value', $optionValue));
        }

        $this->appendContent($group);
      } else {
        $option = new OptionElement($title);
        $this->appendContent($option->setAttribute('value', $item));
      }

    }

  }

  /**
   * @return string
   */
  public function render()
  {
    $this->makeSelected($this->getContent());

    return parent::render();
  }

  /**
   * @param array $items
   * @return $this
   */
  protected function makeSelected(array $items = [])
  {
    foreach ($items as $item) {

      if ($item instanceof HtmlElement) {

        if ($item instanceof OptgroupElement) {
          $this->makeSelected($item->getContent());
        } else if ($item instanceof OptionElement && $item->getAttribute('value', null) == $this->data('selected')) {
          $item->setAttribute('selected', 'selected');
        }
      }
    }

    return $this;
  }

}