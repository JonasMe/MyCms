<?php
	namespace Modules\Base\Pages\Options;

	class Image extends \Modules\Base\Pages\Engine\Option {


		public function edit() {
			return '<input type="text" name="url" placeholder="URL" />';
		}

		public function save() {
			$text = \Input::get('url',null);

			if( !is_null($text) ) {
					$this->property("imgurl",$text);
					return true;
			} else {
				return "No textfield specified.";
			}
		}

		public function make() {
			return '<img src="'.( $this->getProperty("imgurl") ? $this->getProperty("imgurl") : "" ).'"/>';
		}
	}