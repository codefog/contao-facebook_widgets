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
 * Facebook hybrid "facepile".
 */
class FacebookFacepile extends \FacebookHybrid
{

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### FACEBOOK FACEPILE WIDGET ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$this->Template->widget = \Facebook::generateFacepile($this->arrData, $this->facebook_type);
	}
}
