<?php

    namespace Sandbox;

    use Dez\Html\Element\ButtonElement;
    use Dez\Html\Element\InputTextElement;
    use Dez\Html\HtmlElement;

    include_once "../vendor/autoload.php";

    class BoldElement extends HtmlElement {
        public function __construct($content, array $attributes = [])
        {
            parent::__construct('b', $attributes, null);
            $this->setContent($content);
        }
    }

    class ItalicElement extends HtmlElement {
        public function __construct($content, array $attributes = [])
        {
            parent::__construct('i', $attributes, null);
            $this->setContent($content);
        }
    }

    class Header1Element extends HtmlElement {
        public function __construct($content, array $attributes = [])
        {
            parent::__construct('h1', $attributes, null);
            $this->setContent($content);
        }
    }

    $text       = new Header1Element(new ItalicElement('Hello world'));

    $input      = new InputTextElement('email', 'none');
    $button     = new ButtonElement('do', new ItalicElement(new BoldElement('search...')));

    echo $text->render(), $input->render(), $button->render();