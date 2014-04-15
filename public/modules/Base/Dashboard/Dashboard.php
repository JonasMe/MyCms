<?php
	namespace Modules\Base\Dashboard;
	use Knp\Menu\Renderer\ListRenderer;
	use Knp\Menu\Matcher\Matcher;
	
	class Dashboard {
		public function index($content = "") {
			$renderer = new ListRenderer(new Matcher());
			$passAlong = array();
			$passAlong['sidebar'] = $renderer->render($this->controller->getSideMenu() );
			$passAlong['content'] = $content;
			return \Template::make('@Dashboard/index.phtml',$passAlong);
		}
	}