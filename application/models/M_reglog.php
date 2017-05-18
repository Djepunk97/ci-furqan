<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reglog extends CI_Model 
{	
	function __construct()
	{	parent::__construct();
	}

	function insert_user($data)
	{	// query binding ditandai dengan "?" untuk security
		$this->db->query("insert into user (id_user,nama,email,password,tentang,level) values(?,?,?,md5(?),?,?)",
		 array('',$data['nama'],$data['email'],$data['password'],$data['tentang'],'1'));
		
		
		// menghapus variabel dari memory
		unset($data);
	}

	function db_cek_login($data)
	{	// query binding ditandai dengan "?" untuk security
		$query = $this->db->query("select * from user where email = ? and password = md5(?)",
			array($data['email'],$data['password']));
			
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($data);		
	}	

}