<?php
	namespace Modules\Base\Dashboard;
	use Knp\Menu\MenuFactory;

	class Controller extends \Cms\System\Core\Controller {

		protected $sideMenu;

		public function register() {
			$factory = new MenuFactory();
			$this->sideMenu = $factory->createItem('sideMenu');	

			\Route::any('admin', function() {
				return $this->get('Dashboard')->index();
			});

	        \Route::any('admin/{module}/{class}/{method}', function($module,$class,$method) {
	                    if( strpos($module, ".") !== false ) {
	                    $exploded = explode(".", $module);
	                    $package = $exploded[0];
	                    $module = $exploded[1];
	                    $class  = \Input::get('class',  $class );
	                    $method = \Input::get('method', $method );
	                    $args   = \Input::get('args',   array() );
	                    $args   = ( !is_array($args) ? json_decode($args,true) : $args);

	                    if( $mod = \Modules::get($package,$module) ) {
	                        if( is_null($class) ) {
	                            return ""; //$class = $mod->getMain();
	                        }
	                        $dashboard = $this->get('Dashboard');
	                        return $dashboard->index( $mod->getAdvanced($class,$method,$args) );
	                    }
	                }

	        });

	        \Route::any('admin/{module}/{class}/{method}/{arguments}', function($module,$class,$method,$arguments) {
	                    if( strpos($module, ".") !== false ) {
	                    $exploded = explode(".", $module);
	                    $package = $exploded[0];
	                    $module = $exploded[1];
	                    $class  = \Input::get('class',  $class );
	                    $method = \Input::get('method', $method );
	                    $args   = \Input::get('args',   ( strpos($arguments, "/") !== false ? explode("/",$arguments) : array($arguments) ) );
	                    $args   = ( !is_array($args) ? json_decode($args,true) : $args);

	                    if( $mod = \Modules::get($package,$module) ) {
	                        if( is_null($class) ) {
	                            return ""; //$class = $mod->getMain();
	                        }
	                        $dashboard = $this->get('Dashboard');
	                        return $dashboard->index( $mod->getAdvanced($class,$method,$args) );
	                    }
	                }

	        })->where('arguments','.*');
	        
                    

		}

		public function getSideMenu() {
			return $this->sideMenu;
		}

		public function boot() {
		}
	}