<?php

class PI_Comments_Block_Adminhtml_Commentss_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

 public function __construct()
  {
      parent::__construct();
      $this->setId('driver_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('comments')->__('Customer Commentss'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('comments')->__('Customer Comments'),
          'title'     => Mage::helper('comments')->__('Customer Comments'),
          'content'   => $this->getLayout()->createBlock('comments/adminhtml_commentss_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
