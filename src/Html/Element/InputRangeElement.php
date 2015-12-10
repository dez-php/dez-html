<?php

    namespace Dez\Html\Element;

    class InputRangeElement extends InputElement {

        /**
         * InputRangeElement constructor.
         * @param $name
         * @param int $min
         * @param int $max
         * @param int $step
         * @param null $value
         * @param array $attributes
         */
        public function __construct($name, $min = 0, $max = 10, $step = 1, $value = null, array $attributes = [])
        {
            parent::__construct($name, $value, $attributes);
            $this
                ->setAttribute('type', 'range')
                ->setAttribute('min', (int) $min)
                ->setAttribute('max', (int) $max)
                ->setAttribute('step', (int) $step)
            ;
        }

    }