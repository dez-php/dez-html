<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class H4Element extends HtmlElement {

        /**
         * H4Element constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('h4', $attributes, null);
            $this->setContent($content);
        }

    }