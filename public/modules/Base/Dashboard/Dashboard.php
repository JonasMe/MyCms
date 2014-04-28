<?php
	namespace Modules\Base\Dashboard;
	
	class Dashboard {

		protected $passAlong = array();
		public $directCalling = array("makeModularJs");

		public function index($content = "") {
			$this->getAdminModules();
			$this->passAlong['l'] = $this->controller->getLanguage();
			
			return \Template::make('@Dashboard/index.phtml',$this->passAlong);
		}

		public function makeModularJs($var) {
			$file = \Input::get('f',null);
			if( !is_null($file) && file_exists(public_path() . $file ) ) {
				return \Template::javascriptView( \Template::make('@Dashboard/javascriptContainer.phtml', array( "token" => $var, "fileContent" => file_get_contents(public_path() . $file) ) ) );
			}
		}

		private function getAdminModules() {
			$this->passAlong['sidebar'] = array();
			foreach( \Modules::allModulesSingle() as $mod ) {
				if( $mod->getName() == "Dashboard" ) { continue; }
				if( $admin = $mod->get('Admin') ) {
					$admin->setModule($mod)->Sidebars();
					foreach( $admin->getSidebar() as $v ) {
						array_push($this->passAlong['sidebar'], $v);
					}
				}
			}

			$this->passAlong['sidebar'][] = array( "icon" => "tasks", "module" => "Base.Dashboard", "class" => "ModuleHandler", "method" => "index","title" => "Modules" );

		}
		

	}