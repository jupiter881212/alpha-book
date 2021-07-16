<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_menu($role_type, $get_first_item = false)
	{
		$menu = $this->get_list('menu_item');
		$read_role = array();

		$role = $this->find_role(array(array('where' => 'role_type', 'value' => $role_type)));
		if (is_array($role)) {
			$read_role = array_combine(array_column($role, 'menu_id'), array_column($role, 'read_flag'));
		}

		$display_menu = array();
		foreach ($menu as $menu_item) {
			$display_menu_item = array();
			foreach ($menu_item['items'] as $sub_menu) {
				$menu_id = $sub_menu['menu_id'];
				if (array_key_exists($menu_id, $read_role) && $read_role[$menu_id] == 1) {
					$display_menu_item[] = $sub_menu;
				}
			}
			if (count($display_menu_item) > 0) {
				if ($get_first_item == true) {
					return $display_menu_item[0];
				}

				$display_menu[] = array(
					'name' => $menu_item['name'],
					'items' => $display_menu_item,
				);
			}
		}

		return $display_menu;
	}

}