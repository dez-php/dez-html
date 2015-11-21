<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class H3Element extends HtmlElement {

        /**
         * H3Element constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('h3', $attributes, null);
            $this->setContent($content);
        }

    }