<?php
	namespace Modules\Base\Pages\Dashboard;
	use Modules\Base\Pages\Models\Page;

	class ArrayPageTree {

		protected $current;
		protected $menuArray;

		public function renderTree($current = null) {
			$this->menuArray = array();
			$this->current = $current;
			$pages = Page::all();

			$this->pageListRendere($pages);
			return $this->menuArray;
		}

		public function pageListRendere($pages) {
			foreach($pages as $page) {
				if( $page->parent_id == 0 ) {
					$this->menuArray[] = $this->recursiveIteration($page);
				}
			}	
		}

		public function recursiveIteration(\Modules\Base\Pages\Models\Page $page) {

			$arr =  array( "title" => $page->title, "childs" => array(), "id" => $page->page_id  );
			
			if( !is_null($this->current) && $page->page_id == $this->current ) {
				$arr["current"] = true;
			}

			$children = $page->childs();
			if( $children->count() > 0 ) {
				foreach( $children->get() as $cpage ) {
					$arr["childs"][] = $this->recursiveIteration($cpage);
				}
			}

			return $arr;
		}
	}