<?php

	namespace Cms\System\Template;

	class TemplateEnviornment extends \Twig_Environment {

		protected $_newGlobals;

		public function addGlobal($key,$value) {
			$this->_newGlobals[$key] = $value;
		}

		public function make($name, $context = array()) {
			parent::addGlobal("Global",$this->_newGlobals);
			return parent::render($name,$context);
		}



	}