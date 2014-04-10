<?php
	namespace Cms\System\Template\Facade;
	use Illuminate\Support\Facades\Facade;

	class Template extends Facade {

	    protected static function getFacadeAccessor() { return 'TemplateEngine'; }

	}