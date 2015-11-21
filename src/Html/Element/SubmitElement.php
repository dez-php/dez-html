<?php

    namespace Dez\Html\Element;

    class SubmitElement extends InputElement {

        public function __construct($value, $name = null, array $attributes = [])
        {
            parent::__construct($name, $value, $attributes);
            $this->setAttribute('type', 'submit');
        }

    }