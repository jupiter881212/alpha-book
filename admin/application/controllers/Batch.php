<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Game_model');
	}

	public function game_status_update()
	{
		if (!is_cli()) {
			show_404();
			return;
		}

		if ($this->Game_model->status_update()) {
			return 0;
		}
		return -1;
	}
}
