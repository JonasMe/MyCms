<?php
	namespace Jonm\Pario;

	class Number extends ParioType {

		protected $databasType = "double";

		public function renderOutput($number) {
			return ( is_numeric($number) ? str_replace(",", ".", $number) : 0);
		}

		public function renderInsert($number) {
			return ( is_numeric($number) ? $number : 0);
		}

	}