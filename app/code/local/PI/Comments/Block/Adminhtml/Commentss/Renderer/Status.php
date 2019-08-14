<?php

class PI_Comments_Block_Adminhtml_Commentss_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        return ($this->_getStatus($row));
    }

    protected function _getStatus(Varien_Object $row) {

        $status = $row->getStatus();
        $result = '';

        if ($status == '1') {
            $result = 'Enabled';
        } else {
            $result = 'Disabled';
        }
        return $result;
    }

}

?>
