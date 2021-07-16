<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_info extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Game_model');
	}

	public function index()
	{
		$game_id = $this->input->get('id');
		$input_data = null;
		if (!is_empty_string($game_id)) {
			$input_data = $this->Game_model->get_game(array(array('where' => 'id', 'value' => $game_id)));
			if ($input_data === false) {
				log_message('error', 'game_info:game not found [' . $game_id . ']');
				$input_data = null;
			}
			$input_data = $this->Game_model->add_computing_data($input_data);
		}

		if ($input_data != null) {
			// 表示用データ変換
			$display_data = $this->Game_model->convert_display_data($input_data, array(), '');

			$view_data = array(
				'game_id' => $game_id,
				'display_data' => $display_data,
			);
			$this->view_show('manage/game/game_info', $view_data);

		} else {
			redirect('manage/game_list');
		}
	}

	public function game_name()
	{
		$id = $this->session->userdata('user_id');
		if (is_empty_string($id)) {
			log_message('error', 'session is nothing.');
			show_404();
			return;
		}
		if ($this->input->method() == 'post') {
			// POST
			$input_data = $this->input->post();
			$output_data = array();

			// 入力値チェック
			$this->form_validation->set_rules($this->Game_model->get_validation_config('api'));
			if ($this->form_validation->run() == FALSE) {
				$output_data['result'] = -1;
				$output_data['error_message'] = $this->form_validation->error_string();
			} else {
				// ゲーム情報取得
				$game_info = $this->Game_model->get_game(array(array('where' => 'id', 'value' => $input_data['game_id'])));
				if ($game_info === false) {
					$output_data['result'] = -1;
					$output_data['error_message'] = '該当するゲーム情報が見つかりませんでした。';
				} else {
					$output_data['result'] = 0;
					$output_data['game_info'] = $game_info;
				}
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($output_data));

		} else {
			// GET
			show_404();
			return;
		}
	}

}
