<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class TableFooterElement extends HtmlElement {

        /**
         * TableFooterElement constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('tfoot', $attributes, null);
            $this->setContent($content);
        }

    }