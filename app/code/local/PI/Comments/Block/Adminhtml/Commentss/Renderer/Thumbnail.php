<?php
class PI_Comments_Block_Adminhtml_Commentss_Renderer_Thumbnail extends Varien_Data_Form_Element_Abstract {
    public function __construct($data) {
        parent::__construct($data);
        $this->setType('file');
    }
 
    public function getElementHtml() {
        $html = '';
        if ($this->getValue()) {
            
            
            $html = '
                <img id="'.$this->getHtmlId().'_image" style="border: 1px solid #d6d6d6;" title="'.$this->getValue().'" src="'.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$this->getValue().'" alt="'.$this->getValue().'" width="50">
                    
';
        }
        $this->setClass('input-file');
        $html.= parent::getElementHtml();
        return $html;
    }
 
   
}
?>