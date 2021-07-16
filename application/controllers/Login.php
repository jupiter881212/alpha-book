<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
	}

	public function index()
	{
		if ($this->input->method() == 'post') {
			// POST
			$input_data = $this->input->post();

			if (!array_key_exists('remember_me', $input_data)) {
				$input_data['remember_me'] = '0';
			}
			$view_data = array(
				'input_data' => $input_data,
			);

			// 入力値チェック
			$this->form_validation->set_rules($this->Login_model->get_validation_config());
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login', $view_data);
			}

			// DB検索
			$user = $this->Login_model->get_user(
					array(
						'name' => $input_data['user_id'],
						'password' => $input_data['password'],
					)
				);

			if ($user === false) {
				log_message('error', 'login:user not found');
				$view_data['error_message'] = 'ログインID、またはパスワードが違います。';
				$this->load->view('login', $view_data);
			} else {
				$remenber_me_hash = null;
				if ($input_data['remember_me'] == '1') {
					$remenber_me_hash = hash('sha256', $user['name']);
					$this->input->set_cookie(array(
						'name' => 'ad_user',
						'value' => $remenber_me_hash,
						'expire' => 365 * 24 * 60 * 60,
						'domain' => '',
						'secure' => TRUE,
					));
				}

				$this->Login_model->update_login($user['id'], $this->session->session_id, $remenber_me_hash);

				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('user_name', $user['name']);
				$this->session->set_userdata('role_type', $user['role_type']);
				$this->login();
			}

		} else {
			// GET
			$user = false;
			// クッキー情報を取得
			$remenber_me_hash = $this->input->cookie('ab_user');
			if (!is_empty_string($remenber_me_hash)) {
				$user = $this->Login_model->get_user(array('hash' => $remenber_me_hash));
			}
			if ($user !== false) {
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('user_name', $user['name']);
				$this->session->set_userdata('role_type', $user['role_type']);
			} elseif (!is_empty_string($this->session->session_id)) {
				// セッション情報を取得
				$user = $this->Login_model->get_user(array('sid' => $this->session->session_id));
			}

			print_r($user);
			if ($user !== false) {
				$this->login();
			} else {
				$this->session->sess_destroy();
				$view_data = array(
					'input_data' => array_fill_keys(array('user_id', 'password', 'remember_me'), null),
				);
				$this->load->view('login', $view_data);
			}
		}
	}

	private function login()
	{
		redirect('/home');
	}

	public function logout()
	{
		$user_id = $this->session->userdata('user_id');
		$this->Login_model->update_login($user_id, '', '');
		$this->session->sess_destroy();
		redirect('/login');
	}

}
