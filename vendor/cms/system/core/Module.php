<?php
	namespace Cms\System\Core;

	class Module {

		protected $systemPath;
		protected $systemName;
		protected $systemPackage;
		protected $generatedNamespace;
		protected $config;
		protected $viewPath;
		protected $viewFolder;
		protected $main;
		protected $dbModel;

		protected $calledControllers;

		protected $isRegistered;
		protected $isBooted;

		public function __construct(\Cms\System\Core\Models\Module $module) {
			$this->config 			= null;
			$this->isRegistered 	= false;
			$this->isBooted			= false;
			$this->dbModel			= $module;
			$this->calledControllers= array();
			$this->initiateFromModel();
		}

		public function getName() {
			return $this->systemName;
		}

		public function getPackage() {
			return $this->systemPackage;
		}

		public function getViewPath() {
			return $this->viewPath;
		}

		public function getConfig() {
			return $this->config;
		}

		public function getMain() {
			return $this->main;
		}

		public function setViewPath($path) {
			$this->viewPath = $path;
			return $this;
		}

		public function setMainClass($className) {
			$this->mainClassName = ucfirst($className);
		}

		public function getController($class, $method = null, $args = array() ) {
			if( isset( $this->calledControllers[$class] ) ) {
				return $this->calledControllers[$class];
			} else {
				if( is_null($method) ) {
					throw new \Exception("No method specified.");
				} else {
	             $module = sprintf($this->generatedNamespace ."\\%s",$class);
	             $class  = new $module;
	             return call_user_func_array(array($class, $method), $args);
	            }
            }
		}

		public function register() {
			if( !$this->isRegistered ) {
				$this->config->setModule($this);
				$this->config->register();
				$this->isRegistered = true;
			} else {
				throw new \Exception(sprintf("Could not register module %s, since it has already been registered.",$this->systemName));
			}
		}

		public function boot() {
			if( !$this->isBooted ) {

				\App::singleton($this->systemName,function() { 
					$name = $this->generatedNamespace . "\\" . (isset($this->mainClassName) ? $this->mainClassName : $this->systemName);
					return new $name();
				});

				$this->main = \App::make($this->systemName);
				$this->main->moduleConfig = $this->config;
				\TemplateFiles::addPath($this->viewPath);
				\TemplateFiles::addPath($this->viewPath,$this->systemName);
				\Template::addGlobal($this->systemName . "Views",$this->viewFolder);
				\Template::addGlobal($this->systemName,$this->main);
				$this->config->setMain($this->main)->boot();

			} else {
				throw new \Exception(sprintf("Could not boot module %s, since it has already been booted.",$this->systemName));
			}
		}

		private function initiateFromModel() {
			if( is_null($this->config) ) {
				$this->systemName = ucfirst($this->dbModel->name);
				$this->systemPackage = ucfirst($this->dbModel->package);
				$this->generatedNamespace = "Modules\\".$this->systemPackage."\\".$this->systemName;
				$this->systemPath = public_path() . "/modules/" .$this->systemPackage. "/" . $this->systemName;
				$this->viewPath = $this->systemPath . "/Views";
				$this->viewFolder = "/modules/".$this->systemPackage. "/" . $this->systemName . "/Views/";
				$configClass = $this->generatedNamespace . "\\Config";
				$this->config = new $configClass();
			} else {
				throw new \Exception(sprintf("Could not initialize module %s, since it has already been initialized.",$this->systemName));
			}
		}



	}