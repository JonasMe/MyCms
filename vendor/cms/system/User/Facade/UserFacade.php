<?php
	namespace Cms\System\User\Facade;
	use Illuminate\Support\Facades\Facade;

	class UserFacade extends Facade {

	    protected static function getFacadeAccessor() { return 'User'; }

	}