<?php
	namespace Modules\Base\Pages\Models;
	class PlaceholderObject extends \Eloquent {

	    protected $table = 'placeholder_object';
	    protected $primaryKey = 'placeholder_object_id';

	    public function module() {
	    	return $this->hasOne('\\Cms\\System\\Core\\Models\\Module','module_id','module_id');
	    }

	}