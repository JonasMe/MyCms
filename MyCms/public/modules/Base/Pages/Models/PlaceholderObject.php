<?php
	namespace Modules\Base\Pages\Models;
	class PlaceholderObject extends \Eloquent {

	    protected $table = 'placeholder_object';
	    protected $primaryKey = 'placeholder_object_id';

	    public function placeholder() {
	    	return $this->hasOne('\Modules\Base\Pages\Models\Placeholder','placeholder_id','placeholder_id');
	    }

	    public function properties() {
	    	return $this->hasMany('\Modules\Base\Pages\Models\PlaceholderObjectProperty','placeholder_object_id','placeholder_object_id');
	    }

	    public function option() {
	    	return $this->hasOne('\Cms\System\Core\Models\ModuleOption','module_option_id','module_option_id');
	    }

	}