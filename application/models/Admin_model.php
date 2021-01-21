<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{	
	public function save_stock($stock_values,$category)
	{
		
			$save_stock = "('".$stock_values."','".$category."')";

		$data = $this->db->query("INSERT INTO tbl_stocks (shortname,category) VALUES $save_stock");
	}
	public function delete_stock($stock_values,$category)
	{
		
		$data = $this->db->query("DELETE FROM tbl_stocks WHERE shortname = '$stock_values' AND category = $category");
	}
	public function load_stock($category)
	{
		
		$data = $this->db->query("SELECT shortname FROM tbl_stocks WHERE category = '$category'")->result_array();
		
		return $data;
	}

	public function check_login($username,$password)
	{
		
		$data = $this->db->query("SELECT username,password FROM tbl_stock_admin WHERE username = '$username' AND password = '$password'")->result_array();
		
		return $data;
	}

	
} 