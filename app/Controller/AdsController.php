<?php


class AdsController extends AppController {

    function _ad( $campagne ) {
        if (!$campagne)
            throw new Exception;
        parent::retrieveVideoAd($campagne);
        $this->render = 'view';
    }

    function google($campagne) {
        $this->_ad($campagne);
    }
    
    function facebook($campagne) {
        $this->_ad($campagne);
    }

    function others($campagne) {
        $this->_ad($campagne);
    }

    function eca($campagne) {
        $this->_ad($campagne);
    }

}

?>
