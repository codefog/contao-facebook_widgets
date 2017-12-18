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
 * Extension version
 */
@define('FACEBOOK_WIDGETS_VERSION', '1.0');
@define('FACEBOOK_WIDGETS_BUILD', '5');


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 4, array
(
	'facebook' => array
	(
		'fb_likeButton'         => 'Codefog\FacebookWidgets\FacebookLikeButton',
		'fb_sendButton'         => 'Codefog\FacebookWidgets\FacebookSendButton',
		'fb_subscribeButton'    => 'Codefog\FacebookWidgets\FacebookSubscribeButton',
		'fb_comments'           => 'Codefog\FacebookWidgets\FacebookComments',
		'fb_activityFeed'       => 'Codefog\FacebookWidgets\FacebookActivityFeed',
		'fb_recommendationsBox' => 'Codefog\FacebookWidgets\FacebookRecommendationsBox',
		'fb_likeBox'            => 'Codefog\FacebookWidgets\FacebookLikeBox',
		'fb_facepile'           => 'Codefog\FacebookWidgets\FacebookFacepile'
	)
));


/**
 * Content elements
 */
array_insert($GLOBALS['TL_CTE'], 4, array
(
	'facebook' => array
	(
		'fb_likeButton'         => 'Codefog\FacebookWidgets\FacebookLikeButton',
		'fb_sendButton'         => 'Codefog\FacebookWidgets\FacebookSendButton',
		'fb_subscribeButton'    => 'Codefog\FacebookWidgets\FacebookSubscribeButton',
		'fb_comments'           => 'Codefog\FacebookWidgets\FacebookComments',
		'fb_activityFeed'       => 'Codefog\FacebookWidgets\FacebookActivityFeed',
		'fb_recommendationsBox' => 'Codefog\FacebookWidgets\FacebookRecommendationsBox',
		'fb_likeBox'            => 'Codefog\FacebookWidgets\FacebookLikeBox',
		'fb_facepile'           => 'Codefog\FacebookWidgets\FacebookFacepile'
	)
));
