<?php

/**
 * facebook_widgets extension for Contao Open Source CMS
 *
 * Copyright (C) 2013 Codefog
 *
 * @package facebook_widgets
 * @author  Codefog <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */

namespace Facebook;


/**
 * Provide methods to handle Facebook plugins.
 */
class Facebook
{

	/**
	 * Add a Facebook namespace to the HTML tag
	 * @param string
	 * @param string
	 * @return string
	 */
	public function addFacebookNamespace($strContent, $strTemplate)
	{
		if (substr($strTemplate, 0, 3) == 'fe_')
		{
			$strContent = preg_replace('/<html/', '<html xmlns:fb="http://ogp.me/ns/fb#"', $strContent);
		}

		return $strContent;
	}


	/**
	 * Include the Facebook namespace
	 */
	public static function includeNamespace()
	{
		$GLOBALS['TL_HOOKS']['outputFrontendTemplate']['FB_NAMESPACE'] = array('Facebook', 'addFacebookNamespace');
	}


	/**
	 * Include the JavaScript SDK library
	 * @param string
	 */
	public static function includeJavascriptSDK($strLanguage='en_US')
	{
		$strKey = '';

		// Use the TL_BODY if available
		if (version_compare(VERSION, '3.1', '>='))
		{
			$strKey = 'TL_BODY';
		}
		// Older versions of Contao
		else
		{
			global $objPage;
			$objLayout = \LayoutModel::findByPk($objPage->layout);

			if ($objLayout !== null)
			{
				// Use jQuery
				if ($objLayout->addJQuery)
				{
					$strKey = 'TL_JQUERY';
				}

				// Use MooTools
				if ($objLayout->addMooTools)
				{
					$strKey = 'TL_MOOTOOLS';
				}
			}
		}

		if ($strKey == '')
		{
			return;
		}

		$GLOBALS[$strKey]['FB_JSSDK'] = '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/' . $strLanguage . '/all.js#xfbml=1&status=0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';
	}


	/**
	 * Generate the like button and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateLikeButton($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		// Send button is only available for XFBML type
		if ($arrData['fb_send'])
		{
			$strType == 'XFBML';
		}

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-like" data-href="%s" data-send="%s" data-layout="%s" data-width="%s" data-show-faces="%s" data-action="%s" data-colorscheme="%s" data-font="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), ($arrData['fb_sendButton'] ? 'true' : 'false'), $arrData['fb_layout'], $arrData['fb_width'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_verb'], $arrData['fb_colorScheme'], $arrData['fb_font']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:like href="%s" send="%s" layout="%s" width="%s" show_faces="%s" action="%s" colorscheme="%s" font="%s"></fb:like>',
								  static::getFacebookUrl($arrData['fb_url']), ($arrData['fb_sendButton'] ? 'true' : 'false'), $arrData['fb_layout'], $arrData['fb_width'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_verb'], $arrData['fb_colorScheme'], $arrData['fb_font']);
		}

		return $strReturn;
	}


	/**
	 * Generate the send button and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateSendButton($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-send" data-href="%s" data-colorscheme="%s" data-font="%s"></div>', static::getFacebookUrl($arrData['fb_url']), $arrData['fb_colorScheme'], $arrData['fb_font']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:send href="%s" colorscheme="%s" font="%s"></fb:send>', static::getFacebookUrl($arrData['fb_url']), $arrData['fb_colorScheme'], $arrData['fb_font']);
		}

		return $strReturn;
	}


	/**
	 * Generate the subscribe button and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateSubscribeButton($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-subscribe" data-href="%s" data-layout="%s" data-width="%s" data-show-faces="%s" data-colorscheme="%s" data-font="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_layout'], $arrData['fb_width'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_font']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:subscribe href="%s" layout="%s" width="%s" show_faces="%s" colorscheme="%s" font="%s"></fb:subscribe>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_layout'], $arrData['fb_width'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_font']);
		}
		elseif ($strType == 'IFRAME')
		{
			$strReturn = sprintf('<iframe src="//www.facebook.com/plugins/subscribe.php?href=%s&amp;layout=%s&amp;show_faces=%s&amp;colorscheme=%s&amp;font=%s&amp;width=%s" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:%spx;" allowTransparency="true"></iframe>',
								  urlencode(static::getFacebookUrl($arrData['fb_url'])), $arrData['fb_layout'], ($arrData['fb_showFaces'] ? 'true' : 'false'),
								  $arrData['fb_colorScheme'], urlencode($arrData['fb_font']), $arrData['fb_width'], $arrData['fb_width']);
		}

		return $strReturn;
	}


	/**
	 * Generate the comments widget and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateComments($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-comments" data-href="%s" data-num-posts="%s" data-width="%s" data-colorscheme="%s"></div>', static::getFacebookUrl($arrData['fb_url']), $arrData['fb_numberOfPosts'], $arrData['fb_width'], $arrData['fb_colorScheme']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:comments href="%s" num_posts="%s" width="%s" colorscheme="%s"></fb:comments>', static::getFacebookUrl($arrData['fb_url']), $arrData['fb_numberOfPosts'], $arrData['fb_width'], $arrData['fb_colorScheme']);
		}

		return $strReturn;
	}


	/**
	 * Generate the activity feed widget and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateActivityFeed($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-activity" data-href="%s" data-app-id="%s" data-action="%s" data-width="%s" data-height="%s" data-header="%s" data-colorscheme="%s" data-linktarget="%s" data-border-color="%s" data-font="%s" data-recommendations="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_appId'], $arrData['fb_action'], $arrData['fb_width'], $arrData['fb_height'],
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_linkTarget'], $arrData['fb_borderColor'],
								  $arrData['fb_font'], ($arrData['fb_showRecommendations'] ? 'true' : 'false'));
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:activity href="%s" app_id="%s" action="%s" width="%s" height="%s" header="%s" colorscheme="%s" linktarget="%s" border_color="%s" font="%s" recommendations="%s"></fb:activity>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_appId'], $arrData['fb_action'], $arrData['fb_width'], $arrData['fb_height'],
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_linkTarget'], $arrData['fb_borderColor'],
								  $arrData['fb_font'], ($arrData['fb_showRecommendations'] ? 'true' : 'false'));
		}
		elseif ($strType == 'IFRAME')
		{
			$strReturn = sprintf('<iframe src="//www.facebook.com/plugins/activity.php?href=%s&amp;app_id=%s&amp;action=%s&amp;width=%s&amp;height=%s&amp;header=%s&amp;colorscheme=%s&amp;linktarget=%s&amp;border_color=%s&amp;font=%s&amp;recommendations=%s" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:%spx; height:%spx;" allowTransparency="true"></iframe>',
								  urlencode(static::getFacebookUrl($arrData['fb_url'])), $arrData['fb_appId'], urlencode($arrData['fb_action']), $arrData['fb_width'], $arrData['fb_height'],
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_linkTarget'], $arrData['fb_borderColor'],
								  urlencode($arrData['fb_font']), ($arrData['fb_showRecommendations'] ? 'true' : 'false'), $arrData['fb_width'], $arrData['fb_height']);
		}

		return $strReturn;
	}


	/**
	 * Generate the recommendations box and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateRecommendationsBox($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-recommendations" data-site="%s" data-app-id="%s" data-action="%s" data-width="%s" data-height="%s" data-header="%s" data-colorscheme="%s" data-linktarget="%s" data-border-color="%s" data-font="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_appId'], $arrData['fb_action'], $arrData['fb_width'], $arrData['fb_height'],
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_linkTarget'], $arrData['fb_borderColor'],
								  $arrData['fb_font']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:recommendations site="h%s" app_id="%s" action="%s" width="%s" height="%s" header="%s" colorscheme="%s" linktarget="%s" border_color="%s" font="%s"></fb:recommendations>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_appId'], $arrData['fb_action'], $arrData['fb_width'], $arrData['fb_height'],
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_colorScheme'], $arrData['fb_linkTarget'], $arrData['fb_borderColor'],
								  $arrData['fb_font']);
		}

		return $strReturn;
	}


	/**
	 * Generate the like box and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateLikeBox($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-like-box" data-href="%s" data-width="%s" data-height="%s" data-colorscheme="%s" data-show-faces="%s" data-border-color="%s" data-stream="%s" data-header="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_width'], $arrData['fb_height'], $arrData['fb_colorScheme'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_borderColor'], ($arrData['fb_showStream'] ? 'true' : 'false'),
								  ($arrData['fb_showHeader'] ? 'true' : 'false'));
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:like-box href="%s" width="%s" height="%s" colorscheme="%s" show_faces="%s" border_color="%s" stream="%s" header="%s"></fb:like-box>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_width'], $arrData['fb_height'], $arrData['fb_colorScheme'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_borderColor'], ($arrData['fb_showStream'] ? 'true' : 'false'),
								  ($arrData['fb_showHeader'] ? 'true' : 'false'));
		}
		elseif ($strType == 'IFRAME')
		{
			$strReturn = sprintf('<iframe src="//www.facebook.com/plugins/likebox.php?href=%s&amp;width=%s&amp;height=%s&amp;colorscheme=%s&amp;show_faces=%s&amp;border_color=%s&amp;stream=%s&amp;header=%s" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:%spx; height:%spx;" allowTransparency="true"></iframe>',
								  urlencode(static::getFacebookUrl($arrData['fb_url'])), $arrData['fb_width'], $arrData['fb_height'], $arrData['fb_colorScheme'],
								  ($arrData['fb_showFaces'] ? 'true' : 'false'), $arrData['fb_borderColor'], ($arrData['fb_showStream'] ? 'true' : 'false'),
								  ($arrData['fb_showHeader'] ? 'true' : 'false'), $arrData['fb_width'], $arrData['fb_height']);
		}

		return $strReturn;
	}


	/**
	 * Generate the facepile widget and return it as HTML string
	 * @param array
	 * @param string
	 * @return string
	 */
	public static function generateFacepile($arrData, $strType='HTML5')
	{
		static::includeJavascriptSDK($arrData['facebook_language']);
		$strReturn = '';

		if ($strType == 'HTML5')
		{
			$strReturn = sprintf('<div class="fb-facepile" data-href="%s" data-action="%s" data-size="%s" data-max-rows="%s" data-width="%s" data-colorscheme="%s"></div>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_action'], $arrData['fb_size'], $arrData['fb_rows'], $arrData['fb_width'], $arrData['fb_colorScheme']);
		}
		elseif ($strType == 'XFBML')
		{
			static::includeNamespace();

			$strReturn = sprintf('<fb:facepile href="%s" action="%s" size="%s" max_rows="%s" width="%s" colorscheme="%s"></fb:facepile>',
								  static::getFacebookUrl($arrData['fb_url']), $arrData['fb_action'], $arrData['fb_size'], $arrData['fb_rows'], $arrData['fb_width'], $arrData['fb_colorScheme']);
		}
		elseif ($strType == 'IFRAME')
		{
			$strReturn = sprintf('<iframe src="//www.facebook.com/plugins/facepile.php?href=%s&amp;action=%s&amp;size=%s&amp;max_rows=%s&amp;width=%s&amp;colorscheme=%s" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:%spx;" allowTransparency="true"></iframe>',
								  urlencode(static::getFacebookUrl($arrData['fb_url'])), urlencode($arrData['fb_action']), $arrData['fb_size'], $arrData['fb_rows'], $arrData['fb_width'],
								  $arrData['fb_colorScheme'], $arrData['fb_width']);
		}

		return $strReturn;
	}


	/**
	 * Return the provided URL or current page, if it is empty
	 * @param string
	 * @return string
	 */
	public static function getFacebookUrl($strUrl='')
	{
		if (!strlen($strUrl))
		{
			$strUrl = \Environment::get('base') . \Environment::get('request');
		}

		return ampersand($strUrl);
	}
}
