<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $CI = null;

	/**
	 * 設定値
	 * @var array
	 */
	private $custom_config = null;

	public function __construct()
	{
		parent::__construct();

		$this->CI =& get_instance();

		$this->config->load('custom_config', TRUE);
		$this->custom_config = $this->config->item('custom_config');
	}

	/**
	 * 一覧形式の設定値を取得します。
	 *
	 * @param string $name 設定値名
	 * @return array
	 */
	public function get_list($name)
	{
		if ($this->custom_config != null && array_key_exists($name, $this->custom_config) && is_array($this->custom_config[$name])) {
			return $this->custom_config[$name];
		}
		return array();
	}

	/******************* マスタ関連 *******************/
	/**
	 * ゲームタイプマスタを取得します。
	 *
	 * @param array $param
	 * @return array
	 */
	public function find_game_type(array $param = null)
	{
		// ゲームタイプマスタ
		$this->db->select('*');
		$this->db->from('mst_game_type');
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

	/**
	 * ゲームカテゴリーマスタを取得します。
	 *
	 * @param array $param
	 * @return array
	 */
	public function find_game_category(array $param = null)
	{
		// ゲームタイプマスタ
		$this->db->select('*');
		$this->db->from('mst_game_category');
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

	// 権限マスタ取得
	public function find_role(array $param = null)
	{
		// 権限マスタ
		$this->db->select('mst_role.menu_id, mst_role.read_flag, mst_role.edit_flag');
		$this->db->from('mst_role');
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

	public function get_role($role_type, $menu_id, $field = 'edit_flag')
	{
		// 権限マスタ
		$this->db->select($field);
		$this->db->from('mst_role');
		$this->db->where('role_type', $role_type);
		$this->db->where('menu_id', $menu_id);
		$result = $this->db->get();
		if (!$result || $result->num_rows() == 0) {
			return false;
		}
		$row = $result->row_array();
		if (array_key_exists($field, $row)) {
			return $row[$field];
		}
		return false;
	}
}
