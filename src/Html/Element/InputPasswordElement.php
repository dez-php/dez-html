<?php

    namespace Dez\Html\Element;

    class InputPasswordElement extends InputElement {

        public function __construct($name, $value, array $attributes = [])
        {
            parent::__construct($name, $value, $attributes);
            $this->setAttribute('type', 'password');
        }

    }