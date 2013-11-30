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
$GLOBALS['TL_LANG']['tl_content']['facebook_template']      = array('Facebook Template', 'Hier wird das Facebook Template ausgewählt.');
$GLOBALS['TL_LANG']['tl_content']['facebook_type']          = array('Template Typ', 'Hier wird der Facebook Template Typ ausgewählt.');
$GLOBALS['TL_LANG']['tl_content']['facebook_language']      = array('Sprache', 'Hier wird die Sprache des Facebook Plugins gewählt.');
$GLOBALS['TL_LANG']['tl_content']['fb_url']                 = array('URL Adresse', 'Hier wird die verwendete URL Adresse eingegeben. Leer lassen, um die jetzige URL zu verwenden, wenn das möglich ist.');
$GLOBALS['TL_LANG']['tl_content']['fb_sendButton']          = array('Absende-Button (XFBML only)', 'Absende-Button verwenden. Der Absende-Button kann nur bei Sites verwendet werden, die JavaScript SDK benutzen.');
$GLOBALS['TL_LANG']['tl_content']['fb_layout']              = array('Layout Stil', 'Bestimmt Größe und Menge des Inhaltes neben dem Button.');
$GLOBALS['TL_LANG']['tl_content']['fb_width']               = array('Breite in Pixeln', 'Hier kann die Breite des Plugins in Pixeln angegeben werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_height']              = array('Höhe in Pixeln', 'Hier kann die Höhe des Plugins in Pixeln angegeben werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_showFaces']           = array('Gesichter zeigen', 'Profilbilder anzeigen.');
$GLOBALS['TL_LANG']['tl_content']['fb_verb']                = array('Button-Text', 'Text für den Button auswählen.');
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']         = array('Farbschema', 'Hier kann das Farbschema für das Plugin festgelegt werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_font']                = array('Schriftart', 'Hier kann die Schriftart für das Plugin festgelegt werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_numberOfPosts']       = array('Anzahl Posts', 'Hier kann die Anzahl der Posts, die angezeigt werden sollen, festgelegt werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_domain']              = array('Domain', 'Die Domain, deren Aktivitäten gezeigt werden soll  (z.B. http://www.example.com).');
$GLOBALS['TL_LANG']['tl_content']['fb_appId']               = array('App ID', 'Hier die entsprechende App ID eingeben.');
$GLOBALS['TL_LANG']['tl_content']['fb_action']              = array('Action', 'Hier kann eine Komma getrennte Liste mit Actions angegeben werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_showHeader']          = array('Header zeigen', 'Plugin mit Facebook-Header zeigen.');
$GLOBALS['TL_LANG']['tl_content']['fb_linkTarget']          = array('Link Ziel', 'Hier kann gewählt werden, ob die Inhalt-Links im selben oder in einem neuen Fenster geöffnet werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_showRecommendations'] = array('Empfehlungen zeigen', 'Empfehlungen zeigen.');
$GLOBALS['TL_LANG']['tl_content']['fb_showStream']          = array('Stream zeigen', 'Zeigt den Profil Stream des öffentlichen Profils.');
$GLOBALS['TL_LANG']['tl_content']['fb_borderColor']         = array('Farbe Rahmen', 'Hier kann die Farbe des Rahmens des Plugins festgelegt werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_rows']                = array('Anzahl Zeilen', 'Hier kann die maximale Anzahl von Zeilen mit Profil-Bildern angegeben werden.');
$GLOBALS['TL_LANG']['tl_content']['fb_size']                = array('Größe', 'Legt die Größe der Bilder und des Social Contexts im Facepile fest.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['facebook_legend'] = 'Facebook Einstellungen';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_content']['fb_verb']['like']         = 'Gefällt mir';
$GLOBALS['TL_LANG']['tl_content']['fb_verb']['recommend']    = 'Empfehlen';
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']['light'] = 'Hell';
$GLOBALS['TL_LANG']['tl_content']['fb_colorScheme']['dark']  = 'Dunkel';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['small']        = 'Klein';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['medium']       = 'Mittel';
$GLOBALS['TL_LANG']['tl_content']['fb_size']['large']        = 'Groß';
