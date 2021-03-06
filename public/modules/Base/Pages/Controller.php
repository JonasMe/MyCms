<?php
	namespace Modules\Base\Pages;
	use \Cms\System\Navigation\MenuItem;


	class Controller extends \Cms\System\Core\Controller {

		public $frontendOptions = true;

		public function boot() {

			/* Adding a new dimension to the file paths */
			\TemplateFiles::prependPath(public_path() . "/Designs");

			/* Registering a placeholder function to the template engine. */
			$Func = new \Twig_SimpleFunction('placeholder', function ($title) {
			    return $this->get('Pages')->CurrentPage->addPlaceholder($title);
			});
			\Template::addFunction($Func);

			$Func2 = new \Twig_SimpleFunction('dump', function ($what) {
			    return var_dump($what);
			});

			\Template::addFunction($Func2);

			/* Setting up routes. Wer being nice to other modules so well set them last in the bootchain. */
			\Route::any('/', function() {
				return $this->get('Pages')->initPage();
			});

			\Route::any('{pageName}', function($slug) {
				return $this->get('Pages')->initPage($slug);
			});


		}

		public function moduleOption($object) {
				$option = $object->option;
				$placeholder = $object->placeholder;

				$props = array();
				foreach( $object->properties as $p ) {
					$props[$p->pkey] = $p->pvalue;
				}

				$optClass = \Modules::get($option->module->module_id)->get($option->class);
				$optClass->setPlaceholder($placeholder)
							->setObject($object)
							->setProperties($props);

				return $optClass;
		}

	}