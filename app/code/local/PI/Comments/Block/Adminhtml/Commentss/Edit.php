<?php

class PI_Comments_Block_Adminhtml_Commentss_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'comments';
        $this->_controller = 'adminhtml_commentss'; /* adminhtml is a folder name and brand is a folder name in which edit.php inside a block exists */



        $this->_updateButton('delete', 'label', Mage::helper('comments')->__('Delete'));


        $this->_updateButton('save', 'label', Mage::helper('comments')->__('Save'));


        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('edge_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edge_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edge_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
               
            }
        ";
    }

    public function getHeaderText() {
        if (Mage::registry('customer_data') && Mage::registry('customer_data')->getId()) {
            return Mage::helper('comments')->__("Customer Details '%s'", $this->htmlEscape(Mage::registry('customer_data')->getCustomerName()));
        } else {
            return Mage::helper('comments')->__('Add comments Location');
        }
    }

}
