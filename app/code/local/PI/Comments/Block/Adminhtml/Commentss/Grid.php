<?php

class PI_Comments_Block_Adminhtml_Commentss_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('commentGrid');
        $this->setDefaultSort('id');// sorting according to which colunm name
    }

    protected function _prepareCollection() {
       
        $collection = Mage::getModel('comments/commentss')->getCollection();
        $this->setCollection($collection);
		//print_r($collection->getData());exit;
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => Mage::helper('comments')->__('ID'),
            'width' => '10%',
            'index' => 'id',
        ));

        $this->addColumn('customer_email', array(
            'header' => Mage::helper('comments')->__('Customer Email'),
            'width' => '15%',
            'index' => 'customer_email',
        ));
          $this->addColumn('customer_name', array(
            'header' => Mage::helper('comments')->__('Customer Name'),
            'width' => '15%',
            'index' => 'customer_name',
        ));
      
       
        
        $this->addColumn('status', array(
                    'header'    => Mage::helper('core')->__('status'),
                    'align'     =>'center',
                'width'     => '10%',
                'height'     => '100px',
                'filter'    => false,
                'sortable'  => false,
                'renderer'  => 'PI_comments_Block_Adminhtml_commentss_Renderer_Status',


                ));

        $this->addColumn('action', array(
            'header' => Mage::helper('comments')->__('Action'),
            'width' => '100',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('comments')->__('View'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {


     
            $this->setMassactionIdField('comments_id');
            $this->getMassactionBlock()->setFormFieldName('comments_id');

            $this->getMassactionBlock()->addItem('delete', array(
                'label' => Mage::helper('	core')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('core')->__('Are you sure?')
            ));
       
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

