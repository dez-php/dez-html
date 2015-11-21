<?php

    namespace Dez\Html\Element;

    use Dez\Html\HtmlElement;

    class ImgElement extends HtmlElement {

        public function __construct($src = null, array $attributes = [])
        {
            parent::__construct('img', $attributes, null);
            $this->setAttribute('src', $src)->isSingle(true);
        }

    }