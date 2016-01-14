<?php
class Sm_Cameraslider_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction(){
        $this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('sm/cameraslider/cameraslider.phtml');
        $this->renderLayout();
    }

    public function previewAction()
    {
        $id = $this->getRequest()->getParam('id');
        $this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('page/empty.phtml');
        $block = $this->getLayout()->createBlock('sm_cameraslider/slide_preview', '', array(
            'id'    => $id
        ));
        $this->getLayout()->getBlock('content')->append($block);
        $this->_title(Mage::helper('sm_cameraslider')->__('Sm Camere SlideShow'))
            ->_title(Mage::helper('sm_cameraslider')->__('Preview Slide'));
        $this->renderLayout();
    }
}
?>