<?php

class PI_Comments_Block_Adminhtml_Commentss extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_controller = 'adminhtml_commentss';
        $this->_blockGroup = 'comments';
        $this->_headerText = Mage::helper('comments')->__('Customer comments');
        parent::__construct();       
        $this->_removeButton('add');
       
   
        
    }

}
