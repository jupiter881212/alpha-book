<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Money_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Money_model');
	}

	public function index()
	{
		// 入出金
		$money_action_list = $this->Money_model->get_list('money_action');

		$view_data = array(
			'money_action_list' => $money_action_list,
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
		$input_data = $this->Money_model->new_record();

		$input_data = $this->Money_model->add_computing_data($input_data);

		$view_data += array(
			'input_data' => $input_data,
		);
		$this->view_show('manage/money/money_record', $view_data);
	}

	private function index_post($view_data)
	{
		// 入力値チェックルールの設定
		$this->form_validation->set_rules($this->Money_model->get_validation_config());

		// 入力値チェック
		if ($this->form_validation->run() == FALSE) {
			$view_data += array(
				'input_data' => $this->input->post(),
			);
			$this->view_show('manage/money/money_record', $view_data);

		} else {

			// 入力値
			$input_data = $this->input->post();

			$money_action = $input_data['money_action'];
			$money = $input_data['money'];
			if ($money_action == '1') {
				$input_data['payment'] = $money;
			} elseif ($money_action == '2') {
				$input_data['withdrawal'] = $money;
			} elseif ($money_action == '3') {
				$input_data['refund'] = $money;
			}

			$input_data['transaction_date'] = $input_data['action_date'];

			// ユーザー情報
			$this->load->model('User_model');
			$user_data = $this->User_model->get_user_account($input_data['account_id'], $input_data['user_name']);
			$input_data['user_id'] = $user_data['id'];
			$input_data['account_id'] = $user_data['account_id'];
			$input_data['user_name'] = $user_data['name'];

			// ゲーム情報
			$this->load->model('Game_model');
			$game_data = false;
			if (!is_empty_string($input_data['game_id'])) {
				$game_data = $this->Game_model->get_game(array(array('where' => 'id', 'value' => $input_data['game_id'])));
			}
			if ($game_data === false && !is_empty_string($input_data['game_name'])) {
				$game_data = $this->Game_model->get_game(array(array('where' => 'game_title like', 'value' => '%' . $input_data['game_name'] . '%')));
			}
			$input_data['game_id'] = $game_data['id'];
			$input_data['game_name'] = $game_data['game_title'];

			// 表示用データ変換
			$display_data = $this->Money_model->convert_display_data($input_data);

			$view_data += array(
				'display_data' => $display_data,
				'input_data' => $input_data,
			);
			$this->view_show('manage/money/money_record_confirm', $view_data);

		}
	}

	public function complate() {

		if ($this->input->method() == 'post') {
			// POST
			// 新規登録
			$this->Money_model->insert_money($this->input->post());
			$this->view_show('manage/money/money_record_complate');
		} else {
			redirect('manage/payment_list');
		}

	}
}
