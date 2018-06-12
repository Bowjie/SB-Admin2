<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sbadmin2 extends CI_Controller
{
	public function index()
	{
		if($this->session->userdata('login_email') == null)
		{
		$this->load->view('sbadmin2/login');
		}else{
			$this->dashboard();
		}
	}
	public function home()
	{	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
		{	
			$email = $this->input->POST('email');
			$pwd = $this->input->POST('password');

			$this->load->model('pages/login_model');
			if($this->login_model->login_user($email, $pwd))
			{
				$session_data = array(
					'login_email'	=>	$email
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('sbadmin2/dashboard'));
			}
			else
			{
				 $one = $this->session->set_flashdata('error', '
						 <div class="alert alert-danger alert-dismissible fade-in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> Invalid Username Or Password
                         </div>  
					');
				 $two = $this->session->set_flashdata('error_email', $email);
				 $three = $this->session->set_flashdata('error_pwd', $pwd );

				redirect(base_url());
			}
		}
		else
		{
			$this->index();
		}
	}
	function dashboard()
	{
		$logmail = $this->session->userdata('login_email');
		if($logmail != null)
		{
			$this->load->model('pages/display_name_model');
			$data['name'] = $this->display_name_model->get_name($logmail);
			$this->load->view('sbadmin2/index',$data);
		}
		else
		{
			redirect(base_url());
		}
		
	}
	function logout()
	{
		$this->session->unset_userdata('login_email');
		redirect(base_url());
	}
}