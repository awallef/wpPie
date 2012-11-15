<?php

class PagesController extends AppController{
     
   
    public function view()
    {
    		
    $content = '';		
    		
    switch ($content){ 
	    
	    	case "/github/Stage/wpTest/?page_id=31":
	        	$content = 'about';
	    		break;
	    
	    	case "http://localhost:8888/github/Stage/wpTest/?page_id=33":
	        	$content = 'contact';
	    		break;
	    		
	    	case "/github/Stage/wpTest/?page_id=242":
	        	$content = 'portfolio';
	    		break;

	    	default:
	        	$content = 'contact';
	        	break;
		}
		
		$this->set('content', $content);
		
		
    		
    //Team Member posts
    
	   $args = array(
			'post_type'=> 'teammembers',
			'order'    => 'ASC',

		);
		
		$posts = $this->Model->query( $args );
		
		$this->set('posts', $posts);
		
	//Portfolio page
    
	   $args = array(
			'post_type'=> 'portfolio',
			'order'    => 'ASC',

		);
		
		$portfolios = $this->Model->query( $args );
		
		$this->set('portfolios', $portfolios);

	
    }
}