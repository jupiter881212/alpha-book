<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		//$this->load->model('Login_model');
	}

	public function index()
	{
        $view_data = null;
        $this->view_show('user/home', $view_data);	
	}
}
