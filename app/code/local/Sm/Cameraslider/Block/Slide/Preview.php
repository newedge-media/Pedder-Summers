<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);
class Sm_Cameraslider_Block_Slide_Preview extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{
	protected $slideHtmlId;
	protected $styleSlide;
	protected $slideHtmlIdWrapper;
	protected $numSliders;
	protected $customAnimations;
	protected $_config = null;
	protected $hash = null;

	protected function _construct()
	{
		parent::_construct();
		$this->_config = $this->_getCfg();
	}

	public function _getCfg($attr = null)
	{
		// get default config.xml
		$defaults = array();
		$def_cfgs = Mage::getConfig()
			->loadModulesConfiguration('config.xml')
			->getNode('default/cameraslider')->asArray();
		if (empty($def_cfgs)) return;
		$groups = array();
		foreach ($def_cfgs as $def_key => $def_cfg) {
			$groups[] = $def_key;
			foreach ($def_cfg as $_def_key => $cfg) {
				$defaults[$_def_key] = $cfg;
			}
		}

		// get configs after change
		$_configs = (array)Mage::getStoreConfig("cameraslider");
		if (empty($_configs)) return;
		$cfgs = array();

		foreach ($groups as $group) {
			$_cfgs = Mage::getStoreConfig('cameraslider/' . $group . '');
			foreach ($_cfgs as $_key => $_cfg) {
				$cfgs[$_key] = $_cfg;
			}
		}

		// get output config
		$configs = array();
		foreach ($defaults as $key => $def) {
			if (isset($defaults[$key])) {
				$configs[$key] = $cfgs[$key];
			} else {
				unset($cfgs[$key]);
			}
		}
		$this->_config = ($attr != null) ? array_merge($configs, $attr) : $configs;
		return $this->_config;
	}

	public function _getConfig($name = null, $value_def = null)
	{
		if (is_null($this->_config)) $this->_getCfg();
		if (!is_null($name)) {
			$value_def = isset($this->_config[$name]) ? $this->_config[$name] : $value_def;
			return $value_def;
		}
		return $this->_config;
	}


	public function _setConfig($name, $value = null)
	{

		if (is_null($this->_config)) $this->_getCfg();
		if (is_array($name)) {
			$this->_config = array_merge($this->_config, $name);

			return;
		}
		if (!empty($name) && isset($this->_config[$name])) {
			$this->_config[$name] = $value;
		}
		return true;
	}

	protected function _prepareLayout()
	{
		if(Mage::helper('sm_cameraslider')->enabledCameraslider())
		{
			$head = $this->getLayout()->getBlock('head');
			if (Mage::app()->getRequest()->getActionName() == 'preview') {
				$head->addJs('sm/cameraslider/js/jquery-migrate-1.2.1.min.js');
				$head->addJs('sm/cameraslider/js/jquery-2.1.3.min.js');
				$head->addJs('sm/cameraslider/js/jquery-noconflict.js');
			}
			return parent::_prepareLayout();
		}
	}
//	public function checkAllSmartPhone(){
//
//		// returns true if one of the specified mobile browsers is detected
//
//		$regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
//		$regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
//		$regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
//		$regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
//		$regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
//		$regex_match.=")/i";
//		return isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
//	}
//
//	public function is_mobile(){
//		$arr_smartphone = array('Iphone', 'Ipad', 'Android');
//		foreach ($arr_smartphone as $a)
//		{
//			if ( strpos($_SERVER['HTTP_USER_AGENT'], $a) ){
//				return $a;
//			}
//		}
//	}

