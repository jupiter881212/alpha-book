<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portion_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_validation_config() {
		$validation_config = array(
			array(
				'field' => 'game_back_percentage',
				'label' => 'パーセンテージ',
				'rules' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
			),
			array(
				'field' => 'modified',
				'label' => '更新日',
				'rules' => 'required',
			),
		);

		return $validation_config;
	}

	// 取り分一覧取得
	public function find_portion(array $param = null)
	{
		// ゲーム取り分設定
		$this->db->select('trn_game_category_percentage.id, trn_game_category_percentage.game_back_percentage, trn_game_category_percentage.modified');
		$this->db->from('trn_game_category_percentage');
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

	// 取り分データ取得
	public function get_portion(array $param = null)
	{
		// ゲームマスタ
		$this->db->select('*');
		$this->db->from('trn_game_category_percentage');
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
		$columns = $this->db->list_fields('trn_game_category_percentage');
		$data = array_fill_keys($columns, null);
		return $data;
	}

	public function convert_display_data($input_data)
	{
		$display_data = array();

		$display_data = $input_data;

		if (!is_empty_string($input_data['modified'])) {
			$display_data['modified'] = date('Y/m/d', strtotime($input_data['modified']));
		}

		return $display_data;
	}

	public function insert_portion($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('trn_game_category_percentage');
		$insert_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->insert('trn_game_category_percentage', $insert_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	public function update_portion_back_flag()
	{
		// 情報登録
		$update_data = array('back_flag' => '0');
		$this->db->where('back_flag', '1');
		$this->db->update('trn_game_category_percentage', $update_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}
}
