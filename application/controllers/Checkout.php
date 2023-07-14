<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLogged())
			redirect('', 'refresh');

		$this->load->model('MemberModel');
		$this->load->model('CartModel');
	}

	public function index()
	{
		$data['account']	= $this->MemberModel->detail();
		$data['cart']		= $this->CartModel->getAll();

		if (empty($data['cart']))
			redirect('account', 'refresh');

		if ($this->input->post())
		{
			$this->CartModel->checkout($this->input->post());
			redirect('orders', 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('front/checkout', $data);
		$this->load->view('template/footer');		
	}

}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */