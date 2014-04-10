<?php
	namespace Modules\Base\Website;

	class Website {

		private $config;

		public function __construct() {
			$this->config = array();
			try {
				//Fetch the website config.
				$this->config = Models\Site::findOrFail(1);
				
				//Are all modules loaded.
				\TemplateFiles::addPath(public_path() . "/Designs/".$this->config->template);
				\Event::fire('Website.Config.Loaded',$this->config);

			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {}
		}

		public function Config() {
			return $this->config;
		}
	}