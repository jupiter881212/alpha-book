<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portion_regist extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Portion_model');
	}

	public function index()
	{

		$view_data = array(
		);

		if ($this->input->method() == 'post') {
			// POST
			$this->index_post($view_data);
		} else {
			// GET
			$this->index_get($view_data);
		}
	}

	private function index_get($view_data)
	{
		$page_caption = '取り分追加';
		$input_data = $this->Portion_model->new_record();

		$view_data += array(
			'page_caption' => $page_caption,
			'input_data' => $input_data,
		);
		$this->view_show('manage/portion/portion_regist', $view_data);
	}

	private function index_post($view_data)
	{
		// 入力値チェックルールの設定
		$this->form_validation->set_rules($this->Portion_model->get_validation_config());

		// 入力値チェック
		if ($this->form_validation->run() == FALSE) {
			$view_data += array(
				'input_data' => $this->input->post(),
			);
			$this->view_show('manage/portion/portion_regist', $view_data);

		} else {

			// 入力値
			$input_data = $this->input->post();

			$input_data['back_flag'] = '1';

			// 表示用データ変換
			$display_data = $this->Portion_model->convert_display_data($input_data);

			$view_data += array(
				'display_data' => $display_data,
				'input_data' => $input_data,
			);
			$this->view_show('manage/portion/portion_regist_confirm', $view_data);

		}

	}

	public function complate() {

		if ($this->input->method() == 'post') {
			// POST
			// フラグを更新
			$this->Portion_model->update_portion_back_flag();
			// 新規登録
			$this->Portion_model->insert_portion($this->input->post());
			$this->view_show('manage/portion/portion_regist_complate');
		} else {
			redirect('manage/portion_list');
		}

	}
}
