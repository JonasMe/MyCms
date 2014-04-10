<?php
	namespace Cms\System\Core;

	class ModuleConfig {
		protected $Module;
		protected $Main;

		public function setModule($module) {
			$this->Module = $module;
			return $this;
		}

		public function setMain($main) {
			$this->Main = $main;
			return $this;
		}

		public function register() { }

		public function boot() { }
	}