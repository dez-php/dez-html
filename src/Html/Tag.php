<?php

    namespace Dez\Html;

    use Dez\Html\Element\AElement;

    class Tag {

        static public function a($href, $content = null, array $attributes = [])
        {
            return (string) (new AElement($href, $content, $attributes));
        }

    }