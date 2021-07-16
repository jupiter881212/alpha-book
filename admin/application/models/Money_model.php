<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Money_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
	}

	public function get_validation_config() {
		$validation_config = array(
			array(
				'field' => 'money_action',
				'label' => '入出金',
				'rules' => 'callback_required_list|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
			),
			array(
				'field' => 'account_id',
				'label' => 'ユーザー',
				'rules' => 'callback_valid_user_account[user_name]',
			),
			array(
				'field' => 'game_id',
				'label' => 'ゲームID',
				'rules' => 'callback_valid_game[game_name]',
			),
			array(
				'field' => 'money',
				'label' => '金額',
				'rules' => 'required|numeric|greater_than_equal_to[0]',
			),
			array(
				'field' => 'action_date',
				'label' => '日付',
				'rules' => 'required',
			),
		);

		return $validation_config;
	}

	// 入出金一覧取得
	public function find_money(array $param = null)
	{
		// ゲーム取り分設定
		$this->db->select('trn_user_money.id, trn_user_money.game_id, trn_user_money.user_id, trn_user_money.payment, trn_user_money.withdrawal, trn_user_money.transaction_date as action_date');
		$this->db->select('trn_user.account_id, trn_user.name as user_name');
		$this->db->from('trn_user_money');
		$this->db->join('trn_user', 'trn_user_money.user_id = trn_user.id');
		$this->db->join('mst_game', 'trn_user_money.game_id = mst_game.id', 'left');
		if ($param != null) {
			foreach ($param as $item) {
				if (array_key_exists('value', $item)) {
					$this->db->where($item['where'], $item['value']);
				} else {
					$this->db->where($item['where']);
				}
			}
		}
		$result = $this->db->get();
		if (!$result) {
			return false;
		}
		return $result->result_array();
	}

	public function new_record()
	{
		$columns = $this->db->list_fields('trn_user_money');
		$data = array_fill_keys($columns, null);
		return $data;
	}

	public function add_computing_data($input_data)
	{
		if (!array_key_exists('money_action', $input_data)) {
			$input_data['money_action'] = '1';
		}
		if (!array_key_exists('account_id', $input_data)) {
			$input_data['account_id'] = '';
		}
		if (!array_key_exists('user_name', $input_data)) {
			$input_data['user_name'] = '';
		}
		if (!array_key_exists('game_name', $input_data)) {
			$input_data['game_name'] = '';
		}
		if (!array_key_exists('money', $input_data)) {
			$input_data['money'] = '';
		}
		if (!array_key_exists('action_date', $input_data)) {
			$input_data['action_date'] = date('Y-m-d');
		}

		return $input_data;
	}

	public function convert_display_data($input_data)
	{
		$display_data = array();

		$display_data = $input_data;

		$display_data['money_action'] = '';
		if ($input_data['money_action'] == '1') {
			$display_data['money_action'] = '入金';
		} elseif ($input_data['money_action'] == '2') {
			$display_data['money_action'] = '出金';
		} elseif ($input_data['money_action'] == '3') {
			$display_data['money_action'] = '返金';
		}

		if (!is_empty_string($input_data['action_date'])) {
			$display_data['action_date'] = date('Y/n/j', strtotime($input_data['action_date']));
		}

		return $display_data;
	}

	public function insert_money($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_user_money');
		$insert_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->insert('trn_user_money', $insert_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

}
