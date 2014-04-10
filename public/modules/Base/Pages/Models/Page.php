<?php
	namespace Modules\Base\Pages\Models;

	class Page extends \Eloquent {
		protected $table = 'page';
		protected $primaryKey = 'page_id';

		public function placeholders() {
			return $this->hasMany('\\Modules\\Base\\Pages\\Models\\Placeholder','page_id','page_id');
		}
	}