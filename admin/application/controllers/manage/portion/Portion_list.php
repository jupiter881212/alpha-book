<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portion_list extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Portion_model');
	}

	public function index()
	{
		$portion_list = $this->get_portion_list();

		$view_data = array(
			'portion_list' => $portion_list,
		);
		$this->view_show('manage/portion/portion_list', $view_data);
	}

	private function get_portion_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();
		$search_where[] = array(
			'where' => 'back_flag',
			'value' => 1,
		);

		$portion_list = $this->Portion_model->find_portion($search_where);
		for ($index = 0; $index < count($portion_list); $index++) {
			$modified = $portion_list[$index]['modified'];
			if (!is_empty_string($modified)) {
				$modified = date('Y/m/d', strtotime($modified));
			}
			$portion_list[$index]['modified'] = $modified;
		}

		return $portion_list;
	}
}
