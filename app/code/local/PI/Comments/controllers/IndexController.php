<?php

class PI_Comments_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction() {

        try {
            $model = Mage::getModel('comments/commentss');
            $data = $this->getRequest()->getParams();

			//print_r($data);print_r($_FILES);exit;

            $now = time();
            $path = Mage::getBaseDir('media') . DS . 'picomments' . DS . 'comments';
            $uploader_main = new Varien_File_Uploader('picture');
            $uploader_main->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png', 'svg', 'eps'));
            $uploader_main->setAllowRenameFiles(false);
            $uploader_main->setFilesDispersion(false);
            $img_name = explode('.', $_FILES['picture']['name']);
            $img_name_main = $now . '.' . $img_name[count($img_name) - 1];
            $uploader_main->save($path, $img_name_main);
            /*             * unlink images * */
            $data['picture'] = 'picomments/comments/'. $img_name_main;

            $model->setData($data);
            $model->save();

            Mage::getSingleton('core/session')->addSuccess(Mage::helper('core')->__('Comments has been successfully saved.'));
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }
        $this->_redirectReferer();
    }

}

