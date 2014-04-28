<?php
	namespace Cms\System\Core;
	use Cms\System\Core\Models\Module;
	use Cms\System\Core\Models\ModuleOption;

	class ModuleInstaller {

		protected $_module;
		protected $_title;
		protected $_description;

		public function setTitle($title) {
			$this->_title = $title;
			return $this;
		}

		public function getTitle() {
			return $this->_title;
		}

		public function setDescription($desc) {
			$this->_description = $desc;
			return $this;
		}

		public function setModule(\Cms\System\Core\Models\Module $module) {
			$this->_module = $module;
			return $this;
		}

		public function getDescription() {
			return $this->_description;
		}

		protected function install() {
			
		}
		protected function uninstall() {

		}

		public function doUninstall() {
			if( isset( $this->_module ) && is_a($this->_module, "\\Cms\\System\\Core\\Models\\Module") ) {
				$this->_module->options()->forceDelete();
				$this->_module->forceDelete();
				
				if( method_exists($this, "uninstall" ) ) {
					$this->uninstall();
				}
			}
		}

		public function doInstall($package,$name) {
			$this->addModule($package,$name);
			$install = $this->install();
			return $this->_module;
		}

		protected function addModule($package,$name) {
			if( is_string($package) && is_string($name) ) {
				$package = ucfirst($package);
				$name = ucfirst($name);

				if( \Modules::moduleExists($package,$name) ) {
					$module = new Module();
					$module->name = $name;
					$module->package = $package;
					$module->is_active = 1;
					$module->save();
					$this->_module = $module;
					return $module;
				} else {
					throw new \Exception("Modulefolders does not exist.");
				}
			} else {
				throw new \Exception("Package and modulename must be of type string.");
			}
		}

		protected function addOption($title,$class) {
			if( isset( $this->_module ) && is_a($this->_module, "Cms\\System\\Core\\Models\\Module") ) {
				if( is_string($title) && is_string($class) ) {
					$option = new ModuleOption();
					$option->title = $title;
					$option->class = $class;
					$option->module_id = $this->_module->module_id;
					$option->save();
					return $option;
				} else {
					throw new \Exception("Title and class parameters must be of type string.");
				}
			} else {
				throw new \Exception("You must first have created a module entry, before adding options. " . gettype($this->_module));
			}
		}
	}