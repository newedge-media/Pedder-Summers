<?php
/**
 * Created by PhpStorm.
 * User: Vu Van Phan
 * Date: 23/01/2015
 * Time: 23:34
 */
class Sm_Cameraslider_Helper_Data extends Mage_Core_Helper_Abstract
{
	const XML_ENABLED_CAMERASLIDER  = 'cameraslider/general/enabled';
	const XML_USE_WIDGET            = 'cameraslider/general/use_widget';
	const XML_SLIDE_CAMERASLIDER    = 'cameraslider/general/slide';
	const XML_INCLUDE_JQUERY        = 'cameraslider/jquery/include_jquery';

	/*
	 *  Cameraslider item instance for lazy load
	 *
	 *  @var Sm_Cameraslider_Model_Data
	 * */
	protected $_camerasliderItemInstance;
	protected $_camerasliderItemSlidersInstance;

	public function enabledCameraslider($store = null)
	{
		return Mage::getStoreConfigFlag(self::XML_ENABLED_CAMERASLIDER, $store);
	}
	public function useWidget($store = null)
	{
		return Mage::getStoreConfigFlag(self::XML_USE_WIDGET, $store);
	}

	public function getSlide($store = null)
	{
		return Mage::getStoreConfig(self::XML_SLIDE_CAMERASLIDER, $store);
	}

	public function getIncludeJquery($store = null)
	{
		return Mage::getStoreConfig(self::XML_INCLUDE_JQUERY, $store);
	}

	public function getCamerasliderItemInstance()
	{
		if(!$this->_camerasliderItemInstance)
		{
			$this->_camerasliderItemInstance = Mage::registry('slide');
			if(!$this->_camerasliderItemInstance)
			{
				Mage::throwException($this->__('Cameraslider item instance does not exit in Registry'));
			}
		}
		return $this->_camerasliderItemInstance;
	}

	public function getInlucdeJQquery()
	{
		if (!(int)$this->enabledCameraslider()) return;
		if (!defined('MAGENTECH_JQUERY') && (int)$this->getIncludeJquery()) {
			define('MAGENTECH_JQUERY', 1);
			$_jquery_libary = 'sm/cameraslider/js/jquery-2.1.3.min.js';
			return $_jquery_libary;
		}
	}

	public function getInlucdeNoconflict()
	{
		if (!(int)$this->enabledCameraslider()) return;
		if (!defined('MAGENTECH_JQUERY_NOCONFLICT') && (int)$this->getIncludeJquery()) {
			define('MAGENTECH_JQUERY_NOCONFLICT', 1);
			$_jquery_noconflict = 'sm/cameraslider/js/jquery-noconflict.js';
			return $_jquery_noconflict;
		}
	}

	public function getInlucdeMigrate()
	{
		if (!(int)$this->enabledCameraslider()) return;
		if (!defined('MAGENTECH_JQUERY_MIGRATE') && (int)$this->getIncludeJquery()) {
			define('MAGENTECH_JQUERY_MIGRATE', 1);
			$_jquery_noconflict = 'sm/cameraslider/js/jquery-migrate-1.2.1.min.js';
			return $_jquery_noconflict;
		}
	}

	public function randomInt()
	{
		return "_".uniqid(rand().time());
	}

	public function setSlideHtmlId($sId)
	{
		return "sm_cameraslider_{$sId}".$this->randomInt();
	}
	public function setSlideHtmlIdWrapper($wrapId)
	{
		return "sm_cameraslider_{$wrapId}_wrapper".$this->randomInt();
	}
}