<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_validation_config() {
		$validation_config = array(
			array(
				'field' => 'user_id',
				'label' => 'ログインID',
				'rules' => 'required',
			),
			array(
				'field' => 'password',
				'label' => 'パスワード',
				'rules' => 'required',
			),
		);

		return $validation_config;
	}

	//ログインデータ呼び出し
	public function get_user(array $param = null)
	{
		// ユーザー情報取得
		$this->db->select('*');
		$this->db->from('trn_user');
		if ($param != null) {
			if (array_key_exists('password', $param)) {
				$param['password'] = str_rot13($param['password']);
			}
			$this->db->where($param);
		}
		$result = $this->db->get();
		if (!$result || $result->num_rows() == 0) {
			return false;
		}
		return $result->row_array();
	}

	public function update_login($user_id, $sid, $hash = null)
	{
		// 情報登録
		$update_data = array();
		$update_data['sid'] = $sid;
		if ($hash != null) {
			$update_data['hash'] = $hash;
		}
		$this->db->where('id', $user_id);
		$this->db->update('trn_user', $update_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}
}