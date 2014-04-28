<?php
	namespace Modules\Base\Dashboard;
	use \Cms\System\Navigation\Menu;

	class Config extends \Cms\System\Core\ModuleConfig {

		protected $sideMenu;

		public function register() {
			$this->sideMenu = new Menu();

			\Route::any('admin', function() {
				return $this->Main->index();
			});
			\Route::any('admin/{any}', function($any) {

				return $this->Main->index();
			});

		}

		public function getSideMenu() {
			return $this->sideMenu;
		}

		public function boot() {
		}
	}