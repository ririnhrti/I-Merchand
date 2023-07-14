<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLogged())
			redirect('', 'refresh');

		$this->load->model('MemberModel');
	}

	public function index()
	{
		$data['account'] = $this->MemberModel->detail();

		if ($this->input->post())
		{
			$this->MemberModel->update($this->input->post());
			redirect('account', 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('front/account', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */