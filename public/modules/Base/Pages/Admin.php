<?php
	namespace Modules\Base\Pages;

	class Admin extends \Modules\Base\Dashboard\Admin {

		public function Sidebars() {
			$this->addSidebar("Dashboard\\Pages","getPages", $this->controller->_l("default.pages") ,"list-alt");
		}

	}