<?php
	namespace Modules\Base\Pario\ModuleTypes;
	use \Jonm\Pario\Number;

	class DashboardNumber extends Number {
		public function DashboardInputType() {
			return '<input type="text" name="'.$this->getSlug().'" class="form-control" />';
		}
	}