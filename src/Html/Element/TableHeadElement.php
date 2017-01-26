<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class TableHeadElement extends HtmlElement {

        /**
         * TableHeadElement constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('thead', $attributes, null);
            $this->setContent($content);
        }

    }