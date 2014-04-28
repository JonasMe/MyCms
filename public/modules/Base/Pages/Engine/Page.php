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
				$this->getFrontPage();
			} else {
				if( $id_or_slug instanceof \Modules\Base\Pages\Models\Page ) {
					$this->Model = $id_or_slug;
				} elseif ( is_numeric($id_or_slug) ) {
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
				return $template;

			} else {
				return "No";
			}
		}

		public function addPlaceholder($title) {
			$placeholderSlug = strtoupper(\Str::slug($title,''));
			try {
				$placeholder = Models\Placeholder::where('textual_id','like',$placeholderSlug)->where('page_id','=',$this->Model->page_id)->firstOrFail();
				$options = "";
				
				foreach( $placeholder->objects()->where('enabled','=',1)->get() as $object ) {
					$options .= \Modules::get('Base','Pages')->moduleOption($object)->make();
				}

				return $options;

			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$p = new Models\Placeholder();
				$p->textual_id = $placeholderSlug;
				$p->title = $title;
				$p->page_id = $this->Model->page_id;
				$this->Placeholders[] = $p->save();
			}
		}

		private function getFrontPage() {
			try {
				$page = Models\Page::where('is_frontpage','=',1)->where('is_active','=',1)->firstOrFail();
				$this->Model = $page;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$this->pageExists = false;
			}
		}

		private function getPageById($id) {
			try {
				$page = Models\Page::where('page_id','=',$id)->where('is_active','=',1)->firstOrFail();
				$this->Model = $page;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$this->pageExists = false;
			}
		}

		private function getPageBySlug($slug) {
			try {
				$page = Models\Page::where('slug','like',$slug)->where('is_active','=',1)->firstOrFail();
				$this->Model = $page;
			} catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
				$this->pageExists = false;
			}
		}
	}