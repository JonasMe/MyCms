<?php
	namespace Modules\Base\Website;

	class Controller extends \Cms\System\Core\Controller {

		public function boot() {
			$webiste = new Website();
		}

	}