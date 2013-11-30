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
 * Register a custom namespace
 */
ClassLoader::addNamespace('Facebook');


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Facebook\Facebook'                   => 'system/modules/facebook_widgets/classes/Facebook.php',
	'Facebook\FacebookHybrid'             => 'system/modules/facebook_widgets/classes/FacebookHybrid.php',

	// Modules
	'Facebook\FacebookActivityFeed'       => 'system/modules/facebook_widgets/hybrids/FacebookActivityFeed.php',
	'Facebook\FacebookComments'           => 'system/modules/facebook_widgets/hybrids/FacebookComments.php',
	'Facebook\FacebookFacepile'           => 'system/modules/facebook_widgets/hybrids/FacebookFacepile.php',
	'Facebook\FacebookLikeBox'            => 'system/modules/facebook_widgets/hybrids/FacebookLikeBox.php',
	'Facebook\FacebookLikeButton'         => 'system/modules/facebook_widgets/hybrids/FacebookLikeButton.php',
	'Facebook\FacebookRecommendationsBox' => 'system/modules/facebook_widgets/hybrids/FacebookRecommendationsBox.php',
	'Facebook\FacebookSendButton'         => 'system/modules/facebook_widgets/hybrids/FacebookSendButton.php',
	'Facebook\FacebookSubscribeButton'    => 'system/modules/facebook_widgets/hybrids/FacebookSubscribeButton.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'facebook_default' => 'system/modules/facebook_widgets/templates'
));
