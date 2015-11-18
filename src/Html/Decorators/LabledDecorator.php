<?php

    namespace Dez\Html\Decorators;

    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\LabelElement;
    use Dez\Html\HtmlDecorator;
    use Dez\Html\HtmlElement;

    class LabledDecorator extends HtmlDecorator {

        protected $element;

        protected $text;

        public function __construct(HtmlElement $element)
        {
            $this->element  = $element;
        }

        public function render()
        {
            return (string) (new LabelElement( $this->element ))->prependContent($this->getText());
        }

        public function getElement()
        {
            return $this->element;
        }

        /**
         * @return mixed
         */
        public function getText()
        {
            return $this->text;
        }

        /**
         * @param mixed $text
         * @return $this
         */
        public function setText($text)
        {
            $this->text = $text;
            return $this;
        }

    }