<?php

class AppController extends Controller {

    function retrieveVideo() {
        $args = array('post_type' => 'prevention_campaigns', 'posts_per_page' => 10, 'orderby' => 'date', 'order' => 'DESC');
        $post_objects = new WP_Query($args);
        $posts = array();

        foreach ($post_objects->posts as $po) {
            $post = array();
            foreach ($po as $key => $value) {
                $post[$key] = $value;
            }
            $post['video'] = get_post_meta($po->ID, "youtube", $single = true);
            if( $post['ID'] != 9 ) $posts[] = $post;
        }

        $mainVideo = array_shift($posts);

        $this->set('posts', $posts);
        $this->set('mainVideo', $mainVideo);
    }

    function retrieveVideoAd($campagne = null)
    {
        if( $campagne == 'sapin' ) $campagne = 9;
        else $campagne = 5;
        
        $args = array(
            'p' => $campagne,
            'post_type' => 'prevention_campaigns'
        );
        $post_objects = new WP_Query($args);
        
        
        //print_r( $post_objects );
        
        $mainVideo = array();
        foreach ($post_objects->posts as $po) {
            
            foreach ($po as $key => $value) {
                $mainVideo[$key] = $value;
            }
            $mainVideo['video'] = get_post_meta($po->ID, "youtube", $single = true);
        }
        
        
        
        $this->set('mainVideo', $mainVideo);
    }

}