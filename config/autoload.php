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
ClassLoader::addNamespace('Codefog\FacebookWidgets');


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Codefog\FacebookWidgets\Facebook'                   => 'system/modules/facebook_widgets/classes/Facebook.php',
	'Codefog\FacebookWidgets\FacebookHybrid'             => 'system/modules/facebook_widgets/classes/FacebookHybrid.php',

	// Modules
	'Codefog\FacebookWidgets\FacebookActivityFeed'       => 'system/modules/facebook_widgets/hybrids/FacebookActivityFeed.php',
	'Codefog\FacebookWidgets\FacebookComments'           => 'system/modules/facebook_widgets/hybrids/FacebookComments.php',
	'Codefog\FacebookWidgets\FacebookFacepile'           => 'system/modules/facebook_widgets/hybrids/FacebookFacepile.php',
	'Codefog\FacebookWidgets\FacebookLikeBox'            => 'system/modules/facebook_widgets/hybrids/FacebookLikeBox.php',
	'Codefog\FacebookWidgets\FacebookLikeButton'         => 'system/modules/facebook_widgets/hybrids/FacebookLikeButton.php',
	'Codefog\FacebookWidgets\FacebookRecommendationsBox' => 'system/modules/facebook_widgets/hybrids/FacebookRecommendationsBox.php',
	'Codefog\FacebookWidgets\FacebookSendButton'         => 'system/modules/facebook_widgets/hybrids/FacebookSendButton.php',
	'Codefog\FacebookWidgets\FacebookSubscribeButton'    => 'system/modules/facebook_widgets/hybrids/FacebookSubscribeButton.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'facebook_default' => 'system/modules/facebook_widgets/templates'
));
