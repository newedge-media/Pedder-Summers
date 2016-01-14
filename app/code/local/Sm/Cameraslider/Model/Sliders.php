<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Model_Sliders extends Mage_Core_Model_Abstract
{
    // Type '%' or 'px'
    const PX = 'px';
    const PERCENT = '%';
	const CENTER = 'center';

    // Options Easing
    const EASING_1      = 'linear';
    const EASING_2      = 'swing';
    const EASING_3      = 'easeInQuad';
    const EASING_4      = 'easeOutQuad';
    const EASING_5      = 'easeInOutQuad';
    const EASING_6      = 'easeInCubic';
    const EASING_7      = 'easeOutCubic';
    const EASING_8      = 'easeInOutCubic';
    const EASING_9      = 'easeInQuart';
    const EASING_10     = 'easeOutQuart';
    const EASING_11     = 'easeInOutQuart';
    const EASING_12     = 'easeInQuint';
    const EASING_13     = 'easeOutQuint';
    const EASING_14     = 'easeInOutQuint';
    const EASING_15     = 'easeInExpo';
    const EASING_16     = 'easeOutExpo';
    const EASING_17     = 'easeInOutExpo';
    const EASING_18     = 'easeInSine';
    const EASING_19     = 'easeOutSine';
    const EASING_20     = 'easeInOutSine';
    const EASING_21     = 'easeInCirc';
    const EASING_22     = 'easeOutCirc';
    const EASING_23     = 'easeInOutCirc';
    const EASING_24     = 'easeInElastic';
    const EASING_25     = 'easeOutElastic';
    const EASING_26     = 'easeInOutElastic';
    const EASING_27     = 'easeInBack';
    const EASING_28     = 'easeOutBack';
    const EASING_29     = 'easeInOutBack';
    const EASING_30     = 'easeInBounce';
    const EASING_31     = 'easeOutBounce';
    const EASING_32     = 'easeInOutBounce';

    // const status Active | Not Active
    const ACTIVE        = 1;
    const NOT_ACTIVE    = 2;

    // Status Yes or No
    const YES = 1;
    const NO = 2;

    // Options data-portrait
    const TRUE  = 'true';
    const FALSE = 'false';

    // Options data-target
    const _BLANK    = '_blank';
    const _PARENT   = '_parent';
    const _SELF     = '_self';
    const _TOP      = '_top';

    // background type
    const BACKGROUND_IMAGE          = 'image';
    const BACKGROUND_VIDEO          = 'video';
    const BACKGROUND_COLOR          = 'color';

    // Service Video
    const YOUTUBE               = 'youtube';
    const VIMEO                 = 'vimeo';
    const HTML5                 = 'html5';



    // Options for Video : Loop, Controls, Autoplay, Muted
    const LOOP      = 'loop';
    const CONTROLS  = 'controls';
    const AUTOPLAY  = 'autoplay';
    const MUTED     = 'muted';

    // Options data-video
    const HIDE  = 'hide';

    // Options float
    const LEFT  = 'left';
    const RIGHT = 'right';

    // On|Off
    const OPTION_ON = 'on';
    const OPTION_OFF = 'off';

    // Options text Bold, Italic, Underline
    const BOLDER    = 'bolder';
    const ITALIC    = 'italic';
    const UNDERLINE = 'underline';
    const NORMAL    = 'normal';
    const NONE      = 'none';

    // Options Dispplay Layer
    const BLOCK     = 'block';

    // Options Visibility Layer
    const VISIBLE   = 'visible';
    const HIDDEN    = 'hidden';

    // Options Color Controls Youtube
    const WHITE     = 'white';
    const RED       = 'red';

    // Options Fade In | Fade Out
    const FROMLEFT      = 'fromleft';
    const FROMRIGHT     = 'fromright';
    const FROMTOP       = 'fromtop';
    const FROMLBOTTOM   = 'frombottom';
    const FROMTOIN      = 'fromtoin';
    const TOLEFT        = 'toleft';
    const TORIGHT       = 'toright';
    const TOTOP         = 'totop';
    const TOBOTTOM      = 'tobottom';

	// Options Text Transform
	const CAPITALIZE = 'capitalize';
	const UPPERCASE = 'uppercase';
	const LOWERCASE = 'lowercase';
	const INHERIT = 'inherit';

    /*
     * Define resource model
     * */
    protected function _construct(){
        $this->_init('sm_cameraslider/sliders');
    }

    /*
     * Get Type
     * */
    public function getOptionType()
    {
        $option = new Varien_Object(array(
            self::PX => Mage::helper('sm_cameraslider')->__('px'),
            self::PERCENT => Mage::helper('sm_cameraslider')->__('%'),
        ));
        return $option->getData();
    }

    /*
     * get Status Active | Not Active
     * */
    public function getStatusActiveNotActive()
    {
        $opt = new Varien_Object(array(
            self::ACTIVE        => Mage::helper('sm_cameraslider')->__('Active'),
            self::NOT_ACTIVE    => Mage::helper('sm_cameraslider')->__('Not Active'),
        ));
        return $opt->getData();
    }

    // Get Options Data Easing
    public function getDataEasing()
    {
        return array(
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Linear'),
                'value' => array(
                    array(
                        'value' => self::EASING_1,
                        'label' => Mage::helper('sm_cameraslider')->__('Linear')
                    )
                )
            ),
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Swing'),
                'value' => array(
                    array(
                        'value' => self::EASING_2,
                        'label' => Mage::helper('sm_cameraslider')->__('Swing')
                    )
                )
            ),
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Quad'),
                'value' => array(
                    array(
                        'value' => self::EASING_3,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quad')
                    ),
                    array(
                        'value' => self::EASING_4,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quad')
                    ),
                    array(
                        'value' => self::EASING_5,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quad')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Cubic'),
                'value' => array(
                    array(
                        'value' => self::EASING_6,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Cubic')
                    ),
                    array(
                        'value' => self::EASING_7,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Cubic')
                    ),
                    array(
                        'value' => self::EASING_8,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Cubic')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Quart'),
                'value' => array(
                    array(
                        'value' => self::EASING_9,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quart')
                    ),
                    array(
                        'value' => self::EASING_10,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quart')
                    ),
                    array(
                        'value' => self::EASING_11,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quart')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Quint'),
                'value' => array(
                    array(
                        'value' => self::EASING_12,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quint')
                    ),
                    array(
                        'value' => self::EASING_13,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quint')
                    ),
                    array(
                        'value' => self::EASING_14,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quint')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Expo'),
                'value' => array(
                    array(
                        'value' => self::EASING_15,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Expo')
                    ),
                    array(
                        'value' => self::EASING_16,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Expo')
                    ),
                    array(
                        'value' => self::EASING_17,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Expo')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Sine'),
                'value' => array(
                    array(
                        'value' => self::EASING_18,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Sine')
                    ),
                    array(
                        'value' => self::EASING_19,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Sine')
                    ),
                    array(
                        'value' => self::EASING_20,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Sine')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Circ'),
                'value' => array(
                    array(
                        'value' => self::EASING_21,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Circ')
                    ),
                    array(
                        'value' => self::EASING_22,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Circ')
                    ),
                    array(
                        'value' => self::EASING_23,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Circ')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Elastic'),
                'value' => array(
                    array(
                        'value' => self::EASING_24,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Elastic')
                    ),
                    array(
                        'value' => self::EASING_25,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Elastic')
                    ),
                    array(
                        'value' => self::EASING_26,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Elastic')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Back'),
                'value' => array(
                    array(
                        'value' => self::EASING_27,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Back')
                    ),
                    array(
                        'value' => self::EASING_28,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Back')
                    ),
                    array(
                        'value' => self::EASING_29,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Back')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Bounce'),
                'value' => array(
                    array(
                        'value' => self::EASING_30,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Bounce')
                    ),
                    array(
                        'value' => self::EASING_31,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Bounce')
                    ),
                    array(
                        'value' => self::EASING_32,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Bounce')
                    )
                )
            ),
        );
    }

    // Get Options Data Easing For Only Mobile
    public function getDataMobileEasing()
    {
        return array(
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__(),
            ),
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Linear'),
                'value' => array(
                    array(
                        'value' => self::EASING_1,
                        'label' => Mage::helper('sm_cameraslider')->__('Linear')
                    )
                )
            ),
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Swing'),
                'value' => array(
                    array(
                        'value' => self::EASING_2,
                        'label' => Mage::helper('sm_cameraslider')->__('Swing')
                    )
                )
            ),
            array(
                'label' => Mage::helper('sm_cameraslider')->__('Quad'),
                'value' => array(
                    array(
                        'value' => self::EASING_3,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quad')
                    ),
                    array(
                        'value' => self::EASING_4,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quad')
                    ),
                    array(
                        'value' => self::EASING_5,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quad')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Cubic'),
                'value' => array(
                    array(
                        'value' => self::EASING_6,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Cubic')
                    ),
                    array(
                        'value' => self::EASING_7,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Cubic')
                    ),
                    array(
                        'value' => self::EASING_8,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Cubic')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Quart'),
                'value' => array(
                    array(
                        'value' => self::EASING_9,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quart')
                    ),
                    array(
                        'value' => self::EASING_10,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quart')
                    ),
                    array(
                        'value' => self::EASING_11,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quart')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Quint'),
                'value' => array(
                    array(
                        'value' => self::EASING_12,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Quint')
                    ),
                    array(
                        'value' => self::EASING_13,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Quint')
                    ),
                    array(
                        'value' => self::EASING_14,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Quint')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Expo'),
                'value' => array(
                    array(
                        'value' => self::EASING_15,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Expo')
                    ),
                    array(
                        'value' => self::EASING_16,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Expo')
                    ),
                    array(
                        'value' => self::EASING_17,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Expo')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Sine'),
                'value' => array(
                    array(
                        'value' => self::EASING_18,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Sine')
                    ),
                    array(
                        'value' => self::EASING_19,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Sine')
                    ),
                    array(
                        'value' => self::EASING_20,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Sine')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Circ'),
                'value' => array(
                    array(
                        'value' => self::EASING_21,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Circ')
                    ),
                    array(
                        'value' => self::EASING_22,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Circ')
                    ),
                    array(
                        'value' => self::EASING_23,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Circ')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Elastic'),
                'value' => array(
                    array(
                        'value' => self::EASING_24,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Elastic')
                    ),
                    array(
                        'value' => self::EASING_25,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Elastic')
                    ),
                    array(
                        'value' => self::EASING_26,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Elastic')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Back'),
                'value' => array(
                    array(
                        'value' => self::EASING_27,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Back')
                    ),
                    array(
                        'value' => self::EASING_28,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Back')
                    ),
                    array(
                        'value' => self::EASING_29,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Back')
                    )
                )
            ),array(
                'label' => Mage::helper('sm_cameraslider')->__('Bounce'),
                'value' => array(
                    array(
                        'value' => self::EASING_30,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Bounce')
                    ),
                    array(
                        'value' => self::EASING_31,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease Out Bounce')
                    ),
                    array(
                        'value' => self::EASING_32,
                        'label' => Mage::helper('sm_cameraslider')->__('Ease In Out Bounce')
                    )
                )
            ),
        );
    }

    // get Options Video Loop
    public function getVideoLoop()
    {
        return array(
            array(
                'value' => self::LOOP,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Video Controls
    public function getVideoControls()
    {
        return array(
            array(
                'value' => self::CONTROLS,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Video Loop
    public function getVideoAutoPlay()
    {
        return array(
            array(
                'value' => self::AUTOPLAY,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Video Loop
    public function getVideoMuted()
    {
        return array(
            array(
                'value' => self::MUTED,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Show Information
    public function getVideoShowInfo()
    {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => 0,
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Auto Pause When Another Is Player
    public function getVideoAutoPause()
    {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => 0,
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Show Information
    public function getVideoAutoHide()
    {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('sm_cameraslider')->__('Yes')
            ),
            array(
                'value' => 0,
                'label' => Mage::helper('sm_cameraslider')->__('No')
            ),
        );
    }

    // get Options Show Information
    public function getVideoColorYoutube()
    {
        return array(
            array(
                'value' => self::RED,
                'label' => Mage::helper('sm_cameraslider')->__('Red')
            ),
            array(
                'value' => self::WHITE,
                'label' => Mage::helper('sm_cameraslider')->__('White')
            ),
        );
    }

    // get Options True | False
    public function getTrueFalse()
    {
        $options = new Varien_Object(array(
            self::TRUE  => Mage::helper('sm_cameraslider')->__('True'),
            self::FALSE => Mage::helper('sm_cameraslider')->__('False'),
        ));
        return $options->getData();
    }


    // Get options target
    public function getDataTarget()
    {
        $options = new Varien_Object(array(
            self::_BLANK    => Mage::helper('sm_cameraslider')->__('Blank'),
            self::_PARENT   => Mage::helper('sm_cameraslider')->__('Parent'),
            self::_SELF     => Mage::helper('sm_cameraslider')->__('Self'),
            self::_TOP      => Mage::helper('sm_cameraslider')->__('Top'),

        ));
        return $options->getData();
    }

    public function getBackgroundType()
    {
        $opt = new Varien_Object(array(
            self::BACKGROUND_IMAGE          => Mage::helper('sm_cameraslider')->__('Image'),
//            self::BACKGROUND_VIDEO          => Mage::helper('sm_cameraslider')->__('Video'),
            self::BACKGROUND_COLOR          => Mage::helper('sm_cameraslider')->__('Color'),
        ));
        return $opt->getData();
    }

    public function getServiceVideo()
    {
        $opt = new Varien_Object(array(
//            self::YOUTUBE           => Mage::helper('sm_cameraslider')->__('Youtube'),
            self::VIMEO             => Mage::helper('sm_cameraslider')->__('Vimeo'),
            self::HTML5             => Mage::helper('sm_cameraslider')->__('Html5'),
        ));
        return $opt->getData();
    }

    /*
     * Get status Yes or No
     * */
    public function getOptionYesNo()
    {
        $option = new Varien_Object(array(
            self::NO => Mage::helper('sm_cameraslider')->__('No'),
            self::YES => Mage::helper('sm_cameraslider')->__('Yes')
        ));
        return $option->getData();
    }

    public function getOptsFloat()
    {
        $opt = new Varien_Object(array(
            self::LEFT  => Mage::helper('sm_cameraslider')->__('Left'),
            self::RIGHT => Mage::helper('sm_cameraslider')->__('Right'),
        ));
        return $opt->getData();
    }

    public function getOptsDisplay()
    {
        $opt = new Varien_Object(array(
            self::BLOCK  => Mage::helper('sm_cameraslider')->__('Yes'),
            self::NONE => Mage::helper('sm_cameraslider')->__('No'),
        ));
        return $opt->getData();
    }

    public function getOptsVisibility()
    {
        $opt = new Varien_Object(array(
            self::VISIBLE   => Mage::helper('sm_cameraslider')->__('Visible'),
            self::HIDDEN    => Mage::helper('sm_cameraslider')->__('Hidden'),
        ));
        return $opt->getData();
    }

    public function getOptsTextAlign()
    {
        $opt = new Varien_Object(array(
            self::LEFT      => Mage::helper('sm_cameraslider')->__('Left'),
            self::CENTER    => Mage::helper('sm_cameraslider')->__('Center'),
            self::RIGHT     => Mage::helper('sm_cameraslider')->__('Right'),
        ));
        return $opt->getData();
    }

    public function getOptsTextBold()
    {
        $opt = new Varien_Object(array(
            self::NORMAL    => Mage::helper('sm_cameraslider')->__('No'),
            self::BOLDER    => Mage::helper('sm_cameraslider')->__('Yes'),
        ));
        return $opt->getData();
    }

    public function getOptsTextItalic()
    {
        $opt = new Varien_Object(array(
            self::NORMAL    => Mage::helper('sm_cameraslider')->__('No'),
            self::ITALIC    => Mage::helper('sm_cameraslider')->__('Yes'),
        ));
        return $opt->getData();
    }

    public function getOptsTextUnderline()
    {
        $opt = new Varien_Object(array(
            self::NONE      => Mage::helper('sm_cameraslider')->__('No'),
            self::UNDERLINE => Mage::helper('sm_cameraslider')->__('Yes')
        ));
        return $opt->getData();
    }

    // Get Option On|Off
    public function getOptOnOff()
    {
        $opt = new Varien_Object( array(
            array(
                'value' => self::OPTION_ON,
                'label' => Mage::helper( 'sm_cameraslider' )->__( 'On' )
            ),
            array(
                'value' => self::OPTION_OFF,
                'label' => Mage::helper( 'sm_cameraslider' )->__( 'Off' )
            )
        ) );
        return $opt->getData();
    }

    // Get Options Data Video
    public function getDataVideo()
    {
        return array(
            array(
                'value' => '',
                'label' => Mage::helper('sm_cameraslider')->__('Display')
            ),
            array(
                'value' => self::HIDE,
                'label' => Mage::helper('sm_cameraslider')->__('Hide')
            ),
        );
    }

    // Get Options Fade In | Fade Out
    public function getFadeIn()
    {
        $opt = new Varien_Object(array(
            self::FROMTOP       => Mage::helper('sm_cameraslider')->__('From Top'),
            self::FROMLBOTTOM   => Mage::helper('sm_cameraslider')->__('From Bottom'),
            self::FROMLEFT      => Mage::helper('sm_cameraslider')->__('From Left'),
            self::FROMRIGHT     => Mage::helper('sm_cameraslider')->__('From Right'),
            self::FROMTOIN      => Mage::helper('sm_cameraslider')->__('From In')
        ));
        return $opt->getData();
    }

    public function getFadeOut()
    {
        $opt = new Varien_Object(array(
            self::TOTOP         => Mage::helper('sm_cameraslider')->__('To Top'),
            self::TOBOTTOM      => Mage::helper('sm_cameraslider')->__('To Bottom'),
            self::TOLEFT        => Mage::helper('sm_cameraslider')->__('To Left'),
            self::TORIGHT       => Mage::helper('sm_cameraslider')->__('To Right'),
            self::FROMTOIN       => Mage::helper('sm_cameraslider')->__('To In')
        ));
        return $opt->getData();
    }

	/*
	 * Get Text Transform
	 * */
	public function getTextTransForm()
	{
		$option = new Varien_Object(array(
			self::NONE => Mage::helper('sm_cameraslider')->__('None'),
			self::CAPITALIZE => Mage::helper('sm_cameraslider')->__('Capitalize'),
			self::UPPERCASE => Mage::helper('sm_cameraslider')->__('Uppercase'),
			self::LOWERCASE => Mage::helper('sm_cameraslider')->__('Lowercase'),
			self::INHERIT => Mage::helper('sm_cameraslider')->__('Inherit')
		));
		return $option->getData();
	}

    public function _afterLoad()
    {
        $slidersid  = $this->getId();
        $slideId   = $this->getData('slide_id');
        $layers     = Mage::helper( 'core' )->jsonDecode( $this->getLayers() );
        $this->setData( (array) Mage::helper( 'core' )->jsonDecode( $this->getParams() ) );
        $this->setData( 'layers', $layers );
        $this->setSlidersId( $slidersid );
        $this->setSlideId( $slideId );
        return parent::_afterLoad();
    }

    public function _beforeSave()
    {
        if ( is_array( $this->getData( 'layers' ) ) )
        {
            $this->setData( 'layers', Mage::helper( 'core' )->jsonEncode($this->getLayers()));
        }
        return parent::_beforeSave();
    }
}