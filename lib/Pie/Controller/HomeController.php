<?php

class HomeController extends AppController{
    
    public function view()
    {
		
		//Featured feed    
    
		$args = array(
			'post_type'=> 'post',
			'order'    => 'DSC',
			'showposts' => 3,
			

		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);
		
		//Older posts feed
		
		$args = array(
			'post_type'=> 'post',
			'order'    => 'DSC',
			'offset' => 3,
			'showposts' => 6
		);
		
		$posts2 = $this->Model->query( $args );
		
		$this->set('posts2', $posts2);
		
		
		// Project post feed
		
		
		$args = array(
			'post_type'=> 'portfolio',
			'order'    => 'DSC',
			'showposts' => 3
		);
		
		$posts3 = $this->Model->query( $args );
		
		$this->set('posts3', $posts3);


	    }
}