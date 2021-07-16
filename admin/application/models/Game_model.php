<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_validation_config($type = null) {
		$validation_config = array(
			array(
				'field' => 'game_type_id',
				'label' => 'タイプ',
				'rules' => 'callback_required_list',
			),
			array(
				'field' => 'game_category_id',
				'label' => 'カテゴリー',
				'rules' => 'callback_required_list',
			),
			array(
				'field' => 'game_title',
				'label' => 'タイトル',
				'rules' => 'required',
			),
			array(
				'field' => 'game_caption_h2',
				'label' => 'サブタイトル',
				'rules' => 'required',
			),
			array(
				'field' => 'game_detail_count',
				'label' => 'ゲーム詳細',
				'rules' => 'min_length[1]',
			),
			array(
				'field' => 'game_detail[]',
				'label' => 'ゲーム詳細',
				'rules' => 'required',
			),
			array(
				'field' => 'start_date_day',
				'label' => 'ゲーム開始日',
				'rules' => 'required',
			),
			array(
				'field' => 'start_date_time',
				'label' => 'ゲーム開始日',
				'rules' => 'required',
			),
			array(
				'field' => 'end_date_day',
				'label' => 'ゲーム終了日',
				'rules' => 'required',
			),
			array(
				'field' => 'end_date_time',
				'label' => 'ゲーム終了日',
				'rules' => 'required',
			),
		);

		if ($type == 'api') {
			$validation_config = array(
				array(
					'field' => 'game_id',
					'label' => 'ゲームID',
					'rules' => 'required',
				),
			);
		}

		return $validation_config;
	}

	// ゲーム一覧取得
	public function find_game(array $param = null)
	{
		// ゲームマスタ
		$this->db->select('mst_game.id, mst_game_type.game_type, mst_game_category.game_category_name, game_title, game_status');
		$this->db->select('(select count(*) from trn_game_bet_amount where trn_game_bet_amount.game_id = mst_game.id) bet_count');
		$this->db->select('ifnull((select sum(trn_game_bet_amount.bet_amount) from trn_game_bet_amount where trn_game_bet_amount.game_id = mst_game.id), 0) total_money');
		$this->db->select('mst_game.attendance_flag');
		$this->db->from('mst_game');
		$this->db->join('mst_game_type', 'mst_game.game_type_id = mst_game_type.id', 'left');
		$this->db->join('mst_game_category', 'mst_game.game_category_id = mst_game_category.id', 'left');
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

	// ゲームデータ取得
	public function get_game(array $param = null)
	{
		// ゲームマスタ
		$this->db->select('*');
		$this->db->from('mst_game');
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
		if (!$result || $result->num_rows() == 0) {
			return false;
		}
		return $result->row_array();
	}

	public function new_record()
	{
		$columns = $this->db->list_fields('mst_game');
		$data = array_fill_keys($columns, null);
		return $data;
	}

	public function add_computing_data($input_data)
	{
		if (is_empty_string($input_data['game_status'])) {
			$input_data['game_status'] = 0;
		}
		if (array_key_exists('game_image_url', $input_data) && !is_empty_string($input_data['game_image_url'])) {
			$file_name = $input_data['game_image_url'];
			$input_data['game_image_url_org'] = $file_name;
			if (!is_empty_string($file_name)) {
				$input_data['game_image_url_src'] = $this->get_file_data(IMAGE_UPLOAD_DIR, $file_name);;
			}
		} else {
			$input_data['game_image_url'] = '';
		}
		if (!array_key_exists('rece_count', $input_data)) {
			$input_data['race_count'] = 0;
			for ($index = 10; $index > 0; $index--) {
				$field_name = 'race' . $index;
				if (array_key_exists($field_name, $input_data)
						&& !is_empty_string($input_data[$field_name])) {
					$input_data['race_count'] = $index;
					break;
				}
			}
			$input_data['race'] = array();
			for ($index = 0; $index < $input_data['race_count']; $index++) {
				$input_data['race'][] = $input_data['race' . ($index + 1)];
			}
		}
		if (!array_key_exists('stochastic_count', $input_data)) {
			$input_data['stochastic_count'] = 0;
			for ($index = 10; $index > 0; $index--) {
				$field_name = 'stochastic' . $index;
				if (array_key_exists($field_name, $input_data)
						&& !is_empty_string($input_data[$field_name])) {
					$input_data['stochastic_count'] = $index;
					break;
				}
			}
			$input_data['stochastic'] = array();
			for ($index = 0; $index < $input_data['stochastic_count']; $index++) {
				$input_data['stochastic'][] = $input_data['stochastic' . ($index + 1)];
			}
		}
		if (!array_key_exists('game_detail_count', $input_data)) {
			$input_data['game_detail_count'] = 0;
			for ($index = 10; $index > 0; $index--) {
				$field_name = 'game_detail' . $index;
				if (array_key_exists($field_name, $input_data)
						&& !is_empty_string($input_data[$field_name])) {
					$input_data['game_detail_count'] = $index;
					break;
				}
			}
			$input_data['game_detail'] = array();
			for ($index = 0; $index < $input_data['game_detail_count']; $index++) {
				$input_data['game_detail'][] = $input_data['game_detail' . ($index + 1)];
				$file_name = $input_data['game_image' . ($index + 1)];
				$input_data['game_image'][] = $file_name;
				$input_data['game_image_org'][] = $file_name;
				if (!is_empty_string($file_name)) {
					$input_data['game_image_src'][] = $this->get_file_data(IMAGE_UPLOAD_DIR, $file_name);
				}
			}
		}
		if ($input_data['game_detail_count'] == 0) {
			$input_data['game_detail_count'] = 1;
			$input_data['game_detail'] = array('');
			$input_data['game_image'] = array('');
			$input_data['game_image_org'] = array('');
		}

		$input_data['target_date_day'] = '';
		$input_data['target_date_time'] = '';
		if (array_key_exists('target_date', $input_data) && !is_empty_string($input_data['target_date'])) {
			$datetime = strtotime($input_data['target_date']);
			$input_data['target_date_day'] = date('Y-m-d', $datetime);
			$input_data['target_date_time'] = date('H:i', $datetime);
		}
		$input_data['start_date_day'] = '';
		$input_data['start_date_time'] = '';
		if (array_key_exists('start_date', $input_data) && !is_empty_string($input_data['start_date'])) {
			$datetime = strtotime($input_data['start_date']);
			$input_data['start_date_day'] = date('Y-m-d', $datetime);
			$input_data['start_date_time'] = date('H:i', $datetime);
		}
		$input_data['end_date_day'] = '';
		$input_data['end_date_time'] = '';
		if (array_key_exists('end_date', $input_data) && !is_empty_string($input_data['end_date'])) {
			$datetime = strtotime($input_data['end_date']);
			$input_data['end_date_day'] = date('Y-m-d', $datetime);
			$input_data['end_date_time'] = date('H:i', $datetime);
		}
		$input_data['game_result_date_day'] = '';
		$input_data['game_result_date_time'] = '';
		if (array_key_exists('game_result_date', $input_data) && !is_empty_string($input_data['game_result_date'])) {
			$datetime = strtotime($input_data['game_result_date']);
			$input_data['game_result_date_day'] = date('Y-m-d', $datetime);
			$input_data['game_result_date_time'] = date('H:i', $datetime);
		}

		return $input_data;
	}

	public function convert_display_data($input_data, $file_list, $prefix)
	{
		$display_data = array();

		$display_data = $input_data;

		$game_status = $display_data['game_status'];
		$game_status_list = $this->Game_model->get_list('search_game_status');
		$game_status_name = '';
		if (array_key_exists($game_status, $game_status_list)) {
			$game_status_name = $game_status_list[$game_status];
		}
		$display_data['game_status_name'] = $game_status_name;

		$game_type = $this->find_game_type(array(array('where' => 'id', 'value' => $input_data['game_type_id'])));
		if (count($game_type) > 0) {
			$display_data['game_type_name'] = $game_type[0]['game_type'];
		} else {
			$display_data['game_type_name'] = '';
		}

		$game_category = $this->find_game_category(array(array('where' => 'id', 'value' => $input_data['game_category_id'])));
		if (count($game_category) > 0) {
			$display_data['game_category_name'] = $game_category[0]['game_category_name'];
		} else {
			$display_data['game_category_name'] = '';
		}

		$display_data['game_home_team'] = '';
		if ($input_data['game_home_team'] == '1') {
			$display_data['game_home_team'] = 'ホーム';
		} elseif ($input_data['game_away_team'] == '1') {
			$display_data['game_home_team'] = 'アウェイ';
		}

		$path = IMAGE_UPLOAD_DIR;
		if (!is_empty_string($prefix)) {
			$path = IMAGE_TEMPORARY_DIR . $prefix . '_';
		}

		$display_data['game_image_url'] = '';
		if (array_key_exists('game_image_url', $input_data) && !is_empty_string($input_data['game_image_url'])) {
			$file_name = $input_data['game_image_url'];
			$display_data['game_image_url'] = $this->get_file_data($path, $file_name);
		} elseif (array_key_exists('game_image_url_org', $input_data) && !is_empty_string($input_data['game_image_url_org'])) {
			$file_name = $input_data['game_image_url_org'];
			$display_data['game_image_url'] = $this->get_file_data(IMAGE_UPLOAD_DIR, $file_name);
		}

		if (!empty($input_data['race'])) {
			for ($index = 0; $index < $input_data['race_count']; $index++) {
				$display_data['race' . ($index + 1)] = $input_data['race'][$index];
			}
		}
		if (!empty($input_data['stochastic'])) {
			for ($index = 0; $index < $input_data['stochastic_count']; $index++) {
				$display_data['stochastic' . ($index + 1)] = $input_data['stochastic'][$index];
			}
		}
		for ($index = 0; $index < $input_data['game_detail_count']; $index++) {
			if (!empty($input_data['game_detail'])) {
				$display_data['game_detail' . ($index + 1)] = $input_data['game_detail'][$index];
			}
			$display_data['game_image' . ($index + 1)] = '';
			if (array_key_exists('game_image' . ($index + 1), $input_data) && !is_empty_string($input_data['game_image' . ($index + 1)])) {
				$file_name = $input_data['game_image' . ($index + 1)];
				$display_data['game_image' . ($index + 1)] = $this->get_file_data($path, $file_name);
			} elseif (array_key_exists('game_image_org', $input_data) && !is_empty_string($input_data['game_image_org'][$index])) {
				$file_name = $input_data['game_image_org'][$index];
				$display_data['game_image' . ($index + 1)] = $this->get_file_data(IMAGE_UPLOAD_DIR, $file_name);
			}
		}
		foreach ($file_list as $file_item) {
			$field_name = $file_item['field_name'];
			if (file_exists(IMAGE_TEMPORARY_DIR . $prefix . '_' . $file_item['file_path'])) {
				if (preg_match('/^game_image_url/', $field_name)) {
					$display_data[$field_name] = 'data:' . $file_item['file_type'] . ';base64,' . base64_encode(file_get_contents(IMAGE_TEMPORARY_DIR . $prefix . '_' . $file_item['file_path']));
				} elseif (preg_match('/^game_image\d+/', $field_name)) {
					$display_data[$field_name] = 'data:' . $file_item['file_type'] . ';base64,' . base64_encode(file_get_contents(IMAGE_TEMPORARY_DIR . $prefix . '_' . $file_item['file_path']));
				}
			}
		}
		if (!is_empty_string($input_data['start_date'])) {
			$display_data['start_date'] = date('Y年　n月j日 H:i', strtotime($input_data['start_date_day'] . ' ' . $input_data['start_date_time']));
		}
		if (!is_empty_string($input_data['end_date'])) {
			$display_data['end_date'] = date('Y年　n月j日 H:i', strtotime($input_data['end_date_day'] . ' ' . $input_data['end_date_time']));
		}
		if (!is_empty_string($input_data['game_result_date'])) {
			$display_data['game_result_date'] = date('Y年　n月j日 H:i', strtotime($input_data['game_result_date_day'] . ' ' . $input_data['game_result_date_time']));
		}

		return $display_data;
	}

	public function remove_temporary_file($prefix)
	{
		foreach (glob(IMAGE_TEMPORARY_DIR . $prefix . '_*') as $file_name) {
			if (preg_match('/^' . $prefix . '_.*/', basename($file_name))) {
				unlink($file_name);
			}
		}
	}

	public function file_upload($prefix, array $fields)
	{
		$config['upload_path'] = IMAGE_TEMPORARY_DIR;
		$config['allowed_types'] = 'pdf|xlsx|docx|gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);

		$file_list = array();
		$has_error = false;
		foreach ($fields as $field_name) {
			// 削除対象のファイル
			if ($this->input->post($field_name . '_remove') == '1') {
				if (file_exists(IMAGE_UPLOAD_DIR . $this->input->post($field_name . '_org'))) {
					$file_list[] = array(
						'result' => true,
						'field_name' => $field_name,
						'file_path' => null,
						'file_name' => null,
						'file_type' => null,
						'org_name' => $this->input->post($field_name . '_org'),
					);
				}
			}
			if (!array_key_exists($field_name, $_FILES)) {
				continue;
			}

			//アップロード実施
			if ($this->upload->do_upload($field_name)) {
				$file_name = $this->upload->data('file_name');
				rename($this->upload->data('full_path'), $this->upload->data('file_path') . $prefix . '_' . $file_name);
				$file_list[] = array(
					'result' => true,
					'field_name' => $field_name,
					'file_path' => $file_name,
					'file_name' => $this->upload->data('orig_name'),
					'file_type' => $_FILES[$field_name]['type'],
				);
			} else {
				if (strlen($_FILES[$field_name]['name']) > 0) {
					$has_error = true;
					$file_list[] = array(
						'result' => false,
						'field_name' => $field_name,
						'err_msg' => $this->upload->display_errors(),
					);
				}
			}
		}
		//エラーが発生している場合は正常にアップロードされたファイルを削除
		if ($has_error) {
			foreach ($file_list as $file_info) {
				if ($file_info['result'] === true && file_exists(IMAGE_TEMPORARY_DIR . $file_info['file_path'])) {
					unlink(IMAGE_TEMPORARY_DIR . $file_info['file_path']);
				}
			}
		}

		return $file_list;
	}

	public function move_temporary_file($prefix, array $fields)
	{
		foreach ($fields as $field_name) {
			// 削除対象のファイル
			if ($this->input->post($field_name . '_remove') == '1') {
				if (file_exists(IMAGE_UPLOAD_DIR . $this->input->post($field_name . '_org'))) {
					unlink(IMAGE_UPLOAD_DIR . $this->input->post($field_name . '_org'));
				}
			}

			$file_name = $this->input->post($field_name);
			$temp_file_name = $prefix . '_' . $file_name;
			if (!is_empty_string($file_name)) {
				if (file_exists(IMAGE_TEMPORARY_DIR . $temp_file_name)) {
					rename(IMAGE_TEMPORARY_DIR . $temp_file_name, IMAGE_UPLOAD_DIR . $file_name);
				}
			}
		}
	}

	public function insert_game($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('mst_game');
		$insert_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->insert('mst_game', $insert_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	public function update_game($input_data)
	{
		// 情報登録
		$columns = $this->db->list_fields('mst_game');
		$update_data = array_intersect_key($input_data, array_fill_keys($columns, null));
		$this->db->where('id', $update_data['id']);
		$this->db->update('mst_game', $update_data);
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			log_message('error', 'db error:' . $error['message']);
			return false;
		}
		return true;
	}

	public function status_update()
	{
		try {
			$log = "status_update start.\n";
			echo sprintf('%s : %s', date('Y-m-d h:i:s'), $log);

			$this->db->trans_start();

			// ゲーム開始
			$sql = 'update mst_game set game_status = 1 where game_status = 0 and start_date <= now()';
			$this->db->query($sql);

			$log = "**** game start update end.\n";
			echo sprintf('%s : %s', date('Y-m-d h:i:s'), $log);

			// ゲーム終了
			$sql = 'update mst_game set game_status = 9 where game_status = 1 and end_date <= now()';
			$this->db->query($sql);

			$log = "**** game end update end.\n";
			echo sprintf('%s : %s', date('Y-m-d h:i:s'), $log);

			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				// DB Error
				$error = $this->db->error();
				if (is_array($error)) {
					$error_message = sprintf('DB Error:%s:%s', $error['code'], $error['message']);
					echo $error_message;
					log_message('error', $error_message);
					return false;
				}
			}

			$log = "status_update complate.\n";
			echo sprintf('%s : %s', date('Y-m-d h:i:s'), $log);

			return true;
		} catch (Exception $ex) {
			$error_message = sprintf('System Error:%s:%s', $ex->getCode(), $ex->getMessage());
			echo $error_message;
			log_message('error', $error_message);

			return false;
		}
	}

	private function get_file_data($path, $file_name)
	{
		if (file_exists($path . $file_name)) {
			return 'data:' . get_mime_by_extension($file_name) . ';base64,' . base64_encode(file_get_contents($path . $file_name));
		}
		return 'data:' . get_mime_by_extension($file_name) . ';base64,';
	}
}
