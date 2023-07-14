<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('UserModel');
	}

	public function index()
	{
		$data['user'] = $this->session->userdata('user');

		if ($this->input->post())
		{
			$this->UserModel->profile($this->input->post());
			redirect('admin/account', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/account', $data);
		$this->load->view('admin/footer');
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/admin/Account.php */