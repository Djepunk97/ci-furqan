<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reglog extends CI_Controller 
{	
	public function __construct()
	{	parent::__construct();
		$this->load->model('m_reglog');
	}

	public function index()
	{
		$this->load->view('reglog/index.php');
	}

	public function login(){
		$this->load->view('reglog/v_form_login.php');
	}

	public function register(){
		$this->load->view('reglog/v_form_register.php');
	}

	public function proses_register(){
	 $data['nama'] = $this->input->post('nama');
	 $data['email'] = $this->input->post('email');
	 $data['password'] = $this->input->post('password');
	 $data['tentang'] = $this->input->post('tentang');
	 $this->m_reglog->insert_user($data);
	 unset($data);
	}

	public function cek_login(){
		$data['email'] = $this->input->post('email');
	 	$data['password'] = $this->input->post('password');
		$cek = $this->m_reglog->db_cek_login($data)->row();
		$jumlah = count($cek);
	
		if ($jumlah > 0)
		{	// set variabel session
			$array_session = array(
			'id_user' => $cek->id_user,
			'email' => $cek->email,
			'nama' => $cek->nama,
			'level' => $cek->level
			);
			$this->session->set_userdata($array_session);
			print "berhasil";
		}else{
			print "gagal";
		}
		
		// menghapus variabel dari memory
		unset($data,$cek,$jumlah,$array_session);
	}

	public function cek_level(){
		$data['level']=$this->session->userdata('level');
		if ($data['level']==0) {
			redirect(base_url('admin'));
		}else if($data['level']==1){
			redirect(base_url('pertanyaan'));
		}else{
			redirect(base_url('reglog'));
		}
	}
}