<?php

    namespace Dez\Html\Element;

    class InputRadioElement extends InputElement {

        public function __construct($name, $value, array $attributes = [])
        {
            parent::__construct($name, $value, $attributes);
            $this->setAttribute('type', 'radio');
        }

    }