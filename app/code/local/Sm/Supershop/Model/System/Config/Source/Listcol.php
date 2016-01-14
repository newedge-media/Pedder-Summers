<?php
/*------------------------------------------------------------------------
 # SM Supershop - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Supershop_Model_System_Config_Source_ListCol
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'0', 'label'=>Mage::helper('supershop')->__('0')),
		array('value'=>'1', 'label'=>Mage::helper('supershop')->__('1')),
		array('value'=>'2', 'label'=>Mage::helper('supershop')->__('2')),
		array('value'=>'3', 'label'=>Mage::helper('supershop')->__('3')),
		array('value'=>'4', 'label'=>Mage::helper('supershop')->__('4')),
		array('value'=>'5', 'label'=>Mage::helper('supershop')->__('5')),
		array('value'=>'6', 'label'=>Mage::helper('supershop')->__('6')),
		array('value'=>'7', 'label'=>Mage::helper('supershop')->__('7')),
		array('value'=>'8', 'label'=>Mage::helper('supershop')->__('8')),
		array('value'=>'9', 'label'=>Mage::helper('supershop')->__('9')),
		array('value'=>'10', 'label'=>Mage::helper('supershop')->__('10')),
		array('value'=>'11', 'label'=>Mage::helper('supershop')->__('11')),
		array('value'=>'12', 'label'=>Mage::helper('supershop')->__('12'))
		);
	}
}
