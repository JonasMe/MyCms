<?php
	namespace Modules\Base\Pages\Models;
	class Placeholder extends \Eloquent {

	    protected $table = 'placeholder';
	    protected $primaryKey = 'placeholder_id';

	    public function objects() {
	    	return $this->hasMany('\\Modules\\Base\\Pages\\Models\\PlaceholderObject', 'placeholder_id', 'placeholder_id')->orderBy('position', 'asc');;
	    }
	}