	public function renderHtml()
	{
		$dem = 0;
		$html = '';
		$output  = '';
		if(Mage::helper('sm_cameraslider')->enabledCameraslider())
		{
			if($this->getData('id'))
			{
				$ids = array($this->getData('id'));
			}
			elseif(Mage::helper('sm_cameraslider')->useWidget())
			{
				$ids = array($this->getData('id'));
			}
			else
			{
				$ids = Mage::helper('sm_cameraslider')->getSlide() ? explode(',', Mage::helper('sm_cameraslider')->getSlide()) : null;
			}

			foreach($ids as $id)
			{
				$modelSlide = Mage::getModel('sm_cameraslider/slide')->load($id);
				if($modelSlide->getId() && $modelSlide->getStatus() == 1) {
					$dem++;
					$scripts = array();
					foreach ($scripts as $script) {
						$html .= "<script type='text/javascript' src='{$script}'></script>";
					}
					$slideWidth1 = (int)$modelSlide->getData('slide_width') ? $modelSlide->getData('slide_width') : '960';
					$slideWidth = "width: {$slideWidth1}px;";
					$slideHeight = (int)$modelSlide->getData('slide_height') ? $modelSlide->getData('slide_height') : '574';
					$slideHeight = "height: {$slideHeight}px;";
					$this->slideHtmlId = "enfinity_" .$modelSlide->getId();
					$pagination = $modelSlide->getData('pagination');
					$data_time = (int)$modelSlide->getData('time_load') ? (int)$modelSlide->getData('time_load') : '7000';
					$data_transperiod = (int)$modelSlide->getData('trans_period') ? (int)$modelSlide->getData('trans_period') : '1500';
					$data_autoadv = $modelSlide->getData('auto_advance');
					$data_playpause = $modelSlide->getData('play_pause');
					$data_pagination = $modelSlide->getData('pagination');
					$data_prevnext = $modelSlide->getData('prev_next');
					if ($pagination == 'false') {
						$styleDivContainerSLide = "style='z-index:9999; clear: both;'";
					} else {
						$styleDivContainerSLide = "style='z-index:9999; clear: both;'";
					}

					$output .= $html;
					$output .= "<div {$styleDivContainerSLide}>";
					$output .= "<div id='$this->slideHtmlId' class='pix_slideshow' style='width:100%; visibility: visible;'>";
					$output .= "<div id='1_{$this->slideHtmlId}' class='pix_slideshow_target' style='{$slideWidth} {$slideHeight} visibility: visible;'  data-width='{$slideWidth1}' data-time='{$data_time}' data-transperiod='{$data_transperiod}' data-autoadvance='{$data_autoadv}' data-playpause='{$data_playpause}' data-prevnext='{$data_prevnext}' data-pagination='{$data_pagination}'>";
					$output .= $this->renderSliders($modelSlide);
					$output .= "</div>";
					$output .= "<div class='filmore_commands filmore_autoadv'>";
					if ($data_playpause == 'true') {
						$output .= "<a href='#' class='filmore_pause  filmore_command' style=''>Pause</a>";
						$output .= "<a href='#' class='filmore_play filmore_command' style=''>Play</a>";
					}
					if ($data_prevnext == 'true') {
						$output .= "<a href='#' class='filmore_prev filmore_command' style=''><span>Prev</span></a>";
					}
					$output .= "<span class='filmore_pagination'>";
					$output .= "</span>";
					if ($data_prevnext == 'true') {
						$output .= "<a href='#' class='filmore_next filmore_command'><span>Next</span></a>";
					}
					if ($data_autoadv == 'true')
					{
						$output .= "<div class='filmore_loader'>";
						$output .= "</div>";
					}else{
						$output .= "<div class='filmore_loader' style='visibility: hidden;'>";
						$output .= "</div>";
					}
					$output .= "</div>";
					$output .= "</div>";
					$output .= "</div>";
					$output .= $this->renderJsEnfinity();
					$output .= "<div class='clearfix_cameraslider cameraslider'></div>";
				}
			}
		}
		return $output;
	}

