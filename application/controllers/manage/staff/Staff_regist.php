<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_regist extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Staff_model');
	}

	public function index()
	{
		// 権限
		$role_type_list = $this->Staff_model->get_list('role_type');
		if ($this->session->userdata('role_type') != '1') {
			array_pop($role_type_list);
		}

		$view_data = array(
			'role_type_list' => $role_type_list,
		);

		if ($this->input->method() == 'post') {
			// POST
			$this->index_post($view_data);
		} else {
			// GET
			$staff_id = $this->input->get('id');
			$this->index_get($view_data, $staff_id);
		}
	}

	private function index_get($view_data, $staff_id)
	{
		$page_caption = 'スタッフ追加';
		$input_data = array();
		if (is_empty_string($staff_id)) {
			$input_data = $this->Staff_model->new_record();
		} else {
			$page_caption = 'スタッフ編集';
			$input_data = $this->Staff_model->get_staff(array(array('where' => 'id', 'value' => $staff_id)));
			if ($input_data === false) {
				log_message('error', 'staff_regist:staff not found [' . $staff_id . ']');
				$input_data = $this->Staff_model->new_record();
			}
		}
		$input_data = $this->Staff_model->add_computing_data($input_data);

		$view_data += array(
			'page_caption' => $page_caption,
			'input_data' => $input_data,
		);
		$this->view_show('manage/staff/staff_regist', $view_data);
	}

	private function index_post($view_data)
	{
		// 入力値チェックルールの設定
		$this->form_validation->set_rules($this->Staff_model->get_validation_config());

		// 入力値チェック
		if ($this->form_validation->run() == FALSE) {
			$view_data += array(
				'input_data' => $this->input->post(),
			);
			$this->view_show('manage/staff/staff_regist', $view_data);

		} else {

			// 入力値
			$input_data = $this->input->post();

			$input_data['password'] = str_rot13($input_data['password']);

			// 表示用データ変換
			$display_data = $this->Staff_model->convert_display_data($input_data);

			$view_data += array(
				'display_data' => $display_data,
				'input_data' => $input_data,
			);
			$this->view_show('manage/staff/staff_regist_confirm', $view_data);

		}

	}

	public function complate() {

		if ($this->input->method() == 'post') {
			// POST
			$mode = $this->input->post('mode');
			if ($mode == '1') {
				// 登録
				$staff_id = $this->input->post('id');
				if (is_empty_string($staff_id)) {
					$this->Staff_model->insert_staff($this->input->post());
				} else {
					$this->Staff_model->update_staff($this->input->post());
				}
				$this->view_show('manage/staff/staff_regist_complate');

			}
		}

	}
}
