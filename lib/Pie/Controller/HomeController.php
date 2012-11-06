<?php

class HomeController extends AppController{
    
    public function view()
    {
		$args = array(
			'post_type'=> 'post',
			'order'    => 'DSC'
		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);
				
    }
}