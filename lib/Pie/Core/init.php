<?php

$pie = new Pie();

function processPieMvc() {

    global $pie;

    // Load AppController
    if (!FileFinder::tryIncludeFile(APP_PATH . '/Controller/AppController.php'))
        FileFinder::tryIncludeFile(PIE_LIB_PATH . '/Controller/AppController.php');

    // Load the RIGHT Controller based on wp needs
    $class = 'undefined';
    $action = 'view';
    $params = array();

    if (is_home()) {
        $class = 'HomeController';
    } elseif (is_single()) {
        global $post;
        $postType = Inflector::camelize(get_post_type($post->ID));
        //print_r(get_post_type_object(get_post_type($post->ID)));
        $class = $postType.'Controller';
    } elseif (is_category()) {
        $class = 'CategoriesController';
    } elseif (is_page()) {
        $class = 'PagesController';
    } elseif (is_search()) {
        $class = 'SearchController';

        $action = 'index';
    } elseif (is_archive()) {
        
    } elseif (is_404()) {
        
        $params = tryUrl();
        if( count($params) > 0 )
        {
            header('HTTP/1.1 200 OK');
            $class = Inflector::camelize( array_shift($params) ) .'Controller';
            $action = array_shift($params);
            
        }else{
            $class = 'ErrorController';
        }
        
    } else {
        $class = 'PostsController';

        $action = 'index';
    }

    if (!FileFinder::tryIncludeFile(APP_PATH . '/Controller/' . $class . '.php')) {
        if (!FileFinder::tryIncludeFile(PIE_LIB_PATH . '/Controller/' . $class . '.php')) {
            FileFinder::tryIncludeFile(PIE_LIB_PATH . '/Controller/PostsController.php');
            $class = 'PostsController';
        }
    }


    $pie->Controller = new $class();

    $pie->Controller->beforeFilter();
    
    try{
       call_user_func_array(array($pie->Controller, $action), $params);
        $pie->Controller->beforeRender();
        $pie->render($action); 
    }catch(Exception $e){
        FileFinder::tryIncludeFile(PIE_LIB_PATH . '/Controller/ErrorController.php');
        $action = 'view';
        $pie->Controller = new ErrorController();
        call_user_func_array(array($pie->Controller, $action), array());
        $pie->render($action);
    }
    
    exit;
}

add_action('template_redirect', 'processPieMvc');