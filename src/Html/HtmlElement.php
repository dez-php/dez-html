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
         * HtmlElement clone.
         */
        public function __clone()
        {

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
            $this->name = $this->sanitize($name);
            return $this;
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

            if(count($this->contentStack) > 0) foreach( $this->contentStack as $content ) {
                $rendered .= (string) $content;
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
         * @param $name
         * @return bool
         */
        public function hasAttribute($name)
        {
            return isset($this->attributes[$name]);
        }


        /**
         * @param $name
         * @param null $default
         * @return null
         */
        public function getAttribute($name, $default = null)
        {
            return $this->hasAttribute($name) ? $this->attributes[$name] : $default;
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
        public function setAttribute($name, $value = null)
        {
            $this->attributes[$this->sanitize($name)]    = $value;
            return $this;
        }

        /**
         * @param $name
         * @return $this
         */
        public function removeAttribute($name)
        {
            unset($this->attributes[$name]);
            return $this;
        }

        /**
         * @param $name
         * @param null $value
         * @return $this|null
         */
        public function data($name, $value = null)
        {
            if($value == null) {
                return $this->getAttribute("data-$name", null);
            }

            return $this->setAttribute("data-$name", $value);
        }

        /**
         * @param null $className
         * @return $this
         */
        public function addClass($className = null)
        {
            if(($classes = $this->getAttribute('class', false)) !== false) {
                $classes    = explode(' ', $classes);
                array_push($classes, $className);
                $this->setAttribute('class', implode(' ', array_map([$this, 'sanitize'], $classes)));
            } else {
                $this->setAttribute('class', $className);
            }

            return $this;
        }

        /**
         * @param null $className
         * @return bool
         */
        public function hasClass($className = null)
        {
            return (strpos($this->getAttribute('class', ''), $className) !== false);
        }

        /**
         * @param null $className
         * @return $this
         */
        public function removeClass($className = null)
        {
            if($this->hasClass($className)) {
                $classes    = explode(' ', $this->getAttribute('class', ''));
                unset($classes[array_search($className, $classes)]);
                $this->setAttribute('class', implode(' ', $classes));
            }

            return $this;
        }

        /**
         * @param null $id
         * @return $this
         */
        public function id($id = null)
        {
            $this->setAttribute('id', $id);
            return $this;
        }

        /**
         * @return string
         */
        public function renderAttributes()
        {
            return implode('', iterator_to_array(call_user_func(function(){
                if(! empty($this->getAttributes())) foreach($this->getAttributes() as $name => $value){
                    $attributeTemplate  = ($value === null ? ' %s' : ' %s="%s"');
                    yield sprintf($attributeTemplate, $this->sanitize($name), htmlspecialchars($value));
                }
            })));
        }

        /**
         * @param string $string
         * @return string
         */
        public function sanitize($string)
        {
            return trim(preg_replace('/[^0-9a-z_-]+/ui', '', $string));
        }

        /**
         * @return string
         */
        public function openTag()
        {
            return "<{$this->getName()}{$this->renderAttributes()}>";
        }

        /**
         * @return string
         */
        public function closeTag()
        {
            return "</{$this->getName()}>";
        }

        /**
         * @return string
         */
        public function render()
        {
            return $this->openTag() . $this->renderContent() . ($this->isSingle() ? null : $this->closeTag());
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->render();
        }

    }