<?php
	namespace Modules\Base\Pages\Dashboard;
	use Modules\Base\Pages\Models\Page;

	class EditPage {

		public function edit($id = null) {
			if( is_numeric($id) ) {
				$page = Page::find($id);
				return \Template::make('@Pages\editPage.phtml',array("page" => $page));
			}
		}

	}