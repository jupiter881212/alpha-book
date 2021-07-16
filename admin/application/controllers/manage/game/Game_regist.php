<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_regist extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Game_model');
	}

	public function index()
	{
		// ゲームタイプ
		$game_type_list = $this->Game_model->find_game_type();
		if (is_array($game_type_list)) {
			$game_type_list = array('' => '選択') + array_combine(array_column($game_type_list, 'id'), array_column($game_type_list, 'game_type'));
		}
		// ゲームカテゴリー
		$game_category_list = $this->Game_model->find_game_category();

		$view_data = array(
			'game_type_list' => $game_type_list,
			'game_category_list' => $game_category_list,
		);

		if ($this->input->method() == 'post') {
			// POST
			$this->index_post($view_data);
		} else {
			// GET
			$game_id = $this->input->get('id');
			$this->index_get($view_data, $game_id);
		}
	}

	private function index_get($view_data, $game_id)
	{
		$page_caption = 'ゲーム追加';
		$is_new = true;
		$input_data = array();
		if ($game_id == null) {
			$input_data = $this->Game_model->new_record();
		} else {
			$page_caption = 'ゲーム編集';
			$is_new = false;
			$input_data = $this->Game_model->get_game(array(array('where' => 'id', 'value' => $game_id)));
			if ($input_data === false) {
				log_message('error', 'game_regist:game not found [' . $game_id . ']');
				$input_data = $this->Game_model->new_record();
			}
		}
		$input_data = $this->Game_model->add_computing_data($input_data);

		$view_data += array(
			'page_caption' => $page_caption,
			'is_new' => $is_new,
			'input_data' => $input_data,
		);
		$this->view_show('manage/game/game_regist', $view_data);
	}

	private function index_post($view_data)
	{
		// 入力値チェックルールの設定
		$this->form_validation->set_rules($this->Game_model->get_validation_config());

		if (is_array($_FILES) && array_key_exists('game_image', $_FILES)
				&& is_array($_FILES['game_image']['name'])) {
			for ($index = 0; $index < count($_FILES['game_image']['name']); $index++) {
				$field = sprintf('game_image%d', $index + 1);
				$_FILES[$field]['name'] = $_FILES['game_image']['name'][$index];
				$_FILES[$field]['type'] = $_FILES['game_image']['type'][$index];
				$_FILES[$field]['tmp_name'] = $_FILES['game_image']['tmp_name'][$index];
				$_FILES[$field]['error'] = $_FILES['game_image']['error'][$index];
				$_FILES[$field]['size'] = $_FILES['game_image']['size'][$index];
			}
		}

		// アップロードファイルの確認
		$user_id = $this->session->userdata('user_id');
		$this->Game_model->remove_temporary_file($user_id);
		$file_list = $this->Game_model->file_upload($user_id, array('game_image_url', 'game_image1', 'game_image2', 'game_image3', 'game_image4', 'game_image5', 'game_image6', 'game_image7', 'game_image8', 'game_image9', 'game_image10'));
		foreach ($file_list as $file_info) {
			if ($file_info['result'] === false) {
				$this->form_validation->set_message($file_info['field_name'], $file_info['err_msg']);
			}
		}

		$page_caption = 'ゲーム追加';
		$is_new = true;
		if (!is_empty_string($this->input->post('id'))) {
			$page_caption = 'ゲーム編集';
			$is_new = false;
		}

		$input_data = $this->Game_model->add_computing_data($this->input->post());

		// 入力値チェック
		if ($this->form_validation->run() == FALSE) {
			$view_data += array(
				'page_caption' => $page_caption,
				'is_new' => $is_new,
				'input_data' => $input_data,
			);
			$this->view_show('manage/game/game_regist', $view_data);

		} else {

			// 入力値
			$input_data = $this->input->post();

			$game_type_id = $input_data['game_type_id'];
			if ($game_type_id == '1') {
				$game_home_team = $input_data['game_home_team'];
				if ($game_home_team == 2) {
					$input_data['game_home_team'] = 0;
					$input_data['game_away_team'] = 1;
				} else {
					$input_data['game_home_team'] = 1;
					$input_data['game_away_team'] = 0;
				}
			}

			$input_data['target_date'] = null;
			if ($game_type_id == '4') {
				if (!is_empty_string($input_data['target_date_day']) && !is_empty_string($input_data['target_date_time'])) {
					$input_data['target_date'] = $input_data['target_date_day'] . ' ' . $input_data['target_date_time'];
				}
			}
			$input_data['start_date'] = null;
			if (!is_empty_string($input_data['start_date_day']) && !is_empty_string($input_data['start_date_time'])) {
				$input_data['start_date'] = $input_data['start_date_day'] . ' ' . $input_data['start_date_time'];
			}
			$input_data['end_date'] = null;
			if (!is_empty_string($input_data['end_date_day']) && !is_empty_string($input_data['end_date_time'])) {
				$input_data['end_date'] = $input_data['end_date_day'] . ' ' . $input_data['end_date_time'];
			}
			$input_data['game_result_date'] = null;
			if (!is_empty_string($input_data['game_result_date_day']) && !is_empty_string($input_data['game_result_date_time'])) {
				$input_data['game_result_date'] = $input_data['game_result_date_day'] . ' ' . $input_data['game_result_date_time'];
			}
			// アップロードファイル
			foreach ($file_list as $file_info) {
				$input_data[$file_info['field_name']] = $file_info['file_path'];
			}

			// 表示用データ変換
			$display_data = $this->Game_model->convert_display_data($input_data, $file_list, $user_id);

			$view_data += array(
				'is_new' => is_empty_string($this->input->post('game_id')),
				'display_data' => $display_data,
				'input_data' => $input_data,
				'file_list' => $file_list,
			);
			$this->view_show('manage/game/game_regist_confirm', $view_data);
	
		}

	}

	public function complate()
	{

		if ($this->input->method() == 'post') {
			// POST
			$mode = $this->input->post('mode');
			if ($mode == '1') {
				// 登録
				$user_id = $this->session->userdata('user_id');
				$this->Game_model->move_temporary_file($user_id, array('game_image_url', 'game_image1', 'game_image2', 'game_image3', 'game_image4', 'game_image5', 'game_image6', 'game_image7', 'game_image8', 'game_image9', 'game_image10'));
				$this->Game_model->remove_temporary_file($user_id);
		
				$game_id = $this->input->post('id');
				if (is_empty_string($game_id)) {
					$this->Game_model->insert_game($this->input->post());
				} else {
					$this->Game_model->update_game($this->input->post());
				}
				$this->view_show('manage/game/game_regist_complate');

			}
		}

	}

	public function close()
	{
		// 非公開
		$game_id = $this->input->post('id');
		if (!is_empty_string($game_id)) {
			$this->Game_model->update_game(array('id' => $game_id, 'game_status' => -1));
		}
		redirect('manage/game_list');
	}
}
