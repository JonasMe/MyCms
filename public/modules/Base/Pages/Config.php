<?php
	namespace Modules\Base\Pages;
	use \Cms\System\Navigation\MenuItem;


	class Config extends \Cms\System\Core\ModuleConfig {

		public function boot() {
			/* Adding a new dimension to the file paths */
			\TemplateFiles::addPath(public_path() . "/Designs");

			/* Registering a placeholder function to the template engine. */
			$Func = new \Twig_SimpleFunction('placeholder', function ($title) {
			    $this->Main->CurrentPage->addPlaceholder($title);
			});
			\Template::addFunction($Func);

			if( $dashBoard = \Modules::get('Base','Dashboard') ) {
				$this->addDashboardElements($dashBoard);
			}

			/* Setting up routes. Wer being nice to other modules so well set them last in the bootchain. */
			\Route::any('{pageName}', function($slug) {
				return $this->Main->initPage($slug);
			});

		}


		private function addDashboardElements($dashBoard) {
				$sideMenu = $dashBoard->getConfig()->getSideMenu();
				$pageItem = new MenuItem();
				$pageItem->setIcon('home')->setTitle('Pages')->setModule($this->Module);
				$pageItem->sitebarAjax = array( 
												"class" => "Dashboard\\PageTree",
												"method" => "renderTree",
												"args" => array()
											  );
				$pageItem->ajaxCallback = "TreeReady";
				$sideMenu->addItem($pageItem);
		}
	}