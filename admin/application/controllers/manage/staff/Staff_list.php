<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_list extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Staff_model');
	}

	public function index()
	{
		// 権限
		$role_type_list = $this->Staff_model->get_list('role_type');

		$view_data = array(
			'role_type_list' => $role_type_list,
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
		$search_data = array_fill_keys(array('name', 'role_type'), null);
		$staff_list = $this->get_staff_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'staff_list' => $staff_list,
		);
		$this->view_show('manage/staff/staff_list', $view_data);
	}

	private function index_post($view_data)
	{
		// 検索条件の値を取得
		$search_data = $this->input->post();
		$staff_list = $this->get_staff_list($search_data);
		$view_data += array(
			'search_data' => $search_data,
			'staff_list' => $staff_list,
		);
		$this->view_show('manage/staff/staff_list', $view_data);
	}

	private function get_staff_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();

		if (!is_empty_string($search_data['name'])) {
			$search_where[] = array(
				'where' => 'trn_admin_user.name like',
				'value' => '%' . $search_data['name'] . '%',
			);
		}
		if (!is_empty_string($search_data['role_type'])) {
			$search_where[] = array(
				'where' => 'trn_admin_user.role_type',
				'value' => $search_data['role_type'],
			);
		}

		$staff_list = $this->Staff_model->find_staff($search_where);
		for ($index = 0; $index < count($staff_list); $index++) {
			$role_type = $staff_list[$index]['role_type'];
			$role_type_name = '';
			if ($role_type == '0') {
				$role_type_name = 'スタッフ';
			} elseif ($role_type == '1') {
				$role_type_name = '管理者';
			}
			$staff_list[$index]['role_type'] = $role_type_name;
		}

		return $staff_list;
	}
}
