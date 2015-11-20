<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class AElement extends HtmlElement {

        public function __construct($href, $content = null, array $attributes = [])
        {
            parent::__construct('a', $attributes, null);
            $this->setSingle(false)->setAttribute('href', $href)->setContent($content);
        }

    }