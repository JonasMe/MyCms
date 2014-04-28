<?php
	namespace Cms\System\User;


	class UserServiceProvider extends \Illuminate\Support\ServiceProvider {

		public function register() {
	        \App::singleton('User', function()
	        {
	        	return new Authentication();
	        });
		}

		public function boot() {


		}
	}