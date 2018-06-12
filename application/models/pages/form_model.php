<?php
defined('BASEPATH') or exit('No direct scripts access allowed');

/**
* 
*/
class form_model extends CI_Model
{
	
	function insert_data($data)
	{
		$this->db->insert('tbl_user',$data);
	}
}