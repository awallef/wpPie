<?php

class View extends Object {
    
    public $viewVars = null;

    public function __construct() {

        parent::__construct();
    }
    
    public function element( $elem ){
	    if (FileFinder::fileExists( APP_PATH . '/View/Elements/' . $elem . '.php' ) ) {
            $elem = APP_PATH . '/View/Elements/' . $elem . '.php';
            return $this->_evaluate($elem, $this->viewVars);
        }
    }

    public function getVars() {
        return array_keys($this->viewVars);
    }

    
    public function getVar($var) {
        return $this->get($var);
    }

    public function get($var) {
        if (!isset($this->viewVars[$var])) {
            return null;
        }
        return $this->viewVars[$var];
    }

    protected function _evaluate($___viewFn, $___dataForView) {
        extract($___dataForView, EXTR_SKIP);
        ob_start();
        include $___viewFn;
        return ob_get_clean();
    }

    public function render($layout, $template, $viewVars) {

        $this->viewVars = $viewVars;

        if (FileFinder::fileExists(APP_PATH . '/View/' . $template . '.php')) {
            $template = APP_PATH . '/View/' . $template . '.php';
        } else {
            $template = PIE_LIB_PATH . '/View/' . $template . '.php';
        }

        $content_for_layout = $this->_evaluate($template, $viewVars);

        if (FileFinder::fileExists(APP_PATH . '/View/Layouts/' . $layout . '.php')) {
            $layout = APP_PATH . '/View/Layouts/' . $layout . '.php';
        } else {
            $layout = PIE_LIB_PATH . '/View/Layouts/' . $layout . '.php';
        }

        ob_start();
        require_once($layout);
        $document = ob_get_contents();
        ob_end_clean();

        echo $document;
    }

}
