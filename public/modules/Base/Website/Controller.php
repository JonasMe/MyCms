<?php
	namespace Modules\Base\Website;

	class Controller extends \Cms\System\Core\Controller {
		private $website;

		public function boot() {
			$this->website = new Website();
		}

		public function getTemplateViews() {
			return $this->website->getViews(true);
		}

	}