<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'login/logout';

$route['manage'] = 'manage/user/user_list';

$route['manage/user'] = 'manage/user/user_info';
$route['manage/user_account'] = 'manage/user/user_info/account';
$route['manage/user_list'] = 'manage/user/user_list';
$route['manage/user_regist'] = 'manage/user/user_regist';
$route['manage/user_complate'] = 'manage/user/user_regist/complate';


$route['manage/game'] = 'manage/game/game_info';
$route['manage/game_name'] = 'manage/game/game_info/game_name';
$route['manage/game_list'] = 'manage/game/game_list';
$route['manage/game_regist'] = 'manage/game/game_regist';
$route['manage/game_complate'] = 'manage/game/game_regist/complate';
$route['manage/game_stop'] = 'manage/game/game_stop';
$route['manage/game_stop_complate'] = 'manage/game/game_stop_complate';
$route['manage/game_close'] = 'manage/game/game_regist/close';

$route['manage/money_record'] = 'manage/money/money_record';
$route['manage/money_record_complate'] = 'manage/money/money_record/complate';
$route['manage/payment_list'] = 'manage/money/payment_list';
$route['manage/withdrawal_list'] = 'manage/money/withdrawal_list';

$route['manage/portion_list'] = 'manage/portion/portion_list';
$route['manage/portion_regist'] = 'manage/portion/portion_regist';
$route['manage/portion_complate'] = 'manage/portion/portion_regist/complate';


$route['manage/staff'] = 'manage/staff/staff_info';
$route['manage/staff_list'] = 'manage/staff/staff_list';
$route['manage/staff_regist'] = 'manage/staff/staff_regist';
$route['manage/staff_complate'] = 'manage/staff/staff_regist/complate';

