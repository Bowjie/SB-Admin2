<?php
defined('BASEPATH') or exit('No direct scripts access allowed');
/**
* 
*/
class display_name_model extends CI_Model
{
	
	function get_name($logmail)
	{	
		$this->db->select('user_fname, user_lname');
		$this->db->where('user_email', $logmail);
		$query = $this->db->get('tbl_user');
		
		return $query->result();
	}
}