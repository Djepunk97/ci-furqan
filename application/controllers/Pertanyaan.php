<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model->('m_pertanyaan');
	}


	public function index(){
		$data['page'] = 'daftar_pertanyaan';
		$data['daftar_pertanyaan'] = $this->m_pertanyaan->daftar_mahasiswa()->result();
		$this->load->view('pertanyaan/index',$data);
		unset($data);
	}


}