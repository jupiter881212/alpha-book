<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal_list extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Money_model');
	}

	public function index()
	{
		// ゲームタイプ
		$game_type_list = $this->Money_model->find_game_type();
		if (is_array($game_type_list)) {
			$game_type_list = array_combine(array_column($game_type_list, 'id'), array_column($game_type_list, 'game_type'));
		}

		$view_data = array(
			'game_type_list' => $game_type_list,
			'page_caption' => '出金',
			'money_action' => '2',
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
		// 検索条件の値を取得
		$search_data = array_fill_keys(array('game_type_id', 'account_id', 'user_name', 'game_id', 'money', 'action_date'), null);
		$money_list = $this->get_money_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'money_list' => $money_list,
		);
		$this->view_show('manage/money/money_list', $view_data);
	}

	private function index_post($view_data)
	{
		// 検索条件の値を取得
		$search_data = $this->input->post();
		$money_list = $this->get_money_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'money_list' => $money_list,
		);
		$this->view_show('manage/money/money_list', $view_data);
	}

	private function get_money_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();

		if (!is_empty_string($search_data['account_id'])) {
			$search_where[] = array(
				'where' => 'trn_user.account_id',
				'value' => $search_data['account_id'],
			);
		}
		if (!is_empty_string($search_data['user_name'])) {
			$search_where[] = array(
				'where' => 'trn_user.name like',
				'value' => '%' . $search_data['user_name'] . '%',
			);
		}
		if (!is_empty_string($search_data['game_id'])) {
			$search_where[] = array(
				'where' => 'trn_user_money.game_id',
				'value' => $search_data['game_id'],
			);
		}
		if (!is_empty_string($search_data['money'])) {
			$search_where[] = array(
				'where' => 'trn_user_money.withdrawal',
				'value' => $search_data['money'],
			);
		} else {
			$search_where[] = array(
				'where' => 'trn_user_money.withdrawal > 0',
			);
		}
		if (!is_empty_string($search_data['action_date'])) {
			$search_where[] = array(
				'where' => 'trn_user_money.transaction_date',
				'value' => $search_data['action_date'],
			);
		}

		$money_list = $this->Money_model->find_money($search_where);
		for ($index = 0; $index < count($money_list); $index++) {
			$money_list[$index]['money'] = $money_list[$index]['withdrawal'];
			$action_date = $money_list[$index]['action_date'];
			if (!is_empty_string($action_date)) {
				$action_date = date('n月j日', strtotime($action_date));
			}
			$money_list[$index]['action_date'] = $action_date;
		}

		return $money_list;
	}
}
