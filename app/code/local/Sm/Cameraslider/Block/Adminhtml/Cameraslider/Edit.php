<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Adminhtml_Cameraslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId    = 'slide_id';
        $this->_blockGroup  = 'sm_cameraslider';
        $this->_controller  = 'adminhtml_cameraslider';
        $this->_updateButton( 'save', 'label', Mage::helper( 'sm_cameraslider' )->__( 'Save' ) );
        $this->_updateButton( 'delete', 'label', Mage::helper( 'sm_cameraslider' )->__( 'Delete' ) );

        $slide = Mage::registry('slide');
        $privewUrl = $this->getUrl('cameraslider/index/preview', array(
            'id'    => $slide->getId()
        ));
        if($slide->getId())
        {
            $this->_addButton('preview', array(
                'label' => Mage::helper('sm_cameraslider')->__('Preview'),
                'title' => Mage::helper('sm_cameraslider')->__('Preview Slide'),
                'class' => 'show-hide',
                'onclick'   => "popWin('$privewUrl')"
            ));
        }
            $this->addButton('saveandcontinue', array(
                'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
                'onclick'   => 'saveAndContinueEdit()',
                'class'     => 'save'
            ), -100);

        $this->_formScripts[] = "
        editForm = new varienForm('cameraslider_form', '');
                function toggleEditor() {
					if (tinyMCE.getInstanceById('cameraslider_form') == null){
						tinyMCE.execCommand('mceAddControl', false, 'cameraslider_form');
					}else{
						tinyMCE.execCommand('mceRemoveControl', false, 'cameraslider_form');
				    }
				}

				function saveAndContinueEdit(){
					editForm.submit($('cameraslider_form').action+'back/edit/');
				}
        ";
    }

    /*
        Retrieve text for header element depending on loaded page

        @return string
    */
    public function getHeaderText()
    {
        $model = Mage::helper('sm_cameraslider')->getCamerasliderItemInstance();
        if($model->getId())
        {
            return "<i class='fa fa-qrcode'></i>".Mage::helper('sm_cameraslider')->__("%s", $this->escapeHtml($model->getData('name_slide')));
        }else{
            return "<i class='fa fa-plus-circle'></i>".Mage::helper('sm_cameraslider')->__('Add New Slide');
        }
    }
}