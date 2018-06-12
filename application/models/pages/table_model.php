<?php
defined('BASEPATH') or exit('No direct scripts access allowed');
/**
* 
*/
class table_model extends CI_Model
{
	function __construct()  
    {  
         parent::__construct();  
    }  
	function get_data()
	{
		$query = $this->db->GET('tbl_user');
		return $query->result();
	}
}