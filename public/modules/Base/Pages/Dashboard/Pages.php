<?php
	namespace Modules\Base\Pages\Dashboard;
	use Modules\Base\Pages\Dashboard\PageTree;
	use Modules\Base\Pages\Models\Page;
	use Modules\Base\Pages\Models\Placeholder;
	use Modules\Base\Pages\Models\PlaceholderObject;

	class Pages {

		//public $pageTree;
		//protected $tree;

		/*public function ready() {

			$args = \Input::get('args',null);
			$current = ( isset( $args['id'] ) && is_numeric($args['id']) ? $args['id'] : null );
			$this->tree = new PageTree();
			$this->pageTree = $this->tree->renderTree( $current );
			\Template::appendJs('<script type="text/javascript" src="'.$this->controller->getViewFolder().'js/pagetree.js"></script>');
			\Template::addGlobal('menu', $this->pageTree);
		}
		public function index() {
			return \Template::make('@Pages/Dashboard/index.phtml');
		}
		*/
		private $_mcData;
		public $directCalling = true;
		public function __construct() {
				$this->_mcData = array("Error" => true, "Message" => "Missing login credentials");
		}

		public function checkLogin() {
			\Modules::get('Base','Dashboard')->Auth();
		}

		public function moduleOptions() {
			$this->checkLogin();
			$data = array();

			foreach (\Modules::allModuleOptions() as $mo ) {
				$data[] = array( "title" => $mo->title, "id" => $mo->module_option_id );
			}


			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}

		public function updateMultiple($page = null) {
			$this->checkLogin();
				$error = false;
				$keys 		= array( 
										"title" 		=> "title",
										"frontpage" 	=> "is_frontpage",
										"slug" 			=>  "slug",
										"active" 		=> "is_active",
										"view" 			=> "view",
									);

				$details = \Input::all();
				$details = ( !empty($details) ? $details : array() );

				if( is_numeric($page) ) {
					$obj = Page::find($page);
				} elseif( is_null($page) ) {
					$obj = new Page;
				} else {
					$error = true;
				}

			if( $error === false ) {
				foreach( $details as $key => $value ) {
					
					if( isset( $keys[$key] ) ) {
						$obj->{$keys[$key]} = $value;
					}
				}
				$obj->save();
				$data = array("Error" => false, "Message" => "Page updated", "id" => $obj->page_id);
			} else {
				$data = array("Error" => true, "Message" => "Page must be numeric");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}

		public function update($page,$key) {
			$this->checkLogin();
			if( is_numeric($page) ) {
				$keys 		= array( 
										"title" 		=> "title",
										"frontpage" 	=> "is_frontpage",
										"slug" 			=>  "slug",
										"active" 		=> "is_active",
										"view" 			=> "view",
									);


				if( isset($keys[$key]) ) {
					$obj = Page::find($page);
					if( $obj ) {
						if( \Input::has('value') ) {
							$obj->{$keys[$key]} = \Input::get('value', $obj->{$keys[$key]});
							$obj->save();
							$data = array("Error" => false, "Message" => "Page updated");
						} else {
							$data = array("Error" => true, "Message" => "Value not set");
						}
					} else {
						$data = array("Error" => true, "Message" => "Page not found");
					}
				} else {
					$data = array("Error" => true, "Message" => "Invalid key '".$key."'. Keys available: " . implode(",", array_keys($keys) ) );
				}
			} else {
				$data = array("Error" => true, "Message" => "Page must be numeric");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView( $data );
			} else {
				return "Only ajax";
			}

		}


		//functionality
		public function getPages($parent = null) {
			$this->checkLogin();
			$pages = null;
			if( is_null($parent) ) {
				$pages = Page::where('parent_id','=',0)->get();
			} else {
				if( is_numeric($parent) ) {
					$pages = Page::where('parent_id','=',$parent)->get();
				} else {
					throw new \Exception("Parent id must be integer");
				}
			}


			if ( \Request::ajax() ) {
				$l = $this->controller->_l('default');

				$arr = array();
				foreach( $pages as $p ) {
					$arr[] = array(
						"title" => $p->title,
						"id"	=> $p->page_id,
						"has_children" => ($p->childs()->count() > 0 ? true : false),
					);
				}

				$data = array(
								"menu" => $arr,
								"l" => $l,
							);
				if( is_null($parent) ) {
					$data["loadScript"]		= array( 
														$this->controller->getViewFolder().'js/dashboard.pagenavigation.js'
													);
					$data["loadCss"]		= array( $this->controller->getViewFolder().'css/pagetree.css');
				}
				return \Template::jsonView($data);

			} else {
				return "Only ajax";
			}
		}

		public function getViews() {
			$this->checkLogin();
				$website = \Modules::get('Base','Website');
				if( $website !== false ) {
					$send = array();
					foreach( $website->getTemplateViews() as $v ) {
						$send[] = array("view" => $v);
					}
					$data['templateViews'] = $send;
				}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView($data);
			} else {
				return "Only ajax";
			}
		}

		public function editPage($id) {
			$this->checkLogin();
			if( is_numeric($id) ) {
				$page = Page::find($id);
				
				//Load new placeholders
				try {
					\Modules::get('Base','Pages')->get('Pages')->CurrentPage =  new \Modules\Base\Pages\Engine\Page($page);
					\Template::make( $page->view, array("yo" => "Hej!"));
				} catch(\Twig_Error_Loader $e) {}

				$data = $page->toArray();

				$website = \Modules::get('Base','Website');
				if( $website !== false ) {
					$send = array();
					foreach( $website->getTemplateViews() as $v ) {
						$send[] = array("view" => $v);
					}
					$data['templateViews'] = $send;

				}

				$placeholders = $page->placeholders()->get();
				foreach( $placeholders as $p ) {
					$ph = $p->toArray();
					$objs = $p->objects();
					if( $objs->count() > 0 ) {
						$ph['objects'] = $objs->get()->toArray();
					}
					$data['placeholders'][] = $ph;
				}

			} else {
				$data = array("Error" => "No id, or not numeric.");
			}

			if ( \Request::ajax() || !\Request::ajax() ) {
				return \Template::jsonView($data);
			} else {
				return "Only ajax";
			}

		}

		public function edit($id = null) {
			if( is_numeric($id) ) {
				$page = Page::find($id);

				if (\Request::isMethod('post'))
				{
					$title	= \Input::get('title', null);
					$slug	= \Input::get('slug', null);

					$page->title = $title;
					$page->slug = $slug;
					$page->save();
					\Template::addGlobal('menu', $this->tree->renderTree($id) );
				}

				
				return \Template::make('@Pages\Dashboard/index.phtml',
						array("cont" => \Template::make('@Pages/Dashboard/editPage.phtml',array("page" => $page))));
			} elseif( is_null($id) ) {
				//Create new
				return \Template::make('@Pages\newPage.phtml');
			}
		}



		public function placeholder($id,$object = null) {
			$option = \Input::get('option',null);

			$placeholder = Placeholder::find($id);
			if( !is_null($object) ) {
				$object = PlaceholderObject::find($object);
			}

			\Template::appendJs('<script type="text/javascript" src="'.$this->controller->getViewFolder().'js/placeholder.js"></script>');
			$pass = array( "objectEdit" => "HEJ" );

			if( !is_null($option) ) {
				$option = $pass['option'] = \Modules::moduleOption($option);
				$module = $pass['module'] = \Modules::get($option->module_id);

				return \Modules::get('Base','Pages')->moduleOption($object,"edit");

			}



			return \Template::make('@Pages\Dashboard/placeholderObject.phtml',$pass);
		}

		public function setPositions() {
			$pos = \Input::get('pos',array() );

			if( !empty($pos) ) {
				foreach( $pos as $ph => $posArr ) {
					if( is_array($posArr) && !empty($posArr) ) {
						foreach( $posArr as $position => $object) {
							$object = PlaceholderObject::find($object);
							$object->position = $position;
							$object->save();
						}
					}
				}
			}
		}

		public function createPage() {
			$title	= \Input::get('title', null);
			$slug	= \Input::get('slug', null);
			$layout = \Input::get('view', null);
			$active	= \Input::get('activate', 0);
			$parent	= \Input::get('parent', 0);

			if( is_null($layout) && $parent == 0 ) {
				$layout = "index.phtml";
			} elseif( is_null($layout) && $parent != 0 && is_numeric($parent) ) {
				$parent = Page::find($parent);
				$layout = $parent->view;
			} else {
				$layout = "index.phtml";
			}

			$page 				= new Page;
			$page->title 		= ( !is_null($title) ? $title : "Ny side" );
			$page->slug 		= ( !is_null($slug) ? $slug : "ny-side-slug" );
			$page->view 		= $layout;
			$page->is_active 	= $active;
			$page->parent_id 	= $parent;
			$page->save();

		}



		public function getOptionsJson($package,$module) {
			$module = \Modules::get($package,$module);
			//$data = $this->getModuleOptions($module)->toJson();
			$args = \Input::get('args',null);
			$current = ( isset( $args['id'] ) && is_numeric($args['id']) ? $args['id'] : null );
			$tree = new ArrayPageTree();
			$menu= $tree->renderTree( 1 );

			$data = array( 
							"menu" => $menu,
							"loadScript" => array( $this->controller->getViewFolder().'js/test.js'),
							"loadCss" => array( $this->controller->getViewFolder().'css/pagetree.css'));
			return \Template::jsonView($data);
		}

		private function getModuleOptions(\Cms\System\Core\Controller $module) {
			return $module->getModel()->options()->get();
		}

	}