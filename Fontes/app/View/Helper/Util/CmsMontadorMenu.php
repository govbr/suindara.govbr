<?php 

	App::uses('CmsMenuElement', 'View/Helper/Din');

	interface CmsMontadorMenu
	{
		public function htmlMenu(CmsMenuElement $baseMenu);
	}