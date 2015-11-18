<?php

    namespace Dez\Html;

    abstract class HtmlDecorator {

        public function __toString()
        {
            return $this->render();
        }

        abstract public function render();

    }