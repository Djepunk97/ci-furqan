<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pertanyaan');
	}


	public function index(){
		$data['nama']=$this->session->userdata('nama');
		if (isset($data['nama'])){
			$this->load->view('pertanyaan/index',$data);
		}else{
			$this->load->view('pertanyaan/index');
		}
		unset($data);
	}

	public function form_pertanyaan(){
		$data['daftar_kategori']=$this->m_pertanyaan->daftar_kategori()->result();		
		$this->load->view('pertanyaan/form',$data);
		unset($data);
	}

	public function cek_sesion(){
		$data['id_user']=$this->session->userdata('id_user');
		if (isset($data['id_user'])){
			print "berhasil";
		}else{
			print "gagal";
		}
		unset($data);
	}

	public function v_all_pertanyaan(){
		$data['daftar_pertanyaan']=$this->m_pertanyaan->daftar_pertanyaan()->result();
		$this->load->view('pertanyaan/list_pertanyaan',$data);
		unset($data);
	}

	public function v_pertanyaan(){
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$data['pertanyaan'] = $this->m_pertanyaan->select_pertanyaan_id($id_pertanyaan)->row();
		$data['daftar_jawaban']=$this->m_pertanyaan->daftar_jawaban($id_pertanyaan)->result();
		$this->load->view('pertanyaan/detail_pertanyaan', $data);
		unset($id_pertanyaan,$data);
	}

	public function proses_submit_pertanyaan(){
		$data['id_user']=$this->session->userdata('id_user');
		$data['judul']=$this->input->post('judul');
		$data['isi']=$this->input->post('isi');
		$data['kategori']=$this->input->post('kategori');
		$this->m_pertanyaan->tambah_pertanyaan($data);
		unset($data);
	}

	public function proses_submit_jawaban(){
		$data['id_user']=$this->session->userdata('id_user');
		$data['isi']=$this->input->post('isi');
		$data['id_pertanyaan']=$this->input->post('id_pertanyaan');
		$this->m_pertanyaan->tambah_jawaban($data);
		unset($data);
	}

	public function logout()
	{	// memutus koneksi di model m_aplikasi function putus_koneksi
		$this->m_pertanyaan->putus_koneksi();	
		
		// semua variabel session akan dihapus dari memory
		$array_session = $this->session->all_userdata();
		$this->session->unset_userdata($array_session);	
		unset($array_session);
		
		// memutus session
		$this->session->sess_destroy();		
		
		// kembali lagi ke login
		redirect(base_url('reglog'));
	}

}