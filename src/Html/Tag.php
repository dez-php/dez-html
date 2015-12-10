<?php

    namespace Dez\Html;

    use Dez\Html\Element\AElement;
    use Dez\Html\Element\BoldElement;
    use Dez\Html\Element\ImgElement;
    use Dez\Html\Element\SelectElement;
    use Dez\Html\Element\TableBodyElement;
    use Dez\Html\Element\TableElement;
    use Dez\Html\Element\TableHeadCellElement;
    use Dez\Html\Element\TableHeadElement;
    use Dez\Html\Element\TableRowElement;

    class Tag {

        /**
         * @param $href
         * @param null $content
         * @param array $attributes
         * @return AElement
         */
        public static function a($href, $content = null, array $attributes = [])
        {
            return new AElement($href, $content, $attributes);
        }

        /**
         * @param $src
         * @param int $width
         * @param int $height
         * @param null $class
         * @param array $attributes
         * @return ImgElement
         */
        public static function img($src, $width = 0, $height = 0, $class = null, array $attributes = [])
        {
            $image  = new ImgElement($src, $attributes);

            if( 0 < $width ) {
                $image->setAttribute('width', $width);
            }

            if( 0 < $height ) {
                $image->setAttribute('height', $height);
            }

            if( null !== $class ) {
                $image->addClass($class);
            }

            return $image;
        }

        /**
         * @param $name
         * @param array $data
         * @param null $selectedValue
         * @param array $attributes
         */
        public static function select($name, array $data = [], $selectedValue = null, array $attributes = [])
        {
            new SelectElement($name, $data, $selectedValue, $attributes);
        }

        /**
         * @param array $header
         * @param array $rows
         * @return TableElement
         */
        public static function table(array $header = [], array $rows = [])
        {

            $table      = new TableElement();
            $thead      = new TableHeadElement();
            $headRow    = new TableRowElement();
            $tbody      = new TableBodyElement();

            $thead->appendContent($headRow);

            foreach($header as $headerCell) {
                $headRow->appendContent(new TableHeadCellElement(new BoldElement($headerCell)));
            }

            $table->appendContent($thead);

            foreach($rows as $items) {

                $tableRow   = new TableRowElement();
                $tbody->appendContent($tableRow);

                foreach($items as $item) {
                    $tableRow->cell($item);
                }
            }

            $table->appendContent($tbody);

            return $table;
        }

    }