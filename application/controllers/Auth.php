<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('MemberModel');
	}

	function login()
	{
		if ($this->input->post())
		{
			$status = $this->MemberModel->login($this->input->post());
			if ($status == 'sukses') {
				redirect('', 'refresh');
			} else {
				redirect('login', 'refresh');
			}
		}

		$this->load->view('template/login');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}

	function register()
	{
		if ($this->input->post())
		{
			$this->MemberModel->register($this->input->post());
			redirect('login', 'refresh');
		}

		$this->load->view('template/register');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */