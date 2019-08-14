<?php

class PI_Comments_Block_Adminhtml_Commentss_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('comments_form', array('legend' => Mage::helper('comments')->__('Customer Details')));

        $fieldset->addField('customer_email', 'text', array(
            'label' => Mage::helper('comments')->__('Customer Name'),
            'class' => 'required-entry',
            'required' => true,
             'readonly' => true,
            'name' => 'customer_email',
        ));
        
        $fieldset->addField('customer_name', 'text', array(
            'label' => Mage::helper('comments')->__('Customer Email'),
            'class' => 'required-entry',
            'required' => true,
             'readonly' => true,
            'name' => 'customer_name',
        ));
        
        $fieldset->addField('comments', 'textarea', array(
            'label' => Mage::helper('comments')->__('Comments'),
            'class' => 'required-entry',
            'required' => true,
           
            'name' => 'comments',
        ));
        
       
       $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('comments')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('comments')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('comments')->__('Disabled'),
              ),
          ),
      ));

      $fieldset->addType('thumbnail','PI_Comments_Block_Adminhtml_Commentss_Renderer_Thumbnail');
        //image type make image display in front at the time of editing.
        $fieldset->addField('picture', 'thumbnail', array(
            'label' => Mage::helper('comments')->__('Picture'),
            'required' => false,

             'style'   => "display:none;",
             'readonly' => true,
              
            'name' => 'picture',
        ));
        
      

        



        if (Mage::getSingleton('adminhtml/session')->getDriverData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getDriverData());
            Mage::getSingleton('adminhtml/session')->setDriverData(null);
        } elseif (Mage::registry('customer_data')) {
            $form->setValues(Mage::registry('customer_data')->getData());
        }
        return parent::_prepareForm();
    }

}
