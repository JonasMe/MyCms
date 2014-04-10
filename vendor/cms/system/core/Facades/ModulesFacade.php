<?php
	namespace Cms\System\Core\Facades;
	use Illuminate\Support\Facades\Facade;

	class ModulesFacade extends Facade {

	    protected static function getFacadeAccessor() { return 'Modules'; }

	}