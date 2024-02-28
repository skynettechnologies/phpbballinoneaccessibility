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

class main_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;
		$admin_controller = $phpbb_container->get('skynettechnologies.phpbb_allinoneaccessibility.admin.controller');
		$language = $phpbb_container->get('language');
		$admin_controller->set_page_url($this->u_action);
		
		switch ($mode)
		{
			case 'settings':
				$this->page_title = $language->lang('ACP_ALLINONEACCESSIBILITY_GENERAL');
				$this->tpl_name = 'acp_allinoneaccessibility_general';
				$admin_controller->display_general();
			break;

		}
	}
}
