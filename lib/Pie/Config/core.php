<?php

// CONST
define('PIE_LIB_PATH', TEMPLATEPATH . '/lib/Pie');
define('APP_PATH', TEMPLATEPATH . '/app');

// INCLUDES
require_once PIE_LIB_PATH . '/Utility/Inflector.php';
require_once PIE_LIB_PATH . '/Utility/FileFinder.php';

require_once PIE_LIB_PATH . '/Core/Object.php';
require_once PIE_LIB_PATH . '/View/View.php';
require_once PIE_LIB_PATH . '/Controller/Controller.php';
require_once PIE_LIB_PATH . '/Core/Pie.php';

$pie = new Pie();

function initPieMvc() {
    
    global $pie;

    // Load AppController
    if ( !FileFinder::tryIncludeFile( APP_PATH . '/Controller/AppController.php') ) FileFinder::tryIncludeFile( PIE_LIB_PATH . '/Controller/AppController.php');
    
    // Load the RIGHT Controller based on wp needs
    $class = 'undefined';
    
    if (is_home()){
        $class = 'HomeController';
        
    } elseif (is_single()) {
        global $post;
        $postType = Inflector::camelize( get_post_type($post->ID) );
        $class = $postType.'Controller';
        
    } elseif (is_page()) {
        $class = 'PageController';
        
    } elseif (is_search()) {
        $class = 'SearchController';
        
    } elseif (is_archive()) {
        $class = 'ArchiveController';
        
    } elseif (is_404()) {
        $class = 'ErrorController';
        
    }else{
        $class = 'PostController';
    }
    
    if ( !FileFinder::tryIncludeFile( APP_PATH . '/Controller/'.$class.'.php') )
    {
        if( !FileFinder::tryIncludeFile( PIE_LIB_PATH . '/Controller/'.$class.'.php') )
        {
            FileFinder::tryIncludeFile( APP_PATH . '/Controller/PostController.php');
            $class = 'PostController';
        }
    }
    
    $pie->Controller = new $class();
    
    echo $class;

    exit;
}

add_action('template_redirect', 'initPieMvc');

?>
