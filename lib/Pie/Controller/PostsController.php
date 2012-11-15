<?php

class PostsController extends AppController{
    
    public function view()
    {
    
    
	$args = array(
	'post_type'		   => 'post',
	'before'           => '<p>' . __('Pages:'),
	'after'            => '</p>',
	'link_before'      => '<',
	'link_after'       => '>',
	'next_or_number'   => 'number',
	'nextpagelink'     => __('Next page'),
	'previouspagelink' => __('Previous page'),
	'pagelink'         => '%',
	'echo'             => 1
	); 
	
	$nav = $this->Model->query( $args );
	
	$this->set('posts', $nav);	
	
	
	//Project feed    
    
		$args = array(
			'post_type'=> 'portfolio',
			'order'    => 'DSC',


		);
		
		$projects = $this->Model->query( $args );
		
		$this->set('projects', $projects);
	
    }
    
    public function index()
    {
	 		
    }
    
}