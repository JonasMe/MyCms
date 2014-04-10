<?php
	namespace Modules\Base\Pages\Dashboard;
	use Modules\Base\Pages\Models\Page;

	use Knp\Menu\Matcher\Matcher;
	use Knp\Menu\MenuFactory;
	use Knp\Menu\Renderer\ListRenderer;

	class PageTree {
		public function renderTree() {
			$pages = Page::all();
			$menu = $this->pageListRendere($pages);
				$renderer = new ListRenderer(new Matcher());

			return \Template::make('@Pages\typo.phtml',array("menu" => $renderer->render($menu)));
		}

		public function pageListRendere($pages) {
			$factory = new MenuFactory();
			$menu = $factory->createItem('pageTree');
			foreach($pages as $page) {
				if( $page->parent_id == 0 ) {
					$this->recursiveIteration($page,$menu);
				}
			}	

			return $menu;
		}

		public function recursiveIteration(\Modules\Base\Pages\Models\Page $page, $item) {
			$newItem = $item->addChild($page->title, array('uri' => 'javascript:void(0);','attributes' => array(
		        		"content-utilize-ajax"	=> "true", 
		        		"content-ajax"			=> "Base/Pages",
		        		"content-class"			=> "Dashboard\\EditPage",
		        		"content-method"		=> "edit",
		        		"content-args"			=> json_encode( array( "id" => $page->page_id ) ), 
		        		"content-callback"		=> "editPageReady",
				) ) );

			$children = $page->childs();
			if( $children->count() > 0 ) {
				foreach( $children->get() as $cpage ) {
					$this->recursiveIteration($cpage,$newItem);
				}
			}
		}
	}