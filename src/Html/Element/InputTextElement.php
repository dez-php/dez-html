<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class InputTextElement extends HtmlElement {

        public function __construct($name, $value, array $attributes = [])
        {
            parent::__construct('input', $attributes, null);
            $this->setSingle(true)->setAttribute('type', 'text')->setAttribute('name', $name)->setAttribute('value', $value);
        }

    }