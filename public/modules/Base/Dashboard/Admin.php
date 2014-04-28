<?php
	namespace Modules\Base\Dashboard;

	class Admin {

		protected $sidebar = array();
		protected $module;

		protected function addSidebar($class,$method,$title,$icon = "" ) {
			$this->sidebar[] = array(
										"module" => $this->module->getPackage() . "." . $this->module->getName(),
										"class" => $class,
										"method" => $method,
										"title" => $title,
										"icon" => $icon);
		}

		public function getSidebar() {
			return $this->sidebar;
		}

		public function setModule($mod) {
			$this->module = $mod;
			return $this;
		}


	}