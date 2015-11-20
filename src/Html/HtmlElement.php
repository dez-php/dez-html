<?php

    namespace Dez\Html;

    abstract class HtmlElement {

        protected $attributes   = [];

        protected $single       = false;

        protected $content      = null;

        protected $name;

        /**
         * HtmlElement constructor.
         * @param $name
         * @param array $attributes
         * @param null $content
         */
        public function __construct($name, array $attributes = [], $content = null)
        {
            $this->setName($name)->setAttributes($attributes)->setContent($content);
        }

        /**
         * @return null
         */
        public function getContent()
        {
            return (is_object($this->content) && $this->content instanceof HtmlElement)
                ? $this->content->render() : $this->content;
        }

        /**
         * @param null $content
         * @return static
         */
        public function setContent($content)
        {
            $this->content = $content;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getAttributes()
        {
            return $this->attributes;
        }

        /**
         * @param mixed $attributes
         * @return static
         */
        public function setAttributes(array $attributes = [])
        {
            if(count($attributes) > 0) foreach($attributes as $name => $value) {
                $this->setAttribute($name, $value);
            }
            return $this;
        }

        /**
         * @param $name
         * @param $value
         * @return $this
         */
        public function setAttribute($name, $value)
        {
            $this->attributes[$name]    = $value;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isSingle()
        {
            return $this->single;
        }

        /**
         * @param boolean $single
         * @return static
         */
        public function setSingle($single)
        {
            $this->single = $single;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         * @return static
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        public function render()
        {
            $element    = "<{$this->getName()}";

            $attributes = implode(' ', iterator_to_array(
                call_user_func(function(){
                    foreach($this->getAttributes() as $name => $value) {
                        yield sprintf('%s="%s"', preg_replace('/[^a-z_-]+/ui', '', $name), htmlspecialchars($value));
                    }
                })
            ));

            if(!empty($this->getAttributes())){
                $attributes = [];
                foreach($this->getAttributes() as $name => $value){
                    $attributes[]   = sprintf('%s="%s"', $name, htmlspecialchars($value));
                }
                $element    .= ' ' . implode(' ', $attributes);
            }

            $element    .= '>';

            if(($content = $this->getContent()) !== null){
                $element .= $content;
            }

            if(!$this->isSingle()) {
                $element .= "</{$this->getName()}>";
            }

            return $element;
        }

    }