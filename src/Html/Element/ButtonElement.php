<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class ButtonElement extends HtmlElement {

        /**
         * ButtonElement constructor.
         * @param $name
         * @param mixed $value
         * @param array $attributes
         */
        public function __construct($name, $value = null, array $attributes = [])
        {
            parent::__construct('button', $attributes, null);
            $this->setAttribute('name', $name)->setContent($value);
        }

    }