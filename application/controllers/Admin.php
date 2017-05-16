<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('m_admin');		
	}


	public function index()
	{
		$this->load->view('admin/index');
	}

	public function home()
	{
		$this->load->view('admin/home');
	}

	public function crud()
	{
		$this->load->view('admin/crud');
	}

	public function table(){
		$table['table']=$this->input->post('table');		
		$this->load->view('admin/table', $table);
	}

	public function logout()
	{	// memutus koneksi di model m_aplikasi function putus_koneksi
		$this->m_admin->putus_koneksi();	
		
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