	protected function _toHtml()
	{
		if (!$this->_getConfig('enabled', 1)) return;
		$use_cache = (int)$this->_getConfig('use_cache');
		$cache_time = (int)$this->_getConfig('cache_time');
		$folder_cache = dirname(dirname(__FILE__)).'/Cache/';
		if(!file_exists($folder_cache))
			mkdir ($folder_cache, 0777);
		if (!class_exists('Cache_Lite'))
			require_once($this->getBaseDir() .  'lib' . DS .  'Sm' .DS . 'Cameraslider' .DS . 'Cache_Lite' . DS . 'Lite.php');
		$options = array(
			'cacheDir' => $folder_cache,
			'lifeTime' => $cache_time
		);
		$Cache_Lite = new Cache_Lite($options);

		if ($use_cache){
			$this->hash = md5( serialize($this->_getConfig()) );
			if ($data = $Cache_Lite->get($this->hash)) {
				return  $data;
			}
			else
			{
				$output = $this->renderHtml();
				$this->setTemplate($output);
				$data = parent::_toHtml();
				$Cache_Lite->save($output);
				return $output;
			}
		}else{
			if(file_exists($folder_cache))
				$Cache_Lite->_cleanDir($folder_cache);
			$output = $this->renderHtml();
			$this->setTemplate($output);
			return $output;
		}
		return parent::_toHtml();
	}

	private function renderJsEnfinity()
	{
		return "<script type='text/javascript'>
        jQuery(function()
        {
            jQuery('#{$this->slideHtmlId}').each(function()
            {
                var e = jQuery('#1_{$this->slideHtmlId}', this),
                t = parseFloat(e.attr('data-time')),
                a = parseFloat(e.attr('data-transperiod')),
                i = 'true' == e.attr('data-prevnext') ? jQuery('.filmore_prev', this) : '',
                r = 'true' == e.attr('data-prevnext') ? jQuery('.filmore_next', this) : '',
                o = 'true' == e.attr('data-playpause') ? jQuery('.filmore_pause', this) : '',
                s = 'true' == e.attr('data-playpause') ? jQuery('.filmore_play', this) : '',
                n = 'true' == e.attr('data-pagination') ? jQuery('.filmore_pagination', this) : '',
                u = jQuery('.filmore_loader', this),
                l = 'true' == e.attr('data-autoadvance') ? !0 : !1;
                e.filmore(
                    {
                        time: t,
                        transPeriod: a,
                        prev: i,
                        next: r,
                        pause: o,
                        play: s,
                        pagination: n,
                        loader: u,
                        autoadv: l,
                        slide_id: '#{$this->slideHtmlId}'
                    })
            })
        });</script>";
	}

	public function renderSliders($modelSlide)
	{
		$sliders            = $modelSlide->getAllSliders(true);
		$this->numSliders   = count($sliders);
		$duration           = $modelSlide->getData('delay_load');
		$output             = '';
		if($modelSlide && $this->numSliders)
		{
			$index = 0;
			foreach($sliders as $slider)
			{
				$bgtype     = $slider->getData('background_type');
				$load_bg_color = $slider->getData('sliders_bg_color');
				$styleImage = '';
				switch($bgtype)
				{
					case 'image':
						$urlSlideImage = $slider->getData( 'data_src') ? Mage::getBaseUrl( 'media' ) . $slider->getData( 'data_src' ) : $this->getSkinUrl('sm/cameraslider/images/nophoto.jpg');
						break;
					case 'color':
						$urlSlideImage = Mage::getBaseUrl('js').'sm/cameraslider/js_plugin/images/transparent.png';
						if ($load_bg_color)
							$styleImage = "background: #{$load_bg_color};";
						else
							$styleImage = "background: transparent;";
						break;
					case 'video':
						$urlSlideImage = strpos( $slider->getData( 'data_src_video' ), 'http' ) == 0 ? Mage::getBaseUrl( 'media' ) . $slider->getData( 'data_src_video' ) : $this->getSkinUrl('sm/cameraslider/images/nophoto.jpg');
						break;
				}

				$output .= "<div>";
				$output .= "<div style='{$styleImage}' data-src='{$urlSlideImage}' data-use='background'></div>";
				$output .= $this->renderLayers($slider);
				$output .= "</div>";
				$index++;
			}
		}else{
			$output = '<div class="no-sliders-text" style="display: block; color: #ffffff;">';
			$output .= $this->__('No find the sliders, please you add sliders');
			$output .= '</div>';
		}
		return $output;
	}

