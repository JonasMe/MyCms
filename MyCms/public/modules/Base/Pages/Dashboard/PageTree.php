<?php
	namespace Modules\Base\Pages\Dashboard;
	use Modules\Base\Pages\Models\Page;

	use Knp\Menu\Matcher\Matcher;
	use Knp\Menu\MenuFactory;
	use Knp\Menu\Renderer\ListRenderer;

	class PageTree {

		protected $current;
		
		public function renderTree($current = null) {
			$this->menuArray = array();
			$this->current = $current;
			$pages = Page::all();
			$menu = $this->pageListRendere($pages);
			$renderer = new ListRenderer(new Matcher());

			return $renderer->render($menu);
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
			$newItem = $item->addChild(
						$page->title,
						array('uri' 
									=>
						'/admin/Base.Pages/'.urlencode('Dashboard\Pages').'/edit?args[id]='.$page->page_id ) );
			
			if( !is_null($this->current) && $page->page_id == $this->current ) {
				$newItem->setCurrent(true);
			}

			$children = $page->childs();
			if( $children->count() > 0 ) {
				foreach( $children->get() as $cpage ) {
					$this->recursiveIteration($cpage,$newItem);
				}
			}
		}
	}