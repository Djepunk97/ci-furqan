<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pertanyaan extends CI_Model 
{	function __construct()
	{	parent::__construct();
	}

	function daftar_pertanyaan()
	{	$query = $this->db->query("SELECT * 
			FROM pertanyaan order by id_pertanyaan asc");
		
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
	}

	function tambah_pertanyaan($data)
	{	
		// query binding ditandai dengan "?" untuk security
		$this->db->query("insert into pertanyaan (nim,nama) values
			(?,?)", array($data['nim'],$data['nama']));	
		// menghapus variabel dari memory
		unset($data);
	}
}