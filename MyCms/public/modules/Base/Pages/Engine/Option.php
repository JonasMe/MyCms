<?php
	namespace Modules\Base\Pages\Engine;

	class Option {
		
		protected $properties;
		protected $placeholder;
		protected $object;

		public function setPlaceholder($placeholder = null) {
			$this->placeholder = $placeholder;
			return $this;
		}

		public function setObject($object = null) {
			$this->object = $object;
			return $this;
		}

		public function setProperties($properties = null) {
			$this->properties = $properties;
			return $this;
		}

		public function property($key,$value) {
			$prop = \Modules\Base\Pages\Models\PlaceholderObjectProperty::where('pkey','like',$value)->first();
			if( $prop ) {
				$prop = $prop->get();
				$prop->pvalue = $value;
				$prop->save();
			} else {
				$prop = new \Modules\Base\Pages\Models\PlaceholderObjectProperty;
				$prop->pkey = $key;
				$prop->pvalue = $value;
				$prop->placeholder_object_id = $this->object->placeholder_object_id;
				$prop->save();
			}

			$this->properties["text"] = $value;
		}

		public function getProperty($key) {
			if( isset( $this->properties[$key] ) ) {
				return $this->properties[$key];
			} else {
				return false;
			}
		}

		public function save() {

		}

		public function make() {

		}

		public function edit() {

		}
	}