<?php
/*------------------------------------------------------------------------
 # SM Zen - Version 1.0
 # Copyright (c) 2014 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Supershop_Model_System_Config_Source_Effectimage
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'default', 'label'=>Mage::helper('supershop')->__('Default')),
		array('value'=>'thumbs', 'label'=>Mage::helper('supershop')->__('Display Thumbs Image')),
		array('value'=>'slider', 'label'=>Mage::helper('supershop')->__('Slider Image'))
		);
	}
}
