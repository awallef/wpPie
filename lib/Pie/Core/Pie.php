<?php

class Pie extends Object {

    public $Controller = null;
    
    public $View = null;
    
    public function __construct(  ) {
        
        parent::__construct();
    }
    
    public function render( $requestAction )
    {
        $this->View = $this->Controller->View;
        $layout = ( $this->Controller->layout == null )? 'default' : $this->Controller->layout;
        $viewFile = ( $this->Controller->render == null )? $requestAction : $this->Controller->render;
        
        $this->View->render( $layout, $this->Controller->viewPath.'/'. $viewFile, $this->Controller->viewVars );
    }
    
    
}
