<?php
/*------------------------------------------------------------------------
 # SM Twitter Slider - Version 1.0.1
 # Copyright (c) 2014 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Twitterslider_Helper_Data extends Mage_Core_Helper_Abstract
{
	const XML_ENABLED_TWITTERSLIDER  = 'twitterslider_cfg/general/isenabled';
	const XML_INCLUDE_JQUERY  = 'twitterslider_cfg/advanced/include_jquery';

	public function enabledTwitterSlider($store = null)
	{
		return Mage::getStoreConfigFlag(self::XML_ENABLED_TWITTERSLIDER, $store);
	}

	public function getIncludeJquery($store = null)
	{
		return Mage::getStoreConfig(self::XML_INCLUDE_JQUERY, $store);
	}

	public function getInlucdeJQquery()
	{
		if (!(int)$this->enabledTwitterSlider()) return;
		if (!defined('MAGENTECH_JQUERY') && (int)$this->getIncludeJquery()) {
			define('MAGENTECH_JQUERY', 1);
			$_jquery_libary = 'sm/twitterslider/js/jquery-2.1.3.min.js';
			return $_jquery_libary;
		}
	}

	public function getInlucdeNoconflict()
	{
		if (!(int)$this->enabledTwitterSlider()) return;
		if (!defined('MAGENTECH_JQUERY_NOCONFLICT') && (int)$this->getIncludeJquery()) {
			define('MAGENTECH_JQUERY_NOCONFLICT', 1);
			$_jquery_noconflict = 'sm/twitterslider/js/jquery-noconflict.js';
			return $_jquery_noconflict;
		}
	}

	public function addJsCarousel()
	{
		if (!(int)$this->enabledTwitterSlider()) return;
		/* $_css = 'sm/twitterslider/js/jcarousel.js';
		return $_css; */
	}

	public function addJsCjSwipe()
	{
		if (!(int)$this->enabledTwitterSlider()) return;
		/* $_css = 'sm/twitterslider/js/jquery.cj-swipe.js';
		return $_css; */
	}

    public function __construct()
    {
        $this->defaults = array(
            /* General setting */
            'isenabled' => '1',
            'title' => 'SM [Modulename]',
            'screenname' => '',
            'consumekey' => '',
            'consumersecret' => '',
            'count' => 6,
            'display_avatars' => 1,
            'display_follow_button' => 1,
            'display_direction_button' => 1,
            'start' => 1,
            'play' => 1,
            'pause_hover' => 1,
            'effect' => 'slide',
            'swipe_enable' => '',
            'include_jquery' => 1,
            'pretext' => '',
            'posttext' => ''

            /**config_fields**/
        );
    }

    function get($attributes = array())
    {
        $data = $this->defaults;
        $general = Mage::getStoreConfig("twitterslider_cfg/general");
        $advanced = Mage::getStoreConfig("twitterslider_cfg/advanced");
        if (!is_array($attributes)) {
            $attributes = array($attributes);
        }
        if (is_array($general)) $data = array_merge($data, $general);
        if (is_array($advanced)) $data = array_merge($data, $advanced);

        return array_merge($data, $attributes);;
    }
}

?>