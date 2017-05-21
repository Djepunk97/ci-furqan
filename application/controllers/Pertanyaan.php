<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pertanyaan');
		$this->load->model('m_vote');
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
		$data['daftar_pertanyaan']=$this->m_pertanyaan->daftar_pertanyaanUp()->result();		
		
		$this->load->view('pertanyaan/list_pertanyaan',$data);

		unset($data);
	}

	public function v_pertanyaan($id_pertanyaan = false){
		if($id_pertanyaan!==false)
		{
			$id_pertanyaan = $id_pertanyaan;		
		}else
		{
			$id_pertanyaan = $this->input->post('id_pertanyaan');
		}
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
		// $id_pertanyaan = $this->m_pertanyaan->lastInsertId();
		$id_pertanyaan = $this->m_pertanyaan->lastInsertId();
		
		$vote          = 0;
		
		$this->v_vote_pertanyaan($id_pertanyaan,$vote);

		
		unset($data);
	}

	public function proses_submit_jawaban(){
		$data['id_user']=$this->session->userdata('id_user');
		$data['isi']=$this->input->post('isi');
		$data['id_pertanyaan']=$this->input->post('id_pertanyaan');
		$this->m_pertanyaan->tambah_jawaban($data);

		$id_jawaban    = $this->m_pertanyaan->lastInsertId();
		$vote          = 0;
		$id_pertanyaan = $data['id_pertanyaan'];
		$this->v_vote_jawaban($id_jawaban,$vote,$id_pertanyaan);

		unset($data);
	}

	// FUNCTION VOTING ------------------------------------

	public function v_vote_pertanyaan($id_pertanyaan = false,$vote = false){

		$data['id_user']       = $this->session->userdata('id_user');
		
		if($id_pertanyaan!==false && $vote!==false)
		{
			$data['value']         = $vote;
			$data['id_pertanyaan'] = $id_pertanyaan;
			
			$this->m_vote->insertVoteTanya($data);
			$this->v_all_pertanyaan();
		}else
		{
			$data['value']         = $this->input->post('value');
			$data['id_pertanyaan'] = $this->input->post('id_pertanyaan');

			$cek_vote = $this->m_vote->getVoteTanyaById($data);

			if(sizeof($cek_vote)>0){

				$result = $cek_vote->row()->value_vote;
				if($result>0 || $result<0)
					{	
						$data['value'] = 0;
						$this->m_vote->updateVoteTanya($data);
						$this->v_all_pertanyaan();
					}else
					{
						$this->m_vote->updateVoteTanya($data);
						$this->v_all_pertanyaan();
					}
			}else
			{
				$this->m_vote->insertVoteTanya($data);
				$this->v_all_pertanyaan();
			}
			
		}
		
		unset($id_pertanyaan,$data);
	}

	public function v_vote_jawaban($id_jawaban = false,$vote = false,$id_pertanyaan=false){

		$data['id_user']       = $this->session->userdata('id_user');

		if($id_jawaban!==false && $vote!==false)
		{
			$data['value']         = $vote;
			$data['id_jawaban']    = $id_jawaban;
			$id_pertanyaan = $id_pertanyaan;

			$this->m_vote->insertVoteJawaban($data);
		}else
		{
			$data['value']         = $this->input->post('value');
			$data['id_jawaban']    = $this->input->post('id_jawaban');

			$cek_votes = $this->m_vote->getVotejawabanById($data);

			if(sizeof($cek_votes)>0){

				// $result = $cek_votes->row()->value_vote;			
				$result = $cek_votes->result()->nilai;
				if($result>0 || $result<0)
				{	
					$data['value'] = 0;
					$this->m_vote->updateVoteJawaban($data);
					$this->v_pertanyaan($id_pertanyaan);
				}else
				{
					$this->m_vote->updateVoteJawaban($data);
					$this->v_pertanyaan($id_pertanyaan);
				}
			}else
			{
				$this->m_vote->insertVoteJawaban($data);
				$this->v_pertanyaan($id_pertanyaan);
			}
			
		}
		
		unset($id_pertanyaan,$data);
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