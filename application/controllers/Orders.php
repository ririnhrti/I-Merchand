<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
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
		$data['orders']		= $this->CartModel->orders();

		$this->load->view('template/header');
		$this->load->view('front/orders', $data);
		$this->load->view('template/footer');
	}

	function detail($checkout_id)
	{
		$data['orders'] = $this->CartModel->ordersDetail($checkout_id);

		if ($this->input->post())
		{
			$this->CartModel->ordersPayment($this->input->post());
			redirect('orders/detail/'.$checkout_id, 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('front/ordersdetail', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Orders.php */
/* Location: ./application/controllers/Orders.php */