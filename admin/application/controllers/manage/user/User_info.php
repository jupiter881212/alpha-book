<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_info extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
	}

	public function index()
	{
		$user_id = $this->input->get('id');
		$input_data = null;
		if (!is_empty_string($user_id)) {
			$input_data = $this->User_model->get_user(array(array('where' => 'id', 'value' => $user_id)));
			if ($input_data === false) {
				log_message('error', 'user_info:user not found [' . $user_id . ']');
				$input_data = null;
			}
			$input_data = $this->User_model->add_computing_data($input_data);
		}

		if ($input_data != null) {
			// ゲームカテゴリー
			$game_category_list = $this->User_model->find_game_category();
			if (is_array($game_category_list)) {
				$game_category_list = array_combine(array_column($game_category_list, 'id'), array_column($game_category_list, 'game_category_name'));
			}

			// 表示用データ変換
			$display_data = $this->User_model->convert_display_data($input_data, array());

			// 取引履歴を取得
			$search_data = array_fill_keys(array('game_category_id', 'target_date'), null);
			if ($this->input->method() == 'post') {
				$search_data = $this->input->post();
			}
			$bet_history_list = $this->get_bet_history_list($search_data);
			$display_data['bet_history_list'] = $bet_history_list;

			$view_data = array(
				'game_category_list' => $game_category_list,
				'search_data' => $search_data,
				'display_data' => $display_data,
			);
			$this->view_show('manage/user/user_info', $view_data);

		} else {
			redirect('manage/user_list');
		}
	}

	private function get_bet_history_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();

		$search_where[] = array(
			'where' => 'trn_user_money.back > 0',
		);
		$search_data[] = array(
			'where' => 'trn_user_money.user_id',
			'value' => $this->input->get('id'),
		);
		if (!is_empty_string($search_data['game_category_id'])) {
			$search_where[] = array(
				'where' => 'mst_game.game_category_id',
				'value' => $search_data['game_category_id'],
			);
		}
		if (!is_empty_string($search_data['target_date'])) {
			$date = date('Y-m-d', strtotime($search_data['target_date']));
			$search_where[] = array(
				'where' => 'trn_user_money.transaction_date',
				'value' => $date,
			);
		}

		$bet_history_list = $this->User_model->find_bet_history($search_where);

		return $bet_history_list;
	}

	public function account()
	{
		$id = $this->session->userdata('user_id');
		if (is_empty_string($id)) {
			log_message('error', 'session is nothing.');
			show_404();
			return;
		}
		if ($this->input->method() == 'post') {
			// POST
			$input_data = $this->input->post();
			$output_data = array();

			// 入力値チェック
			$this->form_validation->set_rules($this->User_model->get_validation_config('api'));
			if ($this->form_validation->run() == FALSE) {
				$output_data['result'] = -1;
				$output_data['error_message'] = $this->form_validation->error_string();
			} else {
				// ユーザー取得
				$user_info = $this->User_model->get_user_account($input_data['account_id']);
				if ($user_info === false) {
					$output_data['result'] = -1;
					$output_data['error_message'] = '該当するユーザーが見つかりませんでした。';
				} else {
					$output_data['result'] = 0;
					$output_data['user_info'] = $user_info;
				}
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($output_data));

		} else {
			// GET
			show_404();
			return;
		}
	}
}
