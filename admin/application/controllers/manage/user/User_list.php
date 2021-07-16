<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_list extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
	}

	public function index()
	{
		// 本人確認
		$approved_flag_list = $this->User_model->get_list('search_approved_flag');
		// ユーザーステータス
		$delete_flag_list = $this->User_model->get_list('search_user_delete_flag');

		$view_data = array(
			'approved_flag_list' => $approved_flag_list,
			'delete_flag_list' => $delete_flag_list,
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
		$search_data = array_fill_keys(array('account_id', 'user_name', 'mail_address', 'approved_flag', 'delete_flag'), null);
		$user_list = $this->get_user_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'user_list' => $user_list,
		);
		$this->view_show('manage/user/user_list', $view_data);
	}

	private function index_post($view_data)
	{
		// 検索条件の値を取得
		$search_data = $this->input->post();
		$user_list = $this->get_user_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'user_list' => $user_list,
		);
		$this->view_show('manage/user/user_list', $view_data);
	}

	private function get_user_list(array $search_data = array(), $limit = null, $offset = null)
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
		if (!is_empty_string($search_data['mail_address'])) {
			$search_where[] = array(
				'where' => 'trn_user.mail_address like',
				'value' => '%' . $search_data['mail_address'] . '%',
			);
		}
		if (!is_empty_string($search_data['approved_flag'])) {
			$search_where[] = array(
				'where' => 'trn_user.approved_flag',
				'value' => $search_data['approved_flag'],
			);
		}
		if (!is_empty_string($search_data['delete_flag'])) {
			$search_where[] = array(
				'where' => 'trn_user.delete_flg',
				'value' => $search_data['delete_flag'],
			);
		}

		$user_list = $this->User_model->find_user($search_where);
		for ($index = 0; $index < count($user_list); $index++) {
			$approved_flag = $user_list[$index]['approved_flag'];
			$approved_flag_name = '';
			if ($approved_flag == '0') {
				$approved_flag_name = '未登録';
			} elseif ($approved_flag == '1') {
				$approved_flag_name = '済み';
			}
			$user_list[$index]['approved_flag'] = $approved_flag_name;

			$delete_flag = $user_list[$index]['delete_flg'];
			$delete_flag_name = '';
			if ($delete_flag == '0') {
				$delete_flag_name = '退会';
			} elseif ($delete_flag == '1') {
				$delete_flag_name = '入会';
			}
			$user_list[$index]['delete_flg'] = $delete_flag_name;
		}

		return $user_list;
	}
}