    public function getHtml5Sliders($layer)
    {
        $mediaUrl       = Mage::getBaseUrl( 'media' );
	    $video_data     = $layer->getData('video_data');
	    $order = (int)$layer->getData('order');

	    $urlMp4         = $video_data['urlMp4'];
	    $htmlMp4        = $urlMp4 ? '<source src='.$mediaUrl.$urlMp4.' type="video/mp4" />' : '';

	    $urlWebm        = $video_data['urlWebm'];
	    $htmlWebm       = $urlWebm ? '<source src='.$mediaUrl.$urlWebm.' type="video/webm" />' : '';

	    $urlOgg         = $video_data['urlOgg'];
	    $htmlOgg        = $urlOgg ? '<source src='.$mediaUrl.$urlOgg.' type="video/ogg" />' : '';

	    $videoLoop      = $video_data['loop'] ? 'loop' : '';
	    $videoControls  = $video_data['controls'] ? 'controls' : '';
	    $videoAutoPlay  = $video_data['autoplay'] ? 'autoplay' : '';
	    $videoMuted     = $video_data['muted'] ? 'muted' : '';

	    $html           = "<div class='video_html5_cameraslider'>";
	    $html           .= "<video width='100%' height='100%' $videoAutoPlay $videoControls $videoLoop $videoMuted style='z-index:{$order}; position: absolute; overflow: hidden;'>";
	    $html           .= $htmlMp4;
	    $html           .= $htmlWebm;
	    $html           .= $htmlOgg;
	    $html           .= "</video>";
	    $html           .= "</div>";
        return $html;
    }

