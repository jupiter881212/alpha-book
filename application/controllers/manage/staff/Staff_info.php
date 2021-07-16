<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_info extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Staff_model');
	}

	public function index()
	{
		$staff_id = $this->input->get('id');
		$input_data = null;
		if (!is_empty_string($staff_id)) {
			$input_data = $this->Staff_model->get_staff(array(array('where' => 'id', 'value' => $staff_id)));
			if ($input_data === false) {
				log_message('error', 'staff_info:staff not found [' . $staff_id . ']');
				$input_data = null;
			}
			$input_data = $this->Staff_model->add_computing_data($input_data);
		}

		if ($input_data != null) {

			// 表示用データ変換
			$display_data = $this->Staff_model->convert_display_data($input_data, array());

			$view_data = array(
				'staff_id' => $staff_id,
				'display_data' => $display_data,
			);
			$this->view_show('manage/staff/staff_info', $view_data);

		} else {
			redirect('manage/staff_list');
		}
	}
}
