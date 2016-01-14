<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Adminhtml_Sliders_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('sliders_tabs');
        $this->setDestElementId('sliders_form');
        $slide = Mage::registry('slide');

        if($slide->getId())
        {
            $this->setTitle("<i class='fa fa-windows'></i>".Mage::helper('sm_cameraslider')->__('%s\'s Sliders', $slide->getData('name_slide')));
        }else{
            $this->setTitle(Mage::helper('sm_cameraslider')->__('Sliders'));
        }
    }

    public function _prepareLayout()
    {

        $modelSlide     = Mage::registry('slide');
        $modelSliders   = Mage::registry('sliders');
        $_sliders       = $modelSlide->getAllSliders();
        foreach($_sliders as $item)
        {
            if(($item->getId()) == ($modelSliders->getId()))
            {
                $this->addTab('sliders_section_'.$item->getId(), array(
                    'title'     => $item->getData('sliders_title') ? $item->getData('sliders_title') : "Sliders : {$item->getData('sliders_title')}",
                    'label'     => $item->getData('sliders_title') ? "<i class='fa fa-th-list'></i>".$item->getData('sliders_title') : "Sliders : {$item->getData('sliders_title')}",
                    'content'   => $this->getLayout()->createBlock('sm_cameraslider/adminhtml_sliders_edit_tab_main')->toHtml()
                ));
                $this->_activeTab = 'sliders_section_'.$item->getId();
            }else{
                $this->addTab('sliders_section_'.$item->getId(), array(
                    'title'     => $item->getData('sliders_title') ? $item->getData('sliders_title') : "Sliders : {$item->getData('sliders_title')}",
                    'label'     => $item->getData('sliders_title') ? "<i class='fa fa-th-list'></i>".$item->getData('sliders_title') : "Sliders : {$item->getData('sliders_title')}",
                    'url'       => $this->getUrl('*/*/addSliders', array(
                        'sid'   => $modelSlide->getId(),
                        'id'    => $item->getId()
                    ))
                ));
            }
        }
        if(!$modelSliders->getId())
        {
            $this->addTab('sliders_section_new', array(
                'title'     => Mage::helper('sm_cameraslider')->__('New Sliders'),
                'label'     => "<i class='fa fa-puzzle-piece'></i>".Mage::helper('sm_cameraslider')->__('New Sliders'),
                'content'   => $this->getLayout()->createBlock('sm_cameraslider/adminhtml_sliders_edit_tab_main')->toHtml()
            ));
            $this->_activeTab = 'sliders_section_new';
        }else{
            $this->addTab('sliders_section_new', array(
                'title'     => Mage::helper('sm_cameraslider')->__('New Sliders'),
                'label'     => "<i class='fa fa-puzzle-piece'></i>".Mage::helper('sm_cameraslider')->__('New Sliders'),
                'url'       => $this->getUrl('*/*/addSliders', array(
                    'sid'   => $modelSlide->getId(),
                ))
            ));
        }
        parent::_prepareLayout();
    }
}