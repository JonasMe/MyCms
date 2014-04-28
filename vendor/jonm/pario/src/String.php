<?php
	namespace Jonm\Pario;

	class String extends ParioType {

		protected $databasType = "string";

		public function renderOutput($string) {
			return ( is_string($string) ? $string : "");
		}

		public function renderInsert($string) {
			return ( is_string($string) ? $string : "");
		}

	}