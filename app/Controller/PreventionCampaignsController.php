<?php

class PreventionCampaignsController extends AppController{
    
    public function view()
    {
	    $mainVideo = array();
	    
	    global $post;
	    
	    foreach( $post as $key => $value )
	    {
		    $mainVideo[ $key ] = $value;
		    $mainVideo['video'] = get_post_meta($post->ID, "youtube", $single = true);
	    }
	    
	    $this->set('mainVideo', $mainVideo );
	    
	    $args = array( 'post_type' => 'prevention_campaigns', 'posts_per_page' => 10 );
		$post_objects = new WP_Query( $args );
		$posts = array();
		
		foreach( $post_objects->posts as $po )
		{
			if( $po->ID != $mainVideo['ID'] )
			{
				$p = array();
				foreach( $po as $key => $value )
				{
					$p[$key] = $value;
				}
				$p['video'] = get_post_meta($po->ID, "youtube", $single = true);
				$posts[] = $p;
			}
		}
		
		$this->set('posts', $posts);
    }
    
}