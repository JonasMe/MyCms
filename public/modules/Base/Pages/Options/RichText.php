<?php
	namespace Modules\Base\Pages\Options;

	class RichText extends \Modules\Base\Pages\Engine\Option {


		public function edit() {
			return \Template::make('@Pages\Options/editRichText.phtml', array("random" => rand(0,99999), "text" => ( $this->getProperty("text") ? $this->getProperty("text") : "")));
		}

		public function save() {
			$text = \Input::get('text',null);

			if( !is_null($text) ) {
					$this->property("text",$text);
					return true;
			} else {
				return "No textfield specified.";
			}
		}

		public function make() {
			return ( $this->getProperty("text") ? $this->getProperty("text") : "" );
		}
	}