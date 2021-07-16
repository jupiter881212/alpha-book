<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_validation_config() {
		$validation_config = array(
			array(
				'field' => 'name',
				'label' => 'スタッフ名',
				'rules' => 'required|callback_valid_email_simple',
			),
			array(
				'field' => 'password',
				'label' => 'パスワード',
				'rules' => 'required',
			),
			array(
				'field' => 'role_type',
				'label' => '権限',
				'rules' => 'callback_required_list',
			),
		);

		return $validation_config;
	}

	// 巣タフ一覧取得
	public function find_staff(array $param = null)
	{
		// 管理ユーザーマスタ
		$this->db->select('trn_admin_user.id, trn_admin_user.name, trn_admin_user.role_type');
		$this->db->from('trn_admin_user');
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

	// スタッフデータ取得
	public function get_staff(array $param = null)
	{
		// ゲームマスタ
		$this->db->select('*');
		$this->db->from('trn_admin_user');
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

	public function new_record()
	{
		$columns = $this->db->list_fields('trn_admin_user');
		$data = array_fill_keys($columns, null);
		return $data;
	}

	public function add_computing_data($input_data)
	{
		$input_data['password'] = str_rot13($input_data['password']);

		return $input_data;
	}

	public function convert_display_data($input_data)
	{
		$display_data = array();

		$display_data = $input_data;

		$display_data['role_type'] = '';
		if ($input_data['role_type'] == '0') {
			$display_data['role_type'] = 'スタッフ';
		} elseif ($input_data['role_type'] == '1') {
			$display_data['role_type'] = '管理者';
		}

		return $display_data;
	}

	public function insert_staff($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_admin_user');
		$insert_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->insert('trn_admin_user', $insert_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	public function update_staff($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_admin_user');
		$update_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->where('id', $update_data['id']);
		$this->db->update('trn_admin_user', $update_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

}
