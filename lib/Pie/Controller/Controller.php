<?php

class Controller extends Object
{

    public $helpers = array('Html');
    
    public $name = null;
    
    public $layout = null;
    
    public $viewPath = null;
    
    public $viewVars = array();
    
    public $render = null;
    
    public $View = null;
    
    public function __construct(  ) {
        if ($this->name === null) {
            $this->name = substr(get_class($this), 0, -10);
        }

        if ($this->viewPath == null) {
            $this->viewPath = $this->name;
        }
        
        $this->View = new View();
        
        parent::__construct();
    }
    
    public function beforeFilter(){
        
    }
    
    public function beforeRender(){
        
    }
    
    public function set($one, $two = null) {
        if (is_array($one)) {
            if (is_array($two)) {
                $data = array_combine($one, $two);
            } else {
                $data = $one;
            }
        } else {
            $data = array($one => $two);
        }
        $this->viewVars = array_merge($data, $this->viewVars);
    }
}
