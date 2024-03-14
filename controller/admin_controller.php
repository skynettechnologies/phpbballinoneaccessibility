<?php
/**
 *
 * All in One Accessibility. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024, Skynet Technologies USA LLC
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace skynettechnologies\phpbballinoneaccessibility\controller;

class admin_controller
{
	protected $extension_manager;
	protected $db;
	protected $path_helper;
	protected $config;
	protected $config_text;
	protected $language;
	protected $log;
	protected $request;
	protected $template;
	protected $user;
	protected $root_path;
	protected $php_ext;
	protected $u_action;

	public function __construct(
		\phpbb\extension\manager $ext_manager,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\path_helper $path_helper,
		\phpbb\config\config $config,
		\phpbb\config\db_text $config_text,
		\phpbb\language\language $language,
		\phpbb\log\log $log,
		\phpbb\request\request $request,
		\phpbb\template\template $template,
		\phpbb\user $user,
		$root_path,
		$php_ext,
	)
	{
		$this->db					= $db;
		$this->ext_manager			= $ext_manager;
		$this->md_manager 			= $ext_manager->create_extension_metadata_manager('skynettechnologies/phpbballinoneaccessibility');
		$this->admin_path 			= $path_helper->get_phpbb_root_path() . $path_helper->get_adm_relative_path();
		$this->config				= $config;
		$this->config_text			= $config_text;
		$this->language				= $language;
		$this->log					= $log;
		$this->request				= $request;
		$this->template				= $template;
		$this->user					= $user;
		$this->php_ext				= $php_ext;
		$this->root_path			= $root_path;
	}

	public function display_general()
	{
		$ext_display_ver 			= $this->md_manager->get_metadata('version');
		$ext_lang_min_ver 			= $this->md_manager->get_metadata()['extra']['lang-min-ver'];
		$ext_display_name 			= $this->md_manager->get_metadata('display-name');
		$ext_display_ver 			= $this->md_manager->get_metadata('version');
		$lang_ver 					= ($this->language->lang('CM_LANG_EXT_VER') !== 'CM_LANG_EXT_VER') ? $this->language->lang('CM_LANG_EXT_VER') : '0.0.0';
		$bannerinfo					= append_sid("{$this->admin_path}index.$this->php_ext", '&i=acp_board&mode=cookie');
		$notes 						= '';
		
		$errors = [];

		$s_errors = !empty($errors);

		if (!phpbb_version_compare($lang_ver, $ext_lang_min_ver, '>='))
		{
			$this->add_note($notes, $this->language->lang('CM_MSG_LANGUAGEPACK_OUTDATED'));
		}
		
		$aioa_current_url_parse = parse_url(generate_board_url());
        $aioa_website_hostname = $aioa_current_url_parse['host'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://ada.skynettechnologies.us/check-website',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('domain' =>  $aioa_website_hostname),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$settingURLObject = json_decode($response);
		//print_r($settingURLObject);die;
		$this->config->set('aioa_script_token',$settingURLObject->api_key);

		$this->template->assign_vars([
			'S_ERROR'						=> $s_errors,
			'ERROR_MSG'						=> $s_errors ? implode('<br>', $errors) : '',
			'CM_NOTES'						=> $notes,
			'CM_EXT_NAME'					=> $ext_display_name,
			'CM_EXT_VER'					=> $ext_display_ver,
			'TEST1'							=> $this->config_text->get('test'),
			'AIOA_STATUS'					=> $settingURLObject->status,
			'AIOA_WEBSITE_HOSTNAME'			=> $aioa_website_hostname,
			'AIOA_IFRAME'					=> $settingURLObject->settinglink,
			'MANAGE_DOMAIN'					=> $settingURLObject->manage_domain

		]);
	}

	private function add_note(string &$notes, $msg)
	{
		$notes .= (($notes != '') ? "\n" : "") . sprintf('<p>%s</p>', $msg);
	}

	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	
}
