<?php
	namespace Cms\System\Core;

	class Modules {

		private $collection;

		/**
			*Fetches all active modules. And adds them to collection
		*/
		public function fetchModules() {
	        $allModules = Models\Module::where('is_active','=','1')->get();
	        foreach($allModules as $module) {
	            $moduleObject = new Module($module);
	            $this->collection[$moduleObject->getPackage()][$moduleObject->getName()] = $moduleObject;
	        }
		}

		public function registerModules() {
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$this->get($package,$name)->register();
				}
			}
		}
		public function dos() {
			return "HEJ!";
		}

		public function bootModules() {
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$this->get($package,$name)->boot();
				}
			}

			\Template::addGlobal("Modules",$this);

		}

		public function get($package,$module) {
			if( isset( $this->collection[$package][$module] ) ) {
				return $this->collection[$package][$module];
			} else {
				return false;
			}
		}

		public function allModules() {
			return $this->collection;
		}

		public function allModulesSingle() {
			$contain = array();
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$contain[] = $this->get($package,$name);
				}
			}

			return $contain;
		}

		public function moduleExists($package,$name) {
			$path = public_path() . "/modules/" . $package . "/" . $name;
			if( is_dir($path) && is_file($path ."/Config.php")) {
				return true;
			} else {
				return false;
			}
		}
	}