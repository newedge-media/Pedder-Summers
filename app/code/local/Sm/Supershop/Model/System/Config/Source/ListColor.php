<?php
/*------------------------------------------------------------------------
 # SM Zen - Version 1.0
 # Copyright (c) 2014 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Supershop_Model_System_Config_Source_ListColor
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'cyan', 'label'=>Mage::helper('supershop')->__('Cyan')),
		array('value'=>'orange', 'label'=>Mage::helper('supershop')->__('Orange')),
		array('value'=>'green', 'label'=>Mage::helper('supershop')->__('Green'))
		);
	}
}
