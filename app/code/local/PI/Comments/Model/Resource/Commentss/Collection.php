<?php

class PI_Comments_Model_Resource_Commentss_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('comments/commentss');
    }
}
