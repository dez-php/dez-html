<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    abstract class InputElement extends HtmlElement {

        /**
         * InputElement constructor.
         * @param $name
         * @param null $value
         * @param array $attributes
         */
        public function __construct($name, $value = null, array $attributes = [])
        {
            parent::__construct('input', $attributes, null);
            $this->setSingle(true)->setAttribute('name', $name)->setAttribute('value', $value);
        }

    }