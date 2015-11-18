<?php

    namespace Sandbox;

    use Dez\Html\Decorators\LabledDecorator;
    use Dez\Html\Element\ButtonElement;
    use Dez\Html\Element\InputPasswordElement;
    use Dez\Html\Element\InputRadioElement;
    use Dez\Html\Element\InputTextElement;
    use Dez\Html\HtmlElement;

    include_once "../vendor/autoload.php";

    error_reporting(1); ini_set('display_errors', 1);

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

    $text       = new Header1Element(new ItalicElement('Hello world', [
        'data-inner-html' => new BoldElement('test', ['id' => 'click-me'])
    ]));

    $input      = new InputTextElement('email', 'none');
    $password   = new InputPasswordElement('passwd', '123qwe');

    $button     = new ButtonElement('do', new ItalicElement(new BoldElement('search...')));

    echo $text, $input, $password, $button;

    echo '<hr>';

    for($i = 0; $i < 10; $i++){
        $labled = (new LabledDecorator(new InputTextElement("name", "id_{$i}")))->setText('Text test ' . $i);
        echo $labled->render();
//        $radio  = new InputRadioElement("name", "id_{$i}");
//        echo $radio;
    }