<?php

class HomeController extends AppController{
    
    public function view()
    {
		$args = array(
			'post_type'=> 'post',
			'order'    => 'ASC'
		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);
		
		
					
  						
    }
}