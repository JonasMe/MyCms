<?php
	namespace Modules\Base\Dashboard;

	class Dashboard {
		public function index() {

			$passAlong = array();
			$passAlong['sidebar'] = $this->moduleConfig->getSideMenu();

			return \Template::make('@Dashboard/index.phtml',$passAlong);
		}
	}