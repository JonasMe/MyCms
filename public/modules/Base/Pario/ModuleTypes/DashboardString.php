<?php
	namespace Modules\Base\Pario\ModuleTypes;
	use \Jonm\Pario\String;

	class DashboardString extends String {
		public function DashboardInputType() {
			return '<input type="text" name="'.$this->getSlug().'" class="form-control" />';
		}
	}