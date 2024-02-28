<?php
/**
*
* All in One Accessibility by skynettechnologies Script extension for the phpBB Forum Software package.
* @copyright (c) 2024 (Skynet Technologies USA LLC) 
* @license GNU General Public License, version 2 (GPL-2.0-only)
*
*/

/**
* DO NOT CHANGE
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	// language pack author
	'CM_LANG_DESC'									=> 'Deutsch (Sie)',
	'CM_LANG_EXT_VER' 								=> '1.0.0',
	'CM_CONFIG_DESC' 								=> 'Hier können die Einstellungen für die Erweiterung „%1$s“ (v%2$s) geändert werden.',
	'CM_MSG_LANGUAGEPACK_OUTDATED'					=> 'Hinweis: Das Sprachpaket dieser Erweiterung ist nicht mehr aktuell.',
	//ACP Translation
	'ACP_ALLINONEACCESSIBILITY_TITLE'				=> 'All in One Accessibility',
	'ACP_ALLINONEACCESSIBILITY_GENERAL'				=> 'Allgemeine Einstellungen',
]);
