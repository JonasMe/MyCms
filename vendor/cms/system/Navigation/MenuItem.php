<?php
	namespace Cms\System\Navigation;

	class MenuItem {
		/**
		 * Menu item icon
		 * @var string
		 */
		protected $icon;

		/**
		 * Menu item title
		 * @var string
		 */
		protected $title;

		/**
		 * Menu item module
		 * @var \Cms\System\Core\Controller
		 */
		protected $module;

		/**
		 * Class to fetch
		 * @var string
		 */
		protected $class;

		/**
		 * Method to fetch
		 * @var string
		 */
		protected $method;

		protected $items;

		public function __construct() {
			$this->icon 	= null;
			$this->title 	= null;
			$this->module 	= null;
			$this->class 	= null;
			$this->method 	= null;
			$this->items 	= null;
		}
		/**
			* Setters
		**/
		public function setIcon($icon) {
			$this->icon = $icon;
			return $this;
		}

		public function setTitle($title) {
			$this->title = $title;
			return $this;
		}

		public function setModule(\Cms\System\Core\Controller $module) {
			$this->module = $module;
			return $this;
		}

		public function setClass($class) {
			$this->class = $class;
			return $this;
		}

		public function setMethod($method) {
			$this->method = $method;
			return $this;
		}
		/**
			* Getters
		**/
		public function getIcon() {
			return $this->icon;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getModule() {
			return $this->module;
		}

		public function getClass() {
			return $this->class;
		}

		public function getMethod() {
			return $this->method;
		}

		public function getcustom($custom) {
			if( isset( $this->$custom ) && !empty($this->$custom ) ) {
				return $this->$custom;
			} else {
				return false;
			}
		}

		public function addItem(\Cms\System\Navigation\MenuItem $item) {
			$this->items[] = $item;
		}


	}