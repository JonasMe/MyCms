<?php
	namespace Modules\Base\Dashboard;


	class ModuleHandler {

		public $directCalling = array("index","uninstallModule","installModule");

		public function checkLogin() {
			if( \User::isLoggedIn() !== true ) {
				die("login");
			}
		}

		public function index() {
			$this->checkLogin();

			$data = array();

			$data["loadScript"]		= array( $this->controller->getViewFolder().'js/dashboard.moduleHandler.js' );
			$data["loadCss"]		= array( $this->controller->getViewFolder().'css/dashboard.moduleHandler.css');
			$data['l']				= $this->controller->_l('modulehandle');
			
			$data['modules']		= array();
			$modules = \Modules::allModulesSingle();
			$inDir = \Modules::fetchModuleFolders();

			foreach( $inDir as $m ) {
				$save = array("installed" => false );
					foreach( $modules as $mod ) {
						if( $mod->getNamespace() == $m['namespace'] ) {
							$save['installed'] = true;
							$save['id'] = $mod->getModel()->module_id;
							$save['active'] = $mod->getModel()->is_active;
						}
						$save['name'] = $m['name'];
						$save['package'] = $m['package'];
					}
				$data['modules'][] = $save;
			}	

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}

		public function uninstallModule($id) {
			$this->checkLogin();

			$data = array();

			if( $module = \Modules::get($id) ) {
				$package = $module->getPackage();
				$name = $module->getName();

				if( $module->uninstall() ) {
					$data = array("Error" => false, "Message" => "Module uninstalled","package" => $package, "name" => $name);
				} else {
					$data = array( "Error" => true, "Message" => "Error in uninstalling module.");
				}
			} else {
				$data = array( "Error" => true, "Message" => "Module not found.");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}
		}

		public function installModule($package,$name) {
			$this->checkLogin();

			$data = array();

			if( is_string($package) && is_string($name) ) {
				if( $module = \Modules::install($package,$name) ) {
					$data = array("Error" => false, "Message" => "Module installed", "id" => $module->module_id);
				} else {
					$data = array( "Error" => true, "Message" => "Module could not be installed.");
				}
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}
		}

	}