<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class H2Element extends HtmlElement {

        /**
         * H2Element constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('h2', $attributes, null);
            $this->setContent($content);
        }

    }