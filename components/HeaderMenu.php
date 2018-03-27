<?php

class HeaderMenu extends CWidget
{
	public $type;

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() 
	{
		$this->render('header_menu', $this->type);	
	}
}
