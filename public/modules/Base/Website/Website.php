<?php
	namespace Modules\Base\Website;

	class Website {

		private $config;
		public $template;
		public $templateFolder;


		public function __construct() {
			//$i = new \Modules\Base\Pages\Installer();
			//$i->install();

			$this->config = array();
			try {
				//Fetch the website config.
				$this->config = Models\Site::findOrFail(1);
				$this->templateFolder = public_path() . "/Designs/".$this->config->template;
				$this->template = $this->config->template;

				\TemplateFiles::prependPath($this->templateFolder);

			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {}
		}

		public function Config() {
			return $this->config;
		}

		public function getViews($overwriteRequest = false ) {
			$scandir = array_diff(scandir($this->templateFolder), array('..', '.'));
			$views = array();

			foreach( $scandir as $value ) {
				$item = $this->templateFolder . "/" . $value;
				if( is_file( $item ) ) {
					$views[] = $value;
				}
			}

			if ( \Request::ajax() && $overwriteRequest === false ) {
				return \Template::jsonView( $views );
			} else {
				return $views;
			}

		}
	}