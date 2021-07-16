<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['menu_item'] = array(
	// アカウント
	array(
		'name' => 'アカウント',
		'items' => array(
			array(
				'name' => 'アカウント一覧',
				'menu_id' => 'manage/user_list',
			),
			array(
				'name' => 'アカウント追加',
				'menu_id' => 'manage/user_regist',
			),
		),
	),

	// ゲーム
	array(
		'name' => 'ゲーム',
		'items' => array(
			array(
				'name' => 'ゲーム一覧',
				'menu_id' => 'manage/game_list',
			),
			array(
				'name' => 'ゲーム追加',
				'menu_id' => 'manage/game_regist',
			),
			array(
				'name' => '受付停止',
				'menu_id' => 'manage/game_stop',
			),
		),
	),

	// 入出金
	array(
		'name' => '入出金・返金',
		'items' => array(
			array(
				'name' => '入出金記録',
				'menu_id' => 'manage/money_record',
			),
			array(
				'name' => '入金履歴',
				'menu_id' => 'manage/payment_list',
			),
			array(
				'name' => '出金履歴',
				'menu_id' => 'manage/withdrawal_list',
			),
		),
	),

	// 設定
	array(
		'name' => '設定',
		'items' => array(
			array(
				'name' => '取り分設定',
				'menu_id' => 'manage/portion_regist',
			),
			array(
				'name' => '取り分一覧',
				'menu_id' => 'manage/portion_list',
			),
		),
	),

	// スタッフ管理
	array(
		'name' => 'スタッフ',
		'items' => array(
			array(
				'name' => 'スタッフ一覧',
				'menu_id' => 'manage/staff_list',
			),
			array(
				'name' => 'スタッフ追加',
				'menu_id' => 'manage/staff_regist',
			),
		),
	),

);

$config['role_type'] = array(
	'0' => 'スタッフ',
	'1' => '管理者',
);

$config['search_approved_flag'] = array(
	'1' => '済み',
	'0' => '未登録',
);

$config['search_user_delete_flag'] = array(
	'1' => '入会',
	'0' => '退会',
);

$config['search_bet_count'] = array(
	'0-100' => '100人以下',
	'101-200' => '101~200人',
	'201-300' => '201~300人',
	'301-400' => '301~400人',
	'401-500' => '401~500人',
	'501-600' => '501~600人',
	'601-700' => '601~700人',
	'701-800' => '701~800人',
	'801-900' => '801~900人',
	'901-999' => '901~999人',
	'1000-' => '1000人以上',
);

$config['search_total_money'] = array(
	'0-10000' => '10000円以下',
	'10001-20000' => '10001~20000円',
	'20001-30000' => '20001~30000円',
	'30001-40000' => '30001~40000円',
	'40001-50000' => '40001~50000円',
	'50001-60000' => '50001~60000円',
	'60001-70000' => '60001~70000円',
	'70001-80000' => '70001~80000円',
	'80001-90000' => '80001~90000円',
	'90001-99999' => '90001~99999円',
	'100000-' => '100000円以上',
);

$config['search_game_status'] = array(
	'1' => '開始',
	'9' => '終了',
	'0' => '準備中',
	'-1' => '非公開',
);

$config['money_action'] = array(
	'1' => '入金',
	'2' => '出金',
	'3' => '返金',
);
