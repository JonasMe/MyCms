<?php
	namespace Modules\Base\Dashboard;

	class Controller extends \Cms\System\Core\Controller {


		public function loginOrRedirect() {
			if( \User::isLoggedIn() ) {} else { 
				\Session::put('url',\Request::url() );
				header("location: /admin/login");
				die();
			}
		}

		public function register() {

			\Route::any('admin', function() {
				$this->loginOrRedirect();
				return $this->get('Dashboard')->index();
			});

			\Route::get('admin/login',function() {
				return \Template::make('@Dashboard\login.phtml', array( "url" => \Session::get('url','admin') ) );
			});

			\Route::post('admin/login',function() {
				if( \User::check( \Input::get('email',null),\Input::get('password',null),true) === true ) {
					return \Redirect::to( \Input::get('redirect','admin') );
				} else {
					$this->loginOrRedirect();
				}
			});

			\Route::get('admin/logout',function() {
				$this->loginOrRedirect();
				\User::clear();
				return \Redirect::to( "admin/login" );
			});

		}

		public function getSideMenu() {
			return $this->sideMenu;
		}

		public function boot() {
		
		}
		
		public function Auth( $permissions = array() ) {

			if( \User::isLoggedIn() !== true ) {
				if ( \Request::ajax()  ) {
					die( json_encode( array("Error" => true, "Message" => "Login" ) ) );
				} else {
					\Redirect::to('admin/login')->send();
				}
			}
		}

	}