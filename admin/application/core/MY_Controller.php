<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->has_userdata('user_id')) {
			redirect('login');
		}
		if (uri_string() == 'manage') {
			$this->load->model('Menu_model');
			$menu = $this->Menu_model->get_menu($this->session->userdata('role_type'), true);
			if (is_array($menu) && array_key_exists('menu_id', $menu) && !is_empty_string($menu['menu_id'])) {
				redirect($menu['menu_id']);
			} else {
				redirect('login');
			}
		}
	}

	public function view_show($view, $vars = array())
	{
		$vars['user_name'] = $this->session->userdata('user_name');

		if (array_key_exists('page_title', $vars)) {
			$vars['page_title'] = 'Alpha Book 管理システム - ' . $vars['page_title'];
		} else {
			$vars['page_title'] = 'Alpha Book 管理システム';
		}

		$role_type = $this->session->userdata('role_type');
		$menu_id = uri_string();

		$this->load->model('Menu_model');
		$vars['menu'] = $this->Menu_model->get_menu($role_type);
		$vars['can_edit'] = ($this->Menu_model->get_role($role_type, $menu_id) === '1');

		$this->load->view('/manage/header', $vars);
		$this->load->view($view, $vars);
		$this->load->view('/manage/footer', $vars);
	}

	public function required_list($str)
	{
		if (!$this->form_validation->required($str)) {
			$this->form_validation->set_message('required_list', '{field}を選択してください');
			return FALSE;
		}
		return TRUE;
	}

	public function valid_email_simple($email_address)
	{
		if (preg_match('/^([a-z0-9\+_\-\.]+)@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $email_address)) {
			return TRUE;
		}
		$this->form_validation->set_message('valid_email_simple', '{field}欄はメールアドレスとして正しい形式でなければいけません');
		return FALSE;
	}

	public function valid_user_account($account_id, $user_name_field = null)
	{
		$user_name = '';
		if (!is_empty_string($user_name_field)) {
			$user_name = $this->input->post($user_name_field);
		}
		if (is_empty_string($account_id) && is_empty_string($user_name)) {
			$this->form_validation->set_message('valid_user_account', 'アカウントIDまたはユーザー名を入力してください。');
			return FALSE;
		}

		$this->load->model('User_model');
		$user_data = $this->User_model->get_user_account($account_id, $user_name);
		if ($user_data === false) {
			$this->form_validation->set_message('valid_user_account', '該当するユーザーが見つかりませんでした。');
			return FALSE;
		}

		return TRUE;
	}

	public function valid_game($game_id, $game_name_field = null)
	{
		$game_name = '';
		if (!is_empty_string($game_name_field)) {
			$game_name = $this->input->post($game_name_field);
		}
		if (is_empty_string($game_id) && is_empty_string($game_name)) {
			$this->form_validation->set_message('valid_game', 'ゲームIDまたはゲーム名を入力してください。');
			return FALSE;
		}

		$this->load->model('Game_model');
		$game_data = false;
		if (!is_empty_string($game_id)) {
			$game_data = $this->Game_model->get_game(array(array('where' => 'id', 'value' => $game_id)));
		}
		if ($game_data === false && !is_empty_string($game_name)) {
			$game_data = $this->Game_model->get_game(array(array('where' => 'game_title like', 'value' => '%' . $game_name . '%')));
		}
		if ($game_data === false) {
			$this->form_validation->set_message('valid_game', '該当するゲーム情報が見つかりませんでした。');
			return FALSE;
		}

		return TRUE;
	}
}
