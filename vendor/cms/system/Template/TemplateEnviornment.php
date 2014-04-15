<?php

	namespace Cms\System\Template;

	class TemplateEnviornment extends \Twig_Environment {

		protected $_newGlobals;
		protected $_js;

		public function addGlobal($key,$value) {
			$this->_newGlobals[$key] = $value;
		}

		public function appendJs($script) {
			$this->_js .= trim($script);
		}

		public function make($name, $context = array()) {
			parent::addGlobal("Global",$this->_newGlobals);
			parent::addGlobal("appendJs",$this->_js);
			return parent::render($name,$context);
		}

		public static function jsonView($content)
	    {
	    	if( is_array($content) ) { $content = json_encode($content,JSON_PRETTY_PRINT); }
			$response = \Response::make($content);
			$response->header('Content-Type', 'application/json');
	        return $response;
	    }

	}