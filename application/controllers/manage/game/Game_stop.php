<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_stop extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Game_model');
	}

	public function index()
	{
		$view_data = array(
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
		$game_list = $this->get_game_list();
		$view_data += array(
			'game_list' => $game_list,
		);
		$this->view_show('manage/game/game_stop', $view_data);
	}

	private function index_post($view_data)
	{
		// 登録
		$game_id = $this->input->post('game_id');
		if (is_empty_string($game_id)) {
			redirect('manage/game/game_stop');
		} else {
			$this->Game_model->update_game(array('id' => $game_id, 'attendance_flag' => 1));
			$this->view_show('manage/game/game_stop_complate');
		}
	}

	private function get_game_list(array $search_data = array(), $limit = null, $offset = null)
	{
		$search_where = array();

		$search_where[] = array(
			'where' => 'mst_game.attendance_flag',
			'value' => 0,
		);

		$game_list = $this->Game_model->find_game($search_where);
		for ($index = 0; $index < count($game_list); $index++) {
			$attendance_flag = $game_list[$index]['attendance_flag'];
			$attendance_flag_name = '';
			if ($attendance_flag == '0') {
				$attendance_flag_name = '受付中';
			} elseif ($attendance_flag == '1') {
				$attendance_flag_name = '受付終了';
			}
			$game_list[$index]['attendance_flag'] = $attendance_flag_name;
		}

		return $game_list;
	}
}
