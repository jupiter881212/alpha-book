<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_validation_config($type = null) {
		$validation_config = array(
			array(
				'field' => 'account_id',
				'label' => 'アカウントID',
				'rules' => 'required',
			),
			array(
				'field' => 'name',
				'label' => '名前',
				'rules' => 'required',
			),
			array(
				'field' => 'mail_address',
				'label' => 'メールアドレス',
				'rules' => 'required|callback_valid_email_simple',
			),
			array(
				'field' => 'approved_flag',
				'label' => '本人確認',
				'rules' => 'callback_required_list',
			),
			array(
				'field' => 'balance',
				'label' => '残高',
				'rules' => 'numeric|max_length[10]',
			),
			array(
				'field' => 'delete_flg',
				'label' => 'ステータス',
				'rules' => 'callback_required_list',
			),
		);

		if ($type == 'api') {
			$validation_config = array(
				array(
					'field' => 'account_id',
					'label' => 'アカウントID',
					'rules' => 'required',
				),
			);
		}

		return $validation_config;
	}

	// ユーザー一覧取得
	public function find_user(array $param = null)
	{
		// ゲームマスタ
		$this->db->select('trn_user.id, trn_user.account_id, trn_user.name, trn_user.mail_address, trn_user.approved_flag, trn_user.delete_flg, format(ifnull(trn_user.balance, 0), 0) as balance');
		$this->db->from('trn_user');
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

	// ユーザーデータ取得
	public function get_user(array $param = null)
	{
		// ユーザーテーブル
		$this->db->select('*');
		$this->db->from('trn_user');
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
		if (!$result || $result->num_rows() == 0) {
			return false;
		}
		return $result->row_array();
	}

	public function get_user_account($account_id, $user_name = '')
	{
		$user_data = false;
		if (!is_empty_string($account_id)) {
			$user_data = $this->get_user(array(array('where' => 'account_id', 'value' => $account_id)));
		}
		if ($user_data === false && !is_empty_string($user_name)) {
			$user_data = $this->get_user(array(array('where' => 'name', 'value' => $user_name)));
		}
		return $user_data;
	}

	public function new_record()
	{
		$columns = $this->db->list_fields('trn_user');
		$data = array_fill_keys($columns, null);
		return $data;
	}

	public function add_computing_data($input_data)
	{

		return $input_data;
	}

	public function convert_display_data($input_data)
	{
		$display_data = array();

		$display_data = $input_data;

		$display_data['approved_flag'] = '';
		if ($input_data['approved_flag'] == '0') {
			$display_data['approved_flag'] = '未登録';
		} elseif ($input_data['approved_flag'] == '1') {
			$display_data['approved_flag'] = '済み';
		}

		$display_data['delete_flg'] = '';
		if ($input_data['delete_flg'] == '0') {
			$display_data['delete_flg'] = '退会';
		} elseif ($input_data['delete_flg'] == '1') {
			$display_data['delete_flg'] = '入会';
		}

		return $display_data;
	}

	public function insert_user($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_user');
		$insert_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->insert('trn_user', $insert_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	public function update_user($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_user');
		$update_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->where('id', $update_data['id']);
		$this->db->update('trn_user', $update_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	// 取引履歴一覧取得
	public function find_bet_history(array $param = null)
	{
		// ゲームマスタ
		$this->db->select("ifnull(date_format(trn_user_money.transaction_date, '%Y/%m/%d'), '') as history_date");
		$this->db->select("ifnull(mst_game_category.game_category_name, '') as game_category_name, ifnull(mst_game.game_title, '') as game_title");
		$this->db->select('ifnull(trn_user_money.bet, 0) as bet_money');
		$this->db->select("case trn_user_money.decide_flg when 0 then 'LOSE' when 1 then 'WIN' end as game_result");
		$this->db->select("ifnull(trn_user_money.back, '') as back_money");
		$this->db->from('trn_user_money');
		$this->db->join('mst_game', 'mst_game.id = trn_user_money.game_id', 'left');
		$this->db->join('mst_game_category', 'mst_game_category.id = mst_game.game_category_id', 'left');
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
}
