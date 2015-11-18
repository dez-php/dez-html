<?php

    namespace Dez\Html\Element;

    class InputTextElement extends InputElement {

        public function __construct($name, $value, array $attributes = [])
        {
            parent::__construct($name, $value, $attributes);
            $this->setAttribute('type', 'text');
        }

    }