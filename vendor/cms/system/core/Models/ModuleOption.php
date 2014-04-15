<?php
	namespace Cms\System\Core\Models;
	class ModuleOption extends \Eloquent {

	    protected $table = 'module_option';
	    protected $primaryKey = 'module_option_id';

	    public function module() {
	    	return $this->belongsTo('\Cms\System\Core\Models\Module', 'module_id', 'module_id');
	    }
	}