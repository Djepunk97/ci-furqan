<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pertanyaan extends CI_Model 
{	function __construct()
	{	parent::__construct();
	}

	function daftar_pertanyaan()
	{	$query = $this->db->query("SELECT * FROM pertanyaan order by id_pertanyaan asc");
		return $query;
		$query = null;
	}

	function daftar_kategori()
	{	$query = $this->db->query("SELECT * FROM kategori order by id_kategori asc");
		return $query;
		$query = null;
	}

	function daftar_jawaban($id)
	{	$query = $this->db->query("SELECT * FROM jawaban WHERE id_pertanyaan=".$id."");
		return $query;
		$query = null;
	}

	function select_pertanyaan_id($id)
	{	$query = $this->db->query("SELECT * FROM pertanyaan WHERE id_pertanyaan=".$id);
		return $query;
		$query = null;
		unset($id);
	}

	function tambah_pertanyaan($data)
	{	
		// query binding ditandai dengan "?" untuk security
		$this->db->query("insert into pertanyaan (judul,isi,id_kategori,id_user) values
			(?,?,?,?)", array($data['judul'],$data['isi'],$data['kategori'],$data['id_user']));	
		// menghapus variabel dari memory
		unset($data);
	}

	function tambah_jawaban($data)
	{	
		// query binding ditandai dengan "?" untuk security
		$this->db->query("insert into jawaban (isi,id_user,id_pertanyaan) values
			(?,?,?)", array($data['isi'],$data['id_user'],$data['id_pertanyaan']));	
		// menghapus variabel dari memory
		unset($data);
	}
	
	function putus_koneksi()
	{	$this->db = null;
	}
}