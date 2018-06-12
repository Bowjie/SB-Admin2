<?php
defined('BASEPATH') or exit('No direct scripts access allowed');

/**
* 
*/
class home_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->view('angularjsview/index');
	}
}