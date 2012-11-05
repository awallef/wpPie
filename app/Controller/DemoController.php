<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DemoController
 *
 * @author mike
 */
class DemoController extends AppController {
    
    function _ad( $campagne ) {
        if (!$campagne)
            throw new Exception;
        parent::retrieveVideoAd($campagne);
        $this->render = 'view';
    }
    
    public function one()
    {
        $this->_ad('cuisine');
    }
    
    public function two()
    {
        $this->_ad('sapin');
    }
    
    public function three()
    {
        $this->_ad('cuisine');
    }
    
    
}

?>
