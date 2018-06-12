<?php
defined('BASEPATH') or exit('No direct scripts access allowed');
/**
* 
*/
class tables extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pages/display_name_model');
		$this->load->model('pages/table_model');
	}	
	public function index()
	{
		$logmail = $this->session->userdata('login_email');
		if($logmail != null)
		{
		$data['name'] = $this->display_name_model->get_name($logmail);
		$data['fetch_data'] = $this->table_model->get_data();
		$this->load->view('sbadmin2/tables',$data);
		}
		else
		{
			redirect(base_url());
		}
		
	}
}