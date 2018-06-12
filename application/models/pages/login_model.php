<?php
defined('BASEPATH') or exit('No direct scripts access allowed');
/**
* 
*/
class login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}		
	function login_user($email, $pwd)
	{
		$this->db->WHERE('login_email',$email);
		$this->db->WHERE('login_pwd', $pwd);
		$query = $this->db->GET('tbl_login_user');
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}