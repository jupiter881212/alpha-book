<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_empty_string')) {
	function is_empty_string($value)
	{
		if ($value == null || $value == '') {
			return true;
		}
		return false;
	}
}
