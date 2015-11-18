<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class DivElement extends HtmlElement {

        public function __construct($content, array $attributes = [])
        {
            parent::__construct('div', $attributes, null);
            $this->setSingle(false)->setContent($content);
        }

    }