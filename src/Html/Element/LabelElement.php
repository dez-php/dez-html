<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class LabelElement extends HtmlElement {

        public function __construct($content, array $attributes = [])
        {
            parent::__construct('label', $attributes, null);
            $this->setSingle(false)->setContent($content);
        }

    }