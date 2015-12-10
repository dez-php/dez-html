<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class TableElement extends HtmlElement
    {

        /**
         * TableElement constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('table', $attributes, null);
            $this->setContent($content);
        }

        /**
         * @param mixed $rowTitle
         * @return TableRowElement
         */
        public function row($rowTitle = null)
        {
            $tableRow   = new TableRowElement(new TableCellElement($rowTitle));
            $this->appendContent($tableRow);

            return $tableRow;
        }

    }