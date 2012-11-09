<?php

class PagesController extends AppController{
    
    public function view()
    {
	   $args = array(
			'post_type'=> 'page',
			'order'    => 'DSC'
		);
		
		$pages = $this->Model->query( $args );
		
		$this->set('pages', $pages);
		
    }
}