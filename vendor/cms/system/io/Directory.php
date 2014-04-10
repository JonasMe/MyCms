<?php
	namespace Cms\System\Io;

	class Directory {

		public $path = null;
		private $files;
		private $directory;

		public function __construct($path = null) {
			if( !is_null($path)) $this->path = $path;
		}


		public function fetchFiles($return = false) {
			if( !is_null($this->path) ) {
				if( is_dir($this->path)) {
					$contains = array_diff(scandir($this->path), array('..', '.'));
					foreach( $contains as $k => $item ) {
						$this->files[] = new \Cms\System\Io\FileSystemItem($this->path,$item);
					}

					if( $return ) {
						return $this->files;
					}

				} else {
					throw new \Exception("Directory " . $this->path . " does not exist.");
				}
			} else {
				throw new \Exception("No directory has been defined.");
			}
		}

		public function hasFile($file) {
			return ( in_array($file, $this->directory) ? true : false ); 
		}

		public function getItems() {
			return $this->files;
		}

	}