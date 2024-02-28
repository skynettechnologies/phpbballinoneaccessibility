<?php
/**
 *
 * All in One Accessibility. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Skynet Technologies USA LLC
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace skynettechnologies\phpbb_allinoneaccessibility\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
	protected $extension_manager;
	protected $db;
	protected $config;
	protected $template;
	protected $user;
	protected $root_path;
	protected $php_ext;

	public function __construct(
		\phpbb\extension\manager $ext_manager,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\language\language $language,
		$root_path,
		$php_ext
	)
	{
		$this->db			= $db;
		$this->ext_manager	= $ext_manager;
		$this->config		= $config;
		$this->template		= $template;
		$this->language		= $language;
		$this->root_path	= $root_path;
		$this->php_ext		= $php_ext;
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.page_header_after'		=> 'show_aioa_widget',
		];
	}

	public function show_aioa_widget()
	{
		
		//$this->ext_manager->is_enabled('crizzo/aboutus')
		$this->template->assign_vars([
			'AIOA_SCRIPT_TOKEN'						=> $this->config['aioa_script_token'],
		]);
	}

	
}
