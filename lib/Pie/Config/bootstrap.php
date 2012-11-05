<?php

require_once TEMPLATEPATH . '/lib/Pie/Config/core.php';
require_once TEMPLATEPATH . '/lib/Pie/Core/inc.php';

function load_bootstrap() {
    FileFinder::tryIncludeFile( APP_PATH . '/Config/bootstrap.php');
}

add_action('init', 'load_bootstrap');
