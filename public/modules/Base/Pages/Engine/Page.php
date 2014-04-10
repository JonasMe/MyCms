<?php
	namespace Modules\Base\Pages\Engine;
	use \Modules\Base\Pages\Models;

	class Page {

		/* Using uppercase for neater display in template */
		public $Model;
		public $Placeholders;

		public $pageExists;

		public function __construct($id_or_slug = null) {
			$this->Placeholders = array();
			$this->pageExists = true;

			if( $id_or_slug == null ) {
				$this->pageExists = false;
			} else {
				if( is_numeric($id_or_slug) ) {
					$this->getPageById($id_or_slug);
				} elseif ( is_string($id_or_slug) ) {
					$this->getPageBySlug($id_or_slug);
				} else {
					$this->pageExists = false;
				}
			}
		}

		public function render() {
			if( $this->pageExists ) {
				$template = \Template::make( $this->Model->view, array("yo" => "Hej!"));

				foreach( $this->Placeholders as $p ) {
					print $p->objects()->first()->title;
				}

				return $template;

			} else {
				return "No";
			}
		}

		public function addPlaceholder($title) {
			$placeholderSlug = strtoupper(\Str::slug($title,''));
			try {
				$this->Placeholders[] = Models\Placeholder::where('textual_id','like',$placeholderSlug)->firstOrFail();
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$p = new Models\Placeholder();
				$p->textual_id = $placeholderSlug;
				$p->title = $title;
				$p->page_id = $this->Model->page_id;
				$this->Placeholders[] = $p->save();

			}
		}


		private function getPageById($id) {
			try {
				$page = Models\Page::findOrFail($id);
				$this->Model = $page;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$this->pageExists = false;
			}
		}

		private function getPageBySlug($slug) {
			try {
				$page = Models\Page::where('slug','like',$slug)->firstOrFail();
				$this->Model = $page;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$this->pageExists = false;
			}
		}
	}