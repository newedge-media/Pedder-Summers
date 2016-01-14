<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Cms_Wysiwyg_Images_Chooser extends Mage_Adminhtml_Block_Template
{
    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $config = $this->getConfig();
        $chooseButton = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setType('button')
            ->setClass('scalable btn-chooser')
            ->setLabel($config['button']['open'])
            ->setOnclick('MediabrowserUtility.openDialog(\''.$this->getUrl('*/cms_wysiwyg_images/index', array('target_element_id' => $element->getName())).'\')')
            ->setDisabled($element->getReadonly());
        $text = new Varien_Data_Form_Element_Text();
        $text->setForm($element->getForm())
            ->setId($element->getName())
            ->setName($element->getName())
            ->setClass('widget-option input-text');
        if ($element->getRequired()) {
            $text->addClass('required-entry');
        }
        if ($element->getValue()) {
            $text->setValue($element->getValue());
        }
        $element->setData('after_element_html', $text->getElementHtml().$chooseButton->toHtml());
        return $element;
    }
}