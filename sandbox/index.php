<?php

    namespace Sandbox;

    use Dez\Html\Element\AElement;
    use Dez\Html\Element\BoldElement;
    use Dez\Html\Element\ButtonElement;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\FormElement;
    use Dez\Html\Element\H1Element;
    use Dez\Html\Element\InputButtonElement;
    use Dez\Html\Element\InputCheckboxElement;
    use Dez\Html\Element\InputPasswordElement;
    use Dez\Html\Element\InputRadioElement;
    use Dez\Html\Element\InputRangeElement;
    use Dez\Html\Element\InputTextElement;
    use Dez\Html\Element\ItalicElement;
    use Dez\Html\Element\LiElement;
    use Dez\Html\Element\OptgroupElement;
    use Dez\Html\Element\OptionElement;
    use Dez\Html\Element\ScriptElement;
    use Dez\Html\Element\SelectElement;
    use Dez\Html\Element\InputSubmitElement;
    use Dez\Html\Element\SpanElement;
    use Dez\Html\Element\TableElement;
    use Dez\Html\Element\UlElement;
    use Dez\Html\Tag;

    include_once "../vendor/autoload.php";

    error_reporting(1); ini_set('display_errors', 1);


    $table = new TableElement();

    for($i = 0; $i < 15; $i++) {
        $row    = $table->row(new ItalicElement(new BoldElement("Row #$i")));
        for($j = 0; $j < 15; $j++) {
            $cell = $row->cell("Col #$j");
            $cell->addClass('td td-'.$j);
        }
    }

//    die(var_dump($table));

    echo $table;

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

    $form   = new FormElement('/app/save_element.php', 'post', true, new InputSubmitElement('save!', null));

    $form->addClass('form-component')->id(md5(time()))->prependContent( $div->removeClass('ok') )->prependContent( $text );

    echo $form;

    $tableForm  = new TableElement();

    $tableForm->row('Test Form!!!')->cell($form);

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
    ], rand(0, 9));

    echo $select;

    $optgroup = new OptgroupElement();

    $optgroup->setAttribute('label', 'Test');

    for($i = 0; $i < 10; $i++) {
        $optgroup->appendContent((new OptionElement("Item $i"))->id("id-$i")->setAttribute('value', $i));
    }

    $select->prependContent($optgroup);

    echo $select, (new ScriptElement('js/jquery.js'))->async(true);

    echo (new InputCheckboxElement('test', 'asd'));

    echo (new InputButtonElement('click me!!1'));

    $ul = new UlElement([
        new LiElement('Test item'),
        new LiElement('Test item 2'),
        new AElement('?test=qwerty', new LiElement('With link')),
        new BoldElement(new AElement('?test=qwerty', new LiElement('With link in bold')))
    ]);

    $ul->appendContent(new LiElement(
        [
            'inner cloned UL',
            clone($ul)
        ]
    ));

    $ul->appendContent(new LiElement([
        'simple text',
        new AElement('?go=нахуй', [
            new BoldElement('ok'),
            new ItalicElement(new SpanElement(' -> span'))
        ]),
        new ItalicElement(
            new BoldElement('!')
        )
    ]));

    for($i = 0; $i < 10; $i++) {
        if($i % 3 == 0) {
            $ul->appendContent(new AElement("?li=$i", new LiElement("item $i")));
        } else {
            $ul->appendContent(new LiElement("item $i"));
        }
    }

    echo $ul;

    echo $table, $tableForm;

    echo new InputRangeElement('age', 0, 70, 1, 25);
