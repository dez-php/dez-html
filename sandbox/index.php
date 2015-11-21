<?php

    namespace Sandbox;

    use Dez\Html\Element\BoldElement;
    use Dez\Html\Element\ButtonElement;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\FormElement;
    use Dez\Html\Element\H1Element;
    use Dez\Html\Element\InputPasswordElement;
    use Dez\Html\Element\InputTextElement;
    use Dez\Html\Element\ItalicElement;
    use Dez\Html\Element\OptgroupElement;
    use Dez\Html\Element\OptionElement;
    use Dez\Html\Element\SelectElement;
    use Dez\Html\Element\SubmitElement;
    use Dez\Html\HtmlElement;
    use Dez\Html\Tag;

    include_once "../vendor/autoload.php";

    error_reporting(1); ini_set('display_errors', 1);

    $text       = new H1Element(new ItalicElement('Hello world', [
        'data-inner-html' => new BoldElement('test', ['id' => 'click-me'])
    ]));

    $input      = new InputTextElement('email', 'none');
    $password   = new InputPasswordElement('passwd', '123qwe');

    $div        = (new DivElement( $input ))->appendContent($password);

    $div->addClass('test-class')->addClass('lol-class')->addClass('ok');

    $button     = new ButtonElement('do', new ItalicElement(new BoldElement('search...')));

    $div->appendContent($button);

    echo $text, $input, $password, $button, $div;

    echo '<hr>';

    $form   = new FormElement('/app/save_element.php', 'post', true, new SubmitElement('save!', null));

    $form->addClass('form-component')->id(md5(time()))->prependContent( $div->removeClass('ok') )->prependContent( $text );

    echo $form;

    echo '<hr>';

    echo Tag::a('test', 'click me!')->addClass('col-md-12')->id('dezdezdez')->addClass('c');

    echo '<hr>';

    echo Tag::img('http://fox-fan.ru/news/269_1.jpg', 250, -1, 'rounded');

    $select = new SelectElement('geo_list', [
        'Ukraine' => 'ua',
        'Ukraine Regions' => [
            'Kiev' => 'ua-kyiv',
            '4e'    => 'ua-4e'
        ],
        'Japan' => 'jp',
    ], 'ua-4e');

    echo $select;

    $optgroup = new OptgroupElement();

    $optgroup->setAttribute('label', 'Test');

    for($i = 0; $i < 10; $i++) {
        $optgroup->appendContent((new OptionElement("Item $i"))->id("id-$i")->setAttribute('value', $i));
    }

    $select->prependContent($optgroup);

    echo $select;