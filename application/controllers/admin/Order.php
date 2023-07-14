<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('CartModel');
	}

	public function index()
	{
		$data['order'] = $this->CartModel->ordersAll();

		$this->load->view('admin/header');
		$this->load->view('admin/order', $data);
		$this->load->view('admin/footer');
	}

	function update($checkout_id)
	{
		$data['detail'] = $this->CartModel->ordersDetail($checkout_id);

		if ($this->input->post())
		{
			$this->CartModel->ordersUpdate($checkout_id, $this->input->post());
			redirect('admin/order/update/'.$checkout_id, 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/orderupdate', $data);
		$this->load->view('admin/footer');
	}

	function delete($checkout_id)
	{
		$this->CartModel->ordersDelete($checkout_id);
		redirect('admin/order', 'refresh');
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/admin/Order.php */