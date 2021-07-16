<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_regist extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
	}

	public function index()
	{
		// 本人確認
		$approved_flag_list = $this->User_model->get_list('search_approved_flag');
		// ユーザーステータス
		$delete_flag_list = $this->User_model->get_list('search_user_delete_flag');

		$view_data = array(
			'approved_flag_list' => $approved_flag_list,
			'delete_flag_list' => $delete_flag_list,
		);

		if ($this->input->method() == 'post') {
			// POST
			$this->index_post($view_data);
		} else {
			// GET
			$user_id = $this->input->get('id');
			$this->index_get($view_data, $user_id);
		}
	}

	private function index_get($view_data, $user_id)
	{
		$page_caption = 'アカウント追加';
		$input_data = array();
		if (is_empty_string($user_id)) {
			$input_data = $this->User_model->new_record();
		} else {
			$page_caption = 'アカウント編集';
			$input_data = $this->User_model->get_user(array(array('where' => 'id', 'value' => $user_id)));
			if ($input_data === false) {
				log_message('error', 'user_regist:user not found [' . $user_id . ']');
				$input_data = $this->User_model->new_record();
			}
		}
		$input_data = $this->User_model->add_computing_data($input_data);

		$view_data += array(
			'page_caption' => $page_caption,
			'input_data' => $input_data,
		);
		$this->view_show('manage/user/user_regist', $view_data);
	}

	private function index_post($view_data)
	{
		// 入力値チェックルールの設定
		$this->form_validation->set_rules($this->User_model->get_validation_config());

		// 入力値チェック
		if ($this->form_validation->run() == FALSE) {
			$view_data += array(
				'input_data' => $this->input->post(),
			);
			$this->view_show('manage/user/user_regist', $view_data);

		} else {

			// 入力値
			$input_data = $this->input->post();

			// 表示用データ変換
			$display_data = $this->User_model->convert_display_data($input_data);

			$view_data += array(
				'display_data' => $display_data,
				'input_data' => $input_data,
			);
			$this->view_show('manage/user/user_regist_confirm', $view_data);

		}

	}

	public function complate() {

		if ($this->input->method() == 'post') {
			// POST
			$mode = $this->input->post('mode');
			if ($mode == '1') {
				// 登録
				$user_id = $this->input->post('id');
				if (is_empty_string($user_id)) {
					$this->User_model->insert_user($this->input->post());
				} else {
					$this->User_model->update_user($this->input->post());
				}
				$this->view_show('manage/user/user_regist_complate');

			}
		}

	}
}
