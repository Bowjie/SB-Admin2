<?php
defined('BASEPATH') or exit('No direct scripts access allowed');
/**
* 
*/
class form extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('pages/display_name_model');
	}

	public function index()
	{
		$logmail = $this->session->userdata('login_email');
		if($logmail != null)
		{	
			$data['name'] = $this->display_name_model->get_name($logmail);
			$this->load->view('sbadmin2/forms',$data);
		}
		else
		{
			redirect(base_url());
		}
		
	}
	public function form_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('adrs', 'Address', 'required');
		$this->form_validation->set_rules('conum', 'Contact No', 'required|numeric|max_length[11]|min_length[11]',
			array(
					'max_length'	=>	'Please provide correct PH %s. Ex. 09963923981',
					'min_length'	=>	'Please provide correct PH %s. Ex. 09963923981'
			)
	);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user.user_email]',
			array(
					'is_unique'		=>	'%s already exists.'
			)
	);
		$this->form_validation->set_rules('gender', 'Gender', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('pages/form_model');
				$data = array(
				'user_fname'	 =>$this->input->post('fname'),
				'user_lname'	 =>$this->input->post('lname'),
				'user_address' 	 =>$this->input->post('adrs'),
				'user_co_num' 	 =>$this->input->post('conum'),
				'user_email'  	 =>$this->input->post('email'),
				'user_gender' 	 =>$this->input->post('gender')
			);
				$this->form_model->insert_data($data);

				redirect(site_url('pages/form/inserted'));
		}
		else
		{
			$this->index();
		}
	}
	public function inserted()
	{
		$this->index();
	}	
}

