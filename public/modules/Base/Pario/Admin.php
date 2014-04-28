<?php
	namespace Modules\Base\Pario;

	class Admin extends \Modules\Base\Dashboard\Admin {

		public function Sidebars() {
			$this->addSidebar("Dashboard\\Pario","index", $this->controller->_l("default.pario") ,"flash");
		}

	}