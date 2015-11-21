<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class H1Element extends HtmlElement {

        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('h1', $attributes, null);
            $this->setContent($content);
        }

    }