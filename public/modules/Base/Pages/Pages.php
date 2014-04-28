<?php
	namespace Modules\Base\Pages;

	class Pages {

		private $prependFilePath;
		public $CurrentPage;

		public function initPage($slug = null) {
			$this->CurrentPage = $this->getPage($slug);
			return $this->CurrentPage->render();
		}

		public function getPage($id_or_slug) {
			return new Engine\Page($id_or_slug);
		}

		public function test() {
			return "TOTT";
		}


		public function ajaxModuleOptions($package,$module) {
			return $this->getModuleOptions( \Modules::get($package,$module) );
		}

		private function generatePlaceholder(Engine\Placeholder $placeholder) {
			if( $module = \Modules::get($placeholder->package,$placeholder->module) ) {
				$method = $placeholder->method;
				print $module->$method();
			} else {
				return "LOL";
			}
		}



	}