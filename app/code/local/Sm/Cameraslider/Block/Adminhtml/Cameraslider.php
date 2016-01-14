<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Adminhtml_Cameraslider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /*
     * Block construstor
     * */
    public function __construct()
    {
        $this->_controller = 'adminhtml_cameraslider';
        $this->_blockGroup = 'sm_cameraslider';
        $this->_headerText = "<i class='fa fa-folder-open'></i>".Mage::helper('sm_cameraslider')->__('Manager Slide');
        parent::__construct();
        if(Mage::helper('sm_cameraslider/admin')->isActionAllowed('save'))
        {
            $this->_updateButton('add', 'label',
                Mage::helper('sm_cameraslider')->__('Add Slide')
            );
        }else{
            $this->_removeButton('add');
        }
    }

    protected function _isAllowedAction( $action )
    {
        return true;
    }
}