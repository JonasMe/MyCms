<?php
	namespace Modules\Base\Pario;

	class Controller extends \Cms\System\Core\Controller {

		protected $parioTypes = array();

		public function register() {

		}

		public function boot() {
			$this->addType( $this->_l("default.StringType"), "DashboardString");
			$this->addType( $this->_l("default.NumberType"), "DashboardNumber");
		}

		public function addType($name, $type) {
			$this->parioTypes[] = array( "name" => $name, "type" => $type );
			return $this;
		}

		public function getTypes() {
			return $this->parioTypes;
		}
	}