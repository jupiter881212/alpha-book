<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_list extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Game_model');
	}

	public function index()
	{
		// ゲームタイプ
		$game_type_list = $this->Game_model->find_game_type();
		if (is_array($game_type_list)) {
			$game_type_list = array('' => '選択') + array_combine(array_column($game_type_list, 'id'), array_column($game_type_list, 'game_type'));
		}
		// ゲームカテゴリー
		$game_category_list = $this->Game_model->find_game_category();
		// ベット数
		$bet_count_list = $this->Game_model->get_list('search_bet_count');
		// 合計金額
		$total_money_list = $this->Game_model->get_list('search_total_money');
		// ゲームステータス
		$game_status_list = $this->Game_model->get_list('search_game_status');

		$view_data = array(
			'game_type_list' => $game_type_list,
			'game_category_list' => $game_category_list,
			'bet_count_list' => $bet_count_list,
			'total_money_list' => $total_money_list,
			'game_status_list' => $game_status_list,
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
		$search_data = array_fill_keys(array('game_type_id', 'game_category_id', 'game_name', 'bet_count', 'total_money', 'game_status'), null);
		$game_list = $this->get_game_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'game_list' => $game_list,
		);
		$this->view_show('manage/game/game_list', $view_data);
	}

	private function index_post($view_data)
	{
		// 検索条件の値を取得
		$search_data = $this->input->post();
		$game_list = $this->get_game_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'game_list' => $game_list,
		);
		$this->view_show('manage/game/game_list', $view_data);
	}

	private function get_game_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();

		if (!is_empty_string($search_data['game_type_id'])) {
			$search_where[] = array(
				'where' => 'mst_game.game_type_id',
				'value' => $search_data['game_type_id'],
			);
		}
		if (array_key_exists('game_category_id', $search_data)
				&& !is_empty_string($search_data['game_category_id'])) {
			$search_where[] = array(
				'where' => 'mst_game.game_category_id',
				'value' => $search_data['game_category_id'],
			);
		}
		if (!is_empty_string($search_data['game_name'])) {
			$search_where[] = array(
				'where' => 'mst_game.game_title like',
				'value' => '%' . $search_data['game_name'] . '%',
			);
		}
		if (!is_empty_string($search_data['bet_count'])) {
			$bet_count = explode('-', $search_data['bet_count']);
			$where = '';
			if (count($bet_count) > 1) {
				$where = 'ifnull((select count(*) from trn_game_bet_amount where mst_game.id = trn_game_bet_amount.game_id group by trn_game_bet_amount.game_id), 0)';
				if ($bet_count[1] == '') {
					$where = sprintf('%s >= %s', $where, $bet_count[0]);
				} else {
					$where = sprintf('%s between %s and %s', $where, $bet_count[0], $bet_count[1]);
				}
				$search_where[] = array(
					'where' => $where,
				);
			}
		}
		if (!is_empty_string($search_data['total_money'])) {
			$total_money = explode('-', $search_data['total_money']);
			$where = '';
			if (count($total_money) > 1) {
				$where = 'ifnull((select sum(trn_game_bet_amount.bet_amount) from trn_game_bet_amount where mst_game.id = trn_game_bet_amount.game_id group by trn_game_bet_amount.game_id), 0)';
				if ($total_money[1] == '') {
					$where = sprintf('%s >= %s', $where, $total_money[0]);
				} else {
					$where = sprintf('%s between %s and %s', $where, $total_money[0], $total_money[1]);
				}
				$search_where[] = array(
					'where' => $where,
				);
			}
		}
		if (!is_empty_string($search_data['game_status'])) {
			$search_where[] = array(
				'where' => 'mst_game.game_status',
				'value' => $search_data['game_status'],
			);
		}

		$game_list = $this->Game_model->find_game($search_where);
		$game_status_list = $this->Game_model->get_list('search_game_status');
		for ($index = 0; $index < count($game_list); $index++) {
			$game_status = $game_list[$index]['game_status'];
			$game_status_name = '';
			if (array_key_exists($game_status, $game_status_list)) {
				$game_status_name = $game_status_list[$game_status];
			}
			$game_list[$index]['game_status'] = $game_status_name;
		}

		return $game_list;
	}
}
