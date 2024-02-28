<?php
/**
 *
 * All in One Accessibility. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Skynet Technologies USA LLC
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace skynettechnologies\phpbb_allinoneaccessibility\migrations;

class acp_module extends \phpbb\db\migration\migration
{
	
	public function update_data()
	{
		return [
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_ALLINONEACCESSIBILITY_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_ALLINONEACCESSIBILITY_TITLE', [
					'module_basename'	=> '\skynettechnologies\phpbb_allinoneaccessibility\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
