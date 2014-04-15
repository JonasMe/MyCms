<?php
	namespace Cms\System\Template;
	use Illuminate\View\ViewServiceProvider;
	use Twig_Environment;
	use Twig_Lexer;

	class TemplateServiceProvider extends ViewServiceProvider {

		public function register() {
	        \App::singleton('TemplateFiles', function()
	        {
	        	return new \Twig_Loader_Filesystem();
	        });
		}

		public function boot() {
			$loader = \App::make('TemplateFiles');
	        \App::singleton('TemplateEngine', function() use($loader)
	        {
	        	return new TemplateEnviornment($loader, array(
	        		'autoescape' => false,
			    	'cache' => storage_path() . '/template',
			    	'auto_reload' => true,
				));
	        });
		}
	}