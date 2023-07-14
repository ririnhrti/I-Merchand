<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->model('CartModel');
	}

	public function index()
	{
		$data['recommend']	= $this->ProductModel->getRecommend();

		$this->load->view('template/header');
		$this->load->view('front/productdetail', $data);
		$this->load->view('template/footer');
	}

	public function detail($product_id)
	{
		$data['recommend']	= $this->ProductModel->getRecommend();
		$data['product']	= $this->ProductModel->getDetail($product_id);

		if ($this->input->post())
		{
			if (!isLogged())
				redirect('login', 'refresh');

			$this->CartModel->addProduct($this->input->post());
			redirect('cart', 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('front/productdetail', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */