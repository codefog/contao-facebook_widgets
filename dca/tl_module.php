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
 * Load tl_content language file
 */
System::loadLanguageFile('tl_content');


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_likeButton']         = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_sendButton,fb_layout,fb_width,fb_showFaces,fb_verb,fb_colorScheme,fb_font;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_sendButton']         = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_colorScheme,fb_font;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_subscribeButton']    = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_layout,fb_showFaces,fb_colorScheme,fb_font,fb_width;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_comments']           = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_numberOfPosts,fb_width,fb_colorScheme;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_activityFeed']       = '{title_legend},name,headline,type;{facebook_legend},fb_domain,fb_appId,fb_action,fb_width,fb_height,fb_showHeader,fb_colorScheme,fb_linkTarget,fb_borderColor,fb_font,fb_showRecommendations;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_recommendationsBox'] = '{title_legend},name,headline,type;{facebook_legend},fb_domain,fb_appId,fb_action,fb_width,fb_height,fb_showHeader,fb_colorScheme,fb_linkTarget,fb_borderColor,fb_font;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_likeBox']            = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_width,fb_height,fb_colorScheme,fb_showFaces,fb_borderColor,fb_showStream,fb_showHeader;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['fb_facepile']           = '{title_legend},name,headline,type;{facebook_legend},fb_url,fb_action,fb_size,fb_rows,fb_width,fb_colorScheme;{template_legend:hide},facebook_template,facebook_type,facebook_language;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['facebook_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['facebook_template'],
	'default'                 => 'facebook_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_facebook', 'getFacebookTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['facebook_type'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['facebook_type'],
	'default'                 => 'HTML5',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('HTML5', 'XFBML', 'IFRAME'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['facebook_language'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['facebook_language'],
	'default'                 => 'en_US',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => &$GLOBALS['TL_LANG']['FBL'],
	'eval'                    => array('chosen'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_url'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'url', 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_sendButton'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_sendButton'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_layout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_layout'],
	'default'                 => 'standard',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('standard', 'button_count', 'box_count'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_width'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_width'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_height'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_height'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_showFaces'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_showFaces'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_verb'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_verb'],
	'default'                 => 'like',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('like', 'recommend'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['fb_verb'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_colorScheme'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme'],
	'default'                 => 'light',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('light', 'dark'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_font'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_font'],
	'default'                 => 'lucida grande',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('arial', 'lucida grande', 'segoe ui', 'tahoma', 'trebuchet ms', 'verdana'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_numberOfPosts'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_numberOfPosts'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_domain'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_domain'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'url', 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_appId'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_appId'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'maxlength'=>16, 'tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_action'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_action'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_showHeader'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_showHeader'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_linkTarget'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_linkTarget'],
	'default'                 => '_blank',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('_blank', '_top', '_parent'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_showRecommendations'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_showRecommendations'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_showStream'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_showStream'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_borderColor'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_borderColor'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_rows'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_rows'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fb_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fb_size'],
	'default'                 => 'medium',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('small', 'medium', 'large'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['fb_size'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);


/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_facebook extends Backend
{

	/**
	 * Return all Facebook templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getFacebookTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('facebook_', $intPid);
	}
}
