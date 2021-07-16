<?php
final class Account extends CI_Controller
{
    public function __construct()
    {
        var_dump('test');
    }
    public function register()
    {
        var_dump($this->input->post());
        exit;
    }
}