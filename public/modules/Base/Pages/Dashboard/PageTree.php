<?php
	namespace Modules\Base\Pages\Dashboard;
		use Modules\Base\Pages\Models\Page;

	class PageTree {
		public function renderTree() {
			$pages = Page::all();
			return \Template::render('@Pages\typo.phtml',array("pages" => $pages));
		}
	}