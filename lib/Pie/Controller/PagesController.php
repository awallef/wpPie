<?php

class PagesController extends AppController{
     
   
    public function view()
    {
    		
	
    		
    $content = 'portfolio';
		
		$this->set('content', $content);
		
		
    		
    //Team Member posts 1-3
    
	   $args = array(
			'post_type'=> 'teammembers',
			'order'    => 'DESC',
			'showposts' => '3'

		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);
		
		// posts 3+
		$args = array(
			'post_type'=> 'teammembers',
			'order'    => 'DESC',
			'offset' => '3'

		);
		
		$posts2 = $this->Model->query( $args );
		
		$this->set('posts2', $posts2);
		
	//Portfolio page
    
	   $args = array(
			'post_type'=> 'portfolio',
			'order'    => 'ASC',

		);
		
		$portfolios = $this->Model->query( $args );
		
		$this->set('portfolios', $portfolios);

	//Archive page
    
	   $args = array(
			'post_type'=> 'post',
			'order'    => 'ASC',

		);
		
		$archives = $this->Model->query( $args );
		
		$this->set('archives', $archives);

	
	
    }
}