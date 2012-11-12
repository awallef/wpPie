<?php

class PagesController extends AppController{
    
    public function view()
    {
    
    //Team Member posts
    
	   $args = array(
			'post_type'=> 'teammembers',
			'order'    => 'ASC',

		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);

		
    }
}