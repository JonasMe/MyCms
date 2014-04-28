<?php
	namespace Modules\Base\Pages\Dashboard;
	use \Modules\Base\Pages\Models\PlaceholderObject;


	class Object {

		private $_mcData;
		public $directCalling = true;

		public function __construct() {
				$this->_mcData = array("Error" => true, "Message" => "Missing login credentials");
		}

		public function checkLogin() {
			if( \User::isLoggedIn() !== true ) {
				die("login");
			}
		}

		public function positionate() {
			$this->checkLogin();

			$pos = \Input::get('positions',null);
			$data = array();

			if( !is_null($pos) && is_array($pos) ) {
				foreach( $pos as $position => $objectId ) {
					if( is_numeric($objectId) ) {
						$object = PlaceholderObject::find($objectId);
						if( $object ) {
							$object->position = $position;
							$object->save();
						} else {
							$data = array("Error" => true, "Message" => sprintf("Object width id %s, does not exist.",$objectId) );
						}
					} else {
						$data = array("Error" => true, "Message" =>  "Object-ID is not numeric");
					}
				}
			} else {
				$data = array("Error" => true, "Message" => "Placeholder must be numeric and pos must be array");
			}

			if( empty($data) ) {
				$data = array("Error" => false, "Message" => "Good");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}

		public function update($object,$key) {
			$this->checkLogin();

			if( is_numeric($object) ) {
				$keys 		= array( 
										"active" 		=> "enabled",
										"option" 		=> "module_option_id",
										"placeholder" 	=>  "placeholder_id",
										"title" 		=> "title"
									);


				if( isset($keys[$key]) ) {
					$obj = PlaceholderObject::find($object);
					if( $obj ) {
						if( \Input::has('value') ) {
							$obj->{$keys[$key]} = \Input::get('value', $obj->{$keys[$key]});
							$obj->save();

							$data = array("Error" => false, "Message" => "Object updated");
						} else {
							$data = array("Error" => true, "Message" => "Value not set");
						}
					} else {
						$data = array("Error" => true, "Message" => "Object not found");
					}
				} else {
					$data = array("Error" => true, "Message" => "Invalid key '".$key."'. Keys available: " . implode(",", array_keys($keys) ) );
				}
			} else {
				$data = array("Error" => true, "Message" => "Object must be numeric");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}



		public function edit($object) {
			$this->checkLogin();
			if( is_numeric($object) ) {
					$object = PlaceholderObject::find($object);
					if( $object ) {
							$option = $object->option;
							$module = \Modules::get($option->module_id);

							$data = array( 
											"option" => $option->module_option_id,
											"object" => $object->placeholder_object_id,
											"html" => \Modules::get('Base','Pages')->moduleOption($object)->edit(),
										);

					} else {
						$data = array("Error" => "Object not found.");
					}
			} else {
				$data = array( "Error" => "No id or not numeric.");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}
		}

		public function save($object) {
			$this->checkLogin();
			if( is_numeric($object) ) {
					$object = PlaceholderObject::find($object);
					if( $object ) {
							$option = $object->option;
							$module = \Modules::get($option->module_id);
							$saved = \Modules::get('Base','Pages')->moduleOption($object)->save();
							if( $saved === true ) {
								$data = array("Success" => true, "Message" => "Saved correctly.");
							} else {
								$data = array("Error" => true, "Message" => $saved);
							}

					} else {
						$data = array("Error" => true, "Message" => "Object not found.");
					}
			} else {
				$data = array( "Error" => true, "Message" => "No id or not numeric.");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}
		}

		public function add($placeholder) {
			$this->checkLogin();

			$title = \Input::get("objectTitle",null);
			$option = \Input::get("objectOption",null);

			if( is_numeric($placeholder)  && !is_null($title) && is_numeric($option) && !is_null($option) ) {
				$o = new PlaceholderObject;
				$o->title = $title;
				$o->placeholder_id = $placeholder;
				$o->module_option_id = $option;
				$o->save();
				$data = array("Success" => true, "Message" => "Object created.", "id" => $o->placeholder_object_id);
			} else {
				$data = array("Error" => true, "Message" => "Object not created. Remember to name your object.");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}
		}

	}