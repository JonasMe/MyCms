<?php
	namespace Modules\Base\Pages\Options;

	class RichText extends \Modules\Base\Pages\Engine\Option {

		public function edit() {
			\Template::appendJs('<script src="'.\Modules::get('Base','Pages')->getViewFolder().'ckeditor/ckeditor.js"></script>');
			\Template::appendJs('<script type="text/javascript">$(function() { CKEDITOR.replace( "pageText" );
 });</script>');

			$txt = \Input::get('text',null);
			if( !is_null($txt) ) {
				$this->property("text",$txt);
			}

			return \Template::make('@Pages\Options/editRichText.phtml', array("text" => ( $this->getProperty("text") ? $this->getProperty("text") : "")));
		}

		public function make() {
			return ( $this->getProperty("text") ? $this->getProperty("text") : "" );
		}
	}