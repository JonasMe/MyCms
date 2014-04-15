<?php
	namespace Cms\System\Core;
	use \Cms\System\Core\Models\ModuleOption;

	class Modules {

		private $collection;
		private $idCollection;
		/**
		 * Fetches all active modules, initiates their controller and adds them to the collection
		 * @return none
		 */
		public function fetchModules() {
	        $allModules = Models\Module::where('is_active','=','1')->get();
	        foreach($allModules as $module) {

				$systemName = ucfirst($module->name);
				$systemPackage = ucfirst($module->package);
				$generatedNamespace = "Modules\\".$systemPackage."\\".$systemName;
				$systemPath = public_path() . "/modules/" .$systemPackage. "/" . $systemName;
				$viewPath = $systemPath . "/Views";
				$viewFolder = "/modules/".$systemPackage. "/" . $systemName . "/Views/";

				$controllerClass	= $generatedNamespace . "\\Controller";
				$cfg				= new $controllerClass();
				$cfg->setName($systemName)
					->setPackage($systemPackage)
					->setNamespace($generatedNamespace)
					->setPath($systemPath)
					->setViewPath($viewPath)
					->setViewFolder($viewFolder)
					->setModel($module);

	            $this->collection[$systemPackage][$systemName] = $cfg;
	            $this->idCollection[$module->module_id] = &$this->collection[$systemPackage][$systemName];
	        }
		}

		/**
		 * Runs the register method of the controllers
		 * @return none
		 */
		public function registerModules() {
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$this->get($package,$name)->register();
				}
			}
		}

		/**
		 * Runs the boot method of the controllers
		 * @return none
		 */
		public function bootModules() {
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$module = $this->get($package,$name);
						\TemplateFiles::addPath( $module->getViewPath() );
						\TemplateFiles::addPath( $module->getViewPath(), $module->getName() );
						\Template::addGlobal($module->getName() . "Views",$module->getViewFolder());
						\Template::addGlobal($module->getName(),$module);
					$module->boot();
				}
			}

			\Template::addGlobal("Modules",$this);

		}

		/**
		 * Get a single module out of the collection
		 * @param  string|int $packageOrId
		 * @param  string $module
		 * @return \Cms\System\Core\Controller|bool
		 */
		public function get($packageOrId,$module = null) {
			if( is_numeric($packageOrId) && is_null($module) && isset( $this->idCollection[$packageOrId] ) ) {
				return $this->idCollection[$packageOrId];
			} elseif( is_string($packageOrId) && !is_null($module) && isset( $this->collection[$packageOrId][$module] ) ) {
				return $this->collection[$packageOrId][$module];
			} else {
				return false;
			}
		}

		public function moduleOption($id) {
			return ModuleOption::find($id);
		}

		/**
		 * Return the complete collection of modules
		 * @return array
		 */
		public function allModules() {
			return $this->collection;
		}

		/**
		 * Returns an array of all the modules objects.
		 * @return array|object
		 */
		public function allModulesSingle() {
			$contain = array();
			foreach( $this->collection as $package => $modules ) {
				foreach( $modules as $name => $module ) {
					$contain[] = $this->get($package,$name);
				}
			}

			return $contain;
		}

		/**
		 * Checks if a module exists
		 * @param  string $package
		 * @param  string $name
		 * @return bool
		 */
		public function moduleExists($package,$name) {
			$path = public_path() . "/modules/" . $package . "/" . $name;
			if( is_dir($path) && is_file($path ."/Config.php")) {
				return true;
			} else {
				return false;
			}
		}
	}