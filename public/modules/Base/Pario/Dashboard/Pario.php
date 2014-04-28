<?php
	namespace Modules\Base\Pario\Dashboard;

	class Pario {

		public $directCalling = true;

		
		public function __construct() {
			\Modules::get('Base','Dashboard')->Auth();
		}


		public function index() {
			/*\Pario::delete("first");
			\Pario::addTypeSpace("Modules\\Base\\Pario\\ModuleTypes");
			\Pario::create("first", function($g) {
				$g->addType( \Pario::type("DashboardString"), "Jonm" );
			});*/

		$data["loadScript"]		= array( 
											$this->controller->getViewFolder().'js/dashboard.pario.js'
										);

		$data["loadCss"]		= array( $this->controller->getViewFolder().'css/pario.css');
		$data['availableTypes'] = $this->controller->getTypes();
		$data['groups'] = array();

		foreach( \Pario::allGroups() as $g ) {
			$group = \Pario::makeFile($g);
			$data['groups'][] = array( "name" => $group->getName(), "slug" => $group->getSlug() );
		}

			return \Template::jsonView($data);
		}

		public function getGroup( $slug ) {
			$group = \Pario::makeSlug( $slug );
			if( $group ) {
				$data = array(
								"name" => $group->getName(),
								"slug" => $group->getSlug(),
					);

				foreach( $group->getTypes() as $t ) {
					$data['types'][] = array( "name" => $t->getName(), "slug" => $t->getSlug(), "type" => $t->__toString(), "dbtype" => $t->getDbType() );
				}
			} else {
				$data = array( "Error" => true, "Message" => "Group not found.");
			}

			return \Template::jsonView($data);

		}

	}