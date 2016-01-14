<?php
/*------------------------------------------------------------------------
 # SM Zen - Version 1.0
 # Copyright (c) 2014 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Supershop_Model_System_Config_Source_Columnlisting
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'1', 'label'=>Mage::helper('supershop')->__('1 Column')),
		array('value'=>'2', 'label'=>Mage::helper('supershop')->__('2 Columns')),
		array('value'=>'3', 'label'=>Mage::helper('supershop')->__('3 Columns')),
		array('value'=>'4', 'label'=>Mage::helper('supershop')->__('4 Columns')),
		array('value'=>'5', 'label'=>Mage::helper('supershop')->__('5 Columns')),
		array('value'=>'6', 'label'=>Mage::helper('supershop')->__('6 Columns'))
		);
	}
}
