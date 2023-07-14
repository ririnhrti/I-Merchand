<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('UserModel');
	}

	function login()
	{
		if ($this->input->post())
		{
			$status = $this->UserModel->login($this->input->post());
			$status == 'gagal' ? redirect('admin', 'refresh') : redirect('admin/home', 'refresh');
		}

		$this->load->view('admin/login');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */