<?php
class HomeController extends AppController {
	
	public function view()
	{
		parent::retrieveVideo();
		
	}
	
	public function explorer()
	{
		parent::retrieveVideo();
		
		$this->layout = 'explorer';
	}
}