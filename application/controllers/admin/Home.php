<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('ProductModel');
		$this->load->model('CartModel');
	}

	public function index()
	{
		$data['product']	= $this->ProductModel->low_stock();
		$data['recent']		= $this->CartModel->ordersRecent();
		$data['completed']	= $this->CartModel->ordersCompleted();

		$this->load->view('admin/header');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */