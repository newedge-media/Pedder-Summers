<?php
/*------------------------------------------------------------------------
# SM Camera SLider - Version 1.0.1
# Copyright (c) 2015 YouTech Company. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: YouTech Company
# Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
	class Sm_Cameraslider_Block_Adminhtml_Cameraslider_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
	{
		
		protected function _prepareForm()
		{
			$form = new Varien_Data_Form(array(
				'id' 		=> 'cameraslider_form',
				'action' 	=> $this->getUrl('*/*/save', $arrayName = array('id' => $this->getRequest()->getParam('id'))),
				'method'	=> 'post',
				'enctype'	=> 'multipart/form-data'
			));

			$form->setUseContainer(true);
			$this->setForm($form);
			return parent::_prepareForm();
		}
	}
?>