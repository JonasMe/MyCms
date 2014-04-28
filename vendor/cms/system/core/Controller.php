<?php
	namespace Cms\System\Core;

	class Controller {

		/**
		 * Path where this module is located on the disc
		 * @var string
		 */
		protected $systemPath;

		/**
		 * Systemname of this module
		 * @var string
		 */
		protected $systemName;

		/**
		 * Package of this module
		 * @var string
		 */
		protected $systemPackage;

		/**
		 * The generated namespace for this module
		 * @var string
		 */
		protected $generatedNamespace;

		/**
		 * Path to the views folder of this module on the disc
		 * @var [type]
		 */
		protected $viewPath;

		/**
		 * Helper for frontend : Global.DashboardView.
		 * @var string
		 */
		protected $viewFolder;

		/**
		 * Database model of the module
		 * @var \Cms\System\Core\Module Object
		 */
		protected $dbModel;

		/**
		 * Array of called controllers from this module
		 * @var array
		 */		
		protected $calledControllers;

		/**
		 * Module language
		 * @var Translator
		 */
		protected $language;

		/**
		 * Variable for determining if there are any options or not.
		 * @var boolean
		 */
		public $frontendOptions = false;

		/**
		 * Get a simple controller through autoloading.
		 * @param  string  $controller
		 * @param  boolean $new
		 * @return object
		 */
		public function get($controller, $new = false ) {
			$isset = isset( $this->calledControllers[ucfirst($controller)] );
			if( $new === false && $isset === true ) {
				return $this->calledControllers[ucfirst($controller)];
			} else {
				$loadC = sprintf($this->generatedNamespace ."\\%s",$controller);

					if(!class_exists($loadC) ) {
						return false;
					}

					$load = new $loadC;

					$load->controller = $this;
					if( method_exists($load, 'ready') ) { $load->ready(); }
					$this->calledControllers[ucfirst($controller)] = $load;
					return $load;

			}
		}

		/**
		 * Get a controller through call_user_func allowing you to pass arguments and method
		 * @param  string $class
		 * @param  string $method
		 * @param  array  $args
		 * @return object
		 */
		public function getAdvanced($class, $method = null, $args = array() ) {
			
			if( is_object($class) ) {
				return call_user_func_array(array($class, $method), $args);
			}

			if( isset( $this->calledControllers[$class] ) ) {
				return $this->calledControllers[$class];
			} else {
				if( is_null($method) ) {
					throw new \Exception("No method specified.");
				} else {
					if( !is_object($class) ) {
			             $module = sprintf($this->generatedNamespace ."\\%s",$class);
			             $class  = new $module;
			        }
	             $class->controller = $this;

	             if( method_exists($class, 'ready') ) { $class->ready(); }

	             return call_user_func_array(array($class, $method), $args);
	            }
            }
		}

		/**
		 * Uninstall module
		 * @return boolean
		 */
		public function uninstall() {
			if( $installer = $this->get("Installer") ) {
				$installer->setModule($this->dbModel)->doUninstall();
				return true;
			}

			return false;
		}

		/**
		 * Sets the systemName variable
		 * @param string $name
		 */
		public function setName($name) {
			$this->systemName = $name;
			return $this;
		}

		/**
		 * Sets the systemPackage variable
		 * @param string $package
		 */
		public function setPackage($package) {
			$this->systemPackage = $package;
			return $this;
		}

		/**
		 * Sets the systemPath variable
		 * @param string $path
		 */
		public function setPath($path) {
			$this->systemPath = $path;
			return $this;
		}

		/**
		 * Sets the generatedNameSpace variable
		 * @param string $namespace
		 */
		public function setNamespace($namespace) {
			$this->generatedNamespace = $namespace;
			return $this;
		}

		/**
		 * Sets the viewPath variable
		 * @param string $path
		 */
		public function setViewPath($path) {
			$this->viewPath = $path;
			return $this;
		}

		/**
		 * Sets the viewFolder variable
		 * @param string $folder
		 */
		public function setViewFolder($folder) {
			$this->viewFolder = $folder;
			return $this;
		}

		/**
		 * Sets the database model 
		 * @param \Cms\System\Core\Model $model
		 */
		public function setModel(\Cms\System\Core\Models\Module $model) {
			$this->dbModel = $model;
			return $this;
		}
		
		/**
		 * Sets the language
		 * @param IlluminateTranslationTranslator $language
		 */
		public function setLanguage(\Illuminate\Translation\Translator $language) {
			$this->language = $language;
			return $this;
		}

		/**
		 * Gets the systemName variable
		 * @return string
		 */
		public function getName() {
			return $this->systemName;
		}

		/**
		 * Gets the systemPackage variable
		 * @return string
		 */
		public function getPackage() {
			return $this->systemPackage;
		}

		/**
		 * Gets the systemPath variable
		 * @return string
		 */
		public function getPath() {
			return $this->systemPath;
		}

		/**
		 * Gets the generatedNameSpace variable
		 * @return string
		 */
		public function getNamespace() {
			return $this->generatedNamespace;
		}

		/**
		 * Gets the viewPath variable
		 * @return string
		 */
		public function getViewPath() {
			return $this->viewPath;
		}

		/**
		 * Gets the viewFolder variable
		 * @return string
		 */
		public function getViewFolder() {
			return $this->viewFolder;
		}

		/**
		 * Gets the database module
		 * @return \Cms\System\Core\Model
		 */
		public function getModel() {
			return $this->dbModel;
		}

		/**
		 * Gets the language
		 * @return IlluminateTranslationTranslator
		 */
		public function getLanguage() {
			return $this->language;
		}

		/**
		 * Helper function for getLanguage
		 * @param  string $line
		 * @param  array  $replace
		 * @return string
		 */
		public function _l( $line,$replace = array() ) {
			return $this->language->get($line,$replace);
		}

		/**
		 * Initializing this
		 * @return none
		 */
		public function register() { }

		/**
		 * Initializing this
		 * @return none
		 */
		public function boot() { }

		public function __call($name,$arguments) {
			$this->get($this->systemName, $name, $arguments);
		}
	}