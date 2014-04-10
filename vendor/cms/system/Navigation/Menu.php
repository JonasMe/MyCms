<?php
	namespace Cms\System\Navigation;

	class Menu {

		protected $items;

		public function __construct() {
			$this->items = array();
		}

		public function addItem(\Cms\System\Navigation\MenuItem $item) {
			$this->items[] = $item;
		}

		public function getAll() {
			return $this->items;
		}

		public function addCustomParameter($parameter) {
			$this->$parameter = null;
		}

	}