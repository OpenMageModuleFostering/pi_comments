<?php

class PI_Comments_Model_Commentss extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('comments/commentss'); /* driver is the frontname and order is current file name */
    }
   
    
}
