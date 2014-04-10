<?php
	namespace Cms\System\Io;

	class FileSystemItem {
		public $path;
		public $item;

		public function __construct($path = null, $item = null) {
			if( !is_null($path) ) $this->path = $path;
			if( !is_null($item ) ) $this->item = $item;
		}

		public function getFullPath() {
			return $this->path . $this->item;
		}
	}