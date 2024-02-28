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
	'CM_LANG_DESC'									=> 'English',
	'CM_LANG_EXT_VER' 								=> '1.0.0',
	'CM_CONFIG_DESC' 								=> 'The settings for the "%1$s" (v%2$s) can be changed here.',
	'CM_MSG_LANGUAGEPACK_OUTDATED'					=> 'Note: The language pack for this extension is no longer up-to-date.',
	///ACP Translation
	'ACP_ALLINONEACCESSIBILITY_TITLE'				=> 'All in One Accessibility',
	'ACP_ALLINONEACCESSIBILITY_GENERAL'				=> 'All in One Accessibility Settings',
]);
