<?php

// GLOBALS Functions
function h($string) {
    return htmlspecialchars($string);
}

function tryUrl(){
    
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    
    $requestURL = substr($pageURL, strlen( site_url() ) + 1 );
    $params = explode('/', $requestURL);
    
    if( count( $params) < 2 ) return array();
    
    $pattern = '/[.]+([a-z]{1,5})$/';
    
    if( preg_match($pattern, $params[1]) != false )  $params[1] = preg_replace($pattern, '', $params[1] );
    //echo $params[1];
    
    if( !FileFinder::fileExists(APP_PATH. '/Controller/' . Inflector::camelize($params[0]) . 'Controller.php') ) return array();
    else return $params;
}
