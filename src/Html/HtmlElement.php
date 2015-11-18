<?php

    namespace Dez\Html;

    abstract class HtmlElement {

        protected $attributes   = [];

        protected $single       = false;

        protected $contentStack = [];

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
            return $this->contentStack;
        }

        /**
         * @return string
         */
        public function renderContent()
        {
            $rendered = '';

            foreach( $this->contentStack as $content ) {
                $rendered .= $content;
            }

            return $rendered;
        }

        /**
         * @param $content
         * @return $this
         */
        public function setContent($content)
        {
            $this->contentStack = ! is_array($content) ? [$content] : $content;
            return $this;
        }

        /**
         * @param $content
         * @return $this
         */
        public function appendContent($content)
        {
            array_push($this->contentStack, $content);
            return $this;
        }

        /**
         * @param $content
         * @return $this
         */
        public function prependContent($content)
        {
            array_unshift($this->contentStack, $content);
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

        /**
         * @return string
         */
        public function renderAttributes()
        {
            return implode('', iterator_to_array(call_user_func(function(){
                if(! empty($this->getAttributes())) foreach($this->getAttributes() as $name => $value){
                    yield sprintf(' %s="%s"', preg_replace('/[^0-9a-z_-]+/ui', '', $name), htmlspecialchars($value));
                }
            })));
        }

        /**
         * @return string
         */
        public function render()
        {
            $element   = sprintf("<{$this->getName()}%s>", $this->renderAttributes());

            if(count($this->getContent())> 0){
                $element .= $this->renderContent();
            }

            if(!$this->isSingle()) {
                $element .= "</{$this->getName()}>";
            }

            return $element;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->render();
        }

    }