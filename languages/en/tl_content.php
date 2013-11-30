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


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['facebook_template']      = array('Facebook template', 'Here you can choose the Facebook template.');
$GLOBALS['TL_LANG']['tl_content']['facebook_type']          = array('Template type', 'Here you can choose the Facebook template type.');
$GLOBALS['TL_LANG']['tl_content']['facebook_language']      = array('Language', 'Here you can choose the Facebook plugin language.');
$GLOBALS['TL_LANG']['tl_content']['fb_url']                 = array('URL address', 'Here you can enter the URL address that will be used. Leave empty to use the current URL, if possible.');
$GLOBALS['TL_LANG']['tl_content']['fb_sendButton']          = array('Send button (XFBML only)', 'Include a Send button. The Send button is available only on sites that use the JavaScript SDK.');
$GLOBALS['TL_LANG']['tl_content']['fb_layout']              = array('Layout style', 'Determines the size and amount of social context next to the button.');
$GLOBALS['TL_LANG']['tl_content']['fb_width']               = array('Width in pixels', 'Here you can enter the width of the plugin in pixels.');
$GLOBALS['TL_LANG']['tl_content']['fb_height']              = array('Height in pixels', 'Here you can enter the height of the plugin in pixels.');
$GLOBALS['TL_LANG']['tl_content']['fb_showFaces']           = array('Show faces', 'Show profile pictures.');
$GLOBALS['TL_LANG']['tl_content']['fb_verb']                = array('Verb to display', 'Here you can choose the verb that will be displayed in the button.');
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']         = array('Color scheme', 'Here you can choose the color scheme of the plugin.');
$GLOBALS['TL_LANG']['tl_content']['fb_font']                = array('Font', 'Here you can choose the font of the plugin.');
$GLOBALS['TL_LANG']['tl_content']['fb_numberOfPosts']       = array('Number of posts', 'Here you can enter the number of posts to display by default.');
$GLOBALS['TL_LANG']['tl_content']['fb_domain']              = array('Domain', 'The domain to show activity for (e.g. http://www.example.com).');
$GLOBALS['TL_LANG']['tl_content']['fb_appId']               = array('App ID', 'Here you can enter the associated App ID.');
$GLOBALS['TL_LANG']['tl_content']['fb_action']              = array('Action', 'Here you can enter a comma separated list of actions.');
$GLOBALS['TL_LANG']['tl_content']['fb_showHeader']          = array('Show header', 'Show the Facebook header on the plugin.');
$GLOBALS['TL_LANG']['tl_content']['fb_linkTarget']          = array('Link target', 'Here you can select the context in which content links are opened.');
$GLOBALS['TL_LANG']['tl_content']['fb_showRecommendations'] = array('Show recommendations', 'Show recommendations.');
$GLOBALS['TL_LANG']['tl_content']['fb_showStream']          = array('Show stream', 'Show the profile stream for the public profile.');
$GLOBALS['TL_LANG']['tl_content']['fb_borderColor']         = array('Border color', 'Here you can enter the border color of the plugin.');
$GLOBALS['TL_LANG']['tl_content']['fb_rows']                = array('Number of rows', 'Here you can enter the maximum number of rows of profile pictures to show.');
$GLOBALS['TL_LANG']['tl_content']['fb_size']                = array('Size', 'Determines the size of the images and social context in the facepile.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['facebook_legend'] = 'Facebook settings';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_content']['fb_verb']['like']         = 'Like';
$GLOBALS['TL_LANG']['tl_content']['fb_verb']['recommend']    = 'Recommend';
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']['light'] = 'Light';
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']['dark']  = 'Dark';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['small']        = 'Small';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['medium']       = 'Medium';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['large']        = 'Large';
