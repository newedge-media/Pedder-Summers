<?php
/*------------------------------------------------------------------------
 # SM Supershop - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Supershop_Model_System_Config_Source_ListFooter
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'1', 'label'=>Mage::helper('supershop')->__('Footer 1')),
			array('value'=>'2', 'label'=>Mage::helper('supershop')->__('Footer 2'))
		);
	}
}