	public function renderLayers($slider)
	{
		if(!$slider->getLayers())
			return '';
		$output = '';
		$zIndex = 2;
		$styleCss = "position: absolute; z-index:999; padding:0;";
		foreach($slider->getLayers() as $layer)
		{
			$layer = new Varien_Object($layer);
			$type = $layer->getData('type');
			$layer_text = $layer->getData('text');
			$order = (int)$layer->getData('order');
			$float = "float:left;";
			$left1 = $layer->getData('left');
			$left = $left1 ? "left:{$left1};" : '';

			$right = 'right: auto;';

			$top1 = $layer->getData('top');
			$top = $top1 ? "top:{$top1};" : '';

			$bottom = 'bottom: auto;';

			$width = $layer->getData('width');
			$width_layer = $width ? "width:{$width}%;" : '';

			$height = $layer->getData('height');
			$height_layer = $height ? "height:{$height}%;" : '';

			$min_width = $layer->getData('min_width');
			$min_width = $min_width ? "min-width:{$min_width}%;" : '';

			$min_height = $layer->getData('min_height');
			$min_height = $min_height ? "min-height:{$min_height}%;" : '';

			if($type == "text")
			{
				$bg_color = $layer->getData('bg_color') ? (($layer->getData('bg_color') != 'transparent' ) ? "background:#{$layer->getData('bg_color')};" : 'background: transparent;') : '';
			}
			else
			{
				$bg_color = "background: transparent;";
			}

			$color = $layer->getData('color');
			$color = $color ? "color:#{$color};" : '';

			$font_family = $layer->getData('font_family');
			$font_family = $font_family ? "font-family:{$font_family};" : 'font-family: "Helvetica Neue", Verdana, Arial, sans-serif;';

			$font_size1 = (int)$layer->getData('font_size');
			$font_size = $font_size1 ? "font-size:{$font_size1}px;" : '';

			$text_align = $layer->getData('text_align');
			$text_align = $text_align ? "text-align:{$text_align};" : '';


			$textBold = $layer->getData('textBold');
			$textBold = $textBold ? "font-weight: {$textBold};" : '';

			$textItalic = $layer->getData('textItalic');
			$textItalic = $textItalic ? "font-style: {$textItalic};" : '';

			$textUnderline = $layer->getData('textUnderline');
			$textUnderline = $textUnderline ? "text-decoration: {$textUnderline};" : '';

			$textTransform = $layer->getData('textTransform');
			$textTransform = $textTransform ? "text-transform: {$textTransform};" : '';

			$class_layer = $layer->getData('class');
			$time_delay_transitions = $layer->getData('time_delay_transitions') ? $layer->getData('time_delay_transitions') : '1500';
			$time_transitions = $layer->getData('time_transitions') ? $layer->getData('time_transitions') : '500';
			$data_easein = $layer->getData('data_easein');
			$data_easeout = $layer->getData('data_easeout');
			$data_fxin = $layer->getData('data_fxin');
			$data_fxout = $layer->getData('data_fxout');
			$data_fadein = $layer->getData('data_fadein');
			$data_fadeout = $layer->getData('data_fadeout');
			$id = $type.'_'.$order;
			$classes = $layer->getData('classes');
			if(($classes == 'hide'))
			{
				$visibility = "visibility: hidden;";
			}else{
				$visibility = "visibility: visible;";
			}
			$enable_link = $layer->getData('enable_link');
			$title = $layer->getData('title_link');
			$title = $title ? $title : '';
			$alt = $layer->getData('alt_image');
			$alt = $alt ? "alt='{$alt}'" : "alt=''";
			$target = $layer->getData('target_link');
			$target = $target ? "target='{$target}'" : '';
			$link_http1 = $layer->getData('link');
			$type_link = array('http://', 'https://');
			$error_type_link = array();
			foreach ($type_link as $l)
			{
				if(!((string)strpos($link_http1, $l) === '0'))
				{
					$error_type_link[] = 1;
				}
			}

			if (count($error_type_link) == 2)
			{
				$link_http = "http://{$link_http1}";
			}
			else
			{
				$link_http = $link_http1;
			}

			$html = '';
			$styleCss .= "{$visibility}{$float}{$left}{$right}{$top}{$bottom}{$width_layer}{$height_layer}{$min_width}{$min_height}{$bg_color}{$color}{$font_family}{$font_size}{$text_align}{$textBold}{$textItalic}{$textUnderline}";
			$html_link_text = "<a href='{$link_http}' title='{$title}' {$target}>{$title}</a>";
			$html_text = $layer_text;
			$src_url = Mage::getBaseUrl('media').$layer->getData('image_url');
			$html_image = "<img src='{$src_url}' style='position: static;{$styleCss}' />";

			if($type == 'text')
			{
				$fsize = (int)$layer->getData('font_size');
				$output .= "<div class='filmore_caption' data-fontsize='{$fsize}' style='opacity:0;{$font_family}{$width_layer}{$height_layer}{$min_width}{$min_height}' data-use='caption' data-style='left:{$left1},top:{$top1}' data-delay='{$time_delay_transitions}' data-time='{$time_transitions}' data-easein='{$data_easein}' data-easeout='{$data_easeout}' data-fxin='{$data_fxin}' data-fxout='{$data_fxout}' data-fadein='{$data_fadein}' data-fadeout='{$data_fadeout}'>";
				$output .= "<em  style='position: relative;z-index:{$order};{$visibility}{$font_size}{$float}{$left}{$right}{$top}{$bottom}width:100%;height:100%;{$min_width}{$min_height}{$bg_color}{$color}{$text_align}{$textBold}{$textItalic}{$textUnderline}{$textTransform}' class='{$class_layer}'>$html_text</em>";
				$output .= "</div>";
			}
			elseif ($type == 'image')
			{
				$output .= "<div class='dataLoaded filmoreLoaded' style='opacity:0;{$visibility}{$float}{$left}{$right}{$top}{$bottom}{$width_layer}{$height_layer}{$min_width}{$min_height}{$bg_color}' data-src='{$src_url}' data-use='simple' data-style='left:{$left1},top:{$top1}' data-delay='{$time_delay_transitions}' data-time='{$time_transitions}' data-easein='{$data_easein}' data-easeout='{$data_easeout}' data-fxin='{$data_fxin}' data-fxout='{$data_fxout}' data-fadein='{$data_fadein}' data-fadeout='{$data_fadeout}'>";
				if ($link_http1)
				{
					$output .= "<a href='{$link_http}' {$target}>";
				}
				if($width && $height)
					$output .= "<img style='position: relative;z-index:{$order};{$visibility}width:100%;height:100%;' src='{$src_url}' {$alt} class='{$class_layer}'/>";
				elseif($width)
					$output .= "<img style='position: relative;z-index:{$order};{$visibility}width:100%;' src='{$src_url}' {$alt} class='{$class_layer}'/>";
				elseif($height)
					$output .= "<img style='position: relative;z-index:{$order};{$visibility}height:100%;' src='{$src_url}' {$alt} class='{$class_layer}'/>";
				else
					$output .= "<img style='position: relative;z-index:{$order};{$visibility}' src='{$src_url}' {$alt} class='{$class_layer}'/>";

				if ($link_http1)
				{
					$output .= "</a>";
				}
				$output .= "</div>";
			}
			elseif ($type == 'video')
			{
				$htmlVideo = "";
				$video_width = $layer->getData('video_width') ? $layer->getData('video_width') : '100%';
				$video_height = $layer->getData('video_height') ? $layer->getData('video_height') : '100%';
				$video_class = $layer->getData('class') ? $layer->getData('class') : '';
				$video_left = $layer->getData('left') ? 'left:'.$layer->getData('left').';' : 'left:auto;';
				$video_top = $layer->getData('top') ? 'top:'.$layer->getData('top').';' : 'top:auto;';
				$httpBases = 'https://';
				$service_video = $layer->getData('service_video');
				$video_data = $layer->getData('video_data');
				if((isset($service_video)) && ($service_video == 'youtube'))
				{
					$loop = ($video_data['loop']) ? 'loop=1' : 'loop=0';
					$autoplay = ($video_data['autoplay']) ? 'autoplay=1' : 'autoplay=0';
					$data_play = ($video_data['autoplay']) ? '1' : '0';
					$controls = ($video_data['controls']) ? 'controls=1' : 'controls=0';
					$nophoto = $this->getSkinUrl('sm/cameraslider/images/nophoto.jpg');
					$src_bg_video = ($layer->getData('video_image_url')) ? $layer->getData('video_image_url') : "{$nophoto}";
					$src_video = $httpBases."www.youtube.com/embed/{$layer->getData('src_video')}".'?'.$controls.'&'.$autoplay.'&'.$loop;
					$htmlVideo .= "<iframe class='{$video_class}' data-autoplay='{$data_play}' src='{$src_video}' width='{$video_width}' height='{$video_height}' style='z-index:{$order};{$video_left}{$video_top}' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";

				}
				elseif((isset($service_video)) && ($service_video == 'vimeo'))
				{
					$loop = ($video_data['loop']) ? 'loop=1' : 'loop=0';
					$autoplay = ($video_data['autoplay']) ? 'autoplay=1' : 'autoplay=0';
					$data_play = ($video_data['autoplay']) ? '1' : '0';
					$nophoto = $this->getSkinUrl('sm/cameraslider/images/nophoto.jpg');
					$src_bg_video = ($layer->getData('video_image_url')) ? $layer->getData('video_image_url') : "{$nophoto}";
					$src_video = $httpBases."player.vimeo.com/video/{$layer->getData('video_id')}".'?'.$autoplay.'&'.$loop;
					$htmlVideo .= "<iframe class='{$video_class}' data-autoplay='{$data_play}' src='{$src_video}' width='{$video_width}' height='{$video_height}' style=''></iframe>";
				}
				elseif((isset($service_video)) && ($service_video == 'html5')){
					$url_media = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
					$nophoto = $this->getSkinUrl('sm/cameraslider/images/trans_tile2.png');
					$src_bg_video = ($video_data['urlPoster']) ? $url_media.$video_data['urlPoster'] : "{$nophoto}";
					$htmlVideo .= $this->getHtml5Sliders($layer);
				}
				$output .= "<div class='' style='opacity:0;z-index:{$order};{$visibility}{$float}{$left}{$right}{$top}{$bottom}width:{$video_width}%;height:{$video_height}%;{$min_width}{$min_height}{$bg_color}' data-src='{$src_bg_video}' data-use='video' data-style='left:{$left1},top:{$top1}' data-delay='{$time_delay_transitions}' data-time='{$time_transitions}' data-easein='{$data_easein}' data-easeout='{$data_easeout}' data-fxin='{$data_fxin}' data-fxout='{$data_fxout}' data-fadein='{$data_fadein}' data-fadeout='{$data_fadeout}'>";
				$output .= $htmlVideo;
				$output .= "</div>";
			}
			$zIndex++;
		}
		return $output;
	}
}