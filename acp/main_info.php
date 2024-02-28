<?php
/**
 *
 * All in One Accessibility. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Skynet Technologies USA LLC
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace skynettechnologies\phpbb_allinoneaccessibility\acp;

class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\skynettechnologies\phpbb_allinoneaccessibility\acp\main_module',
			'title'		=> 'ACP_ALLINONEACCESSIBILITY_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_ALLINONEACCESSIBILITY_GENERAL',
					'auth'	=> 'ext_skynettechnologies/phpbb_allinoneaccessibility && acl_a_board',
					'cat'	=> ['ACP_ALLINONEACCESSIBILITY_TITLE'],
				],
			],
		];
	}
}
