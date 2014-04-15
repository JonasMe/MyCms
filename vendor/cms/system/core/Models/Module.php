<?php
	namespace Cms\System\Core\Models;
	class Module extends \Eloquent {

	    protected $table = 'module';
	    protected $primaryKey = 'module_id';

	    public function options() {
	    	return $this->hasMany('\Cms\System\Core\Models\ModuleOption','module_id','module_id');
	    }
	}