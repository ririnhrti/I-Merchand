<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLogged())
			redirect('', 'refresh');

		$this->load->model('CartModel');
	}

	public function index()
	{
		$data['cart'] = $this->CartModel->getAll();

		$this->load->view('template/header');
		$this->load->view('front/cart', $data);
		$this->load->view('template/footer');
	}

	public function add($product_id)
	{
		if (!isLogged())
			redirect('login', 'refresh');

		$this->CartModel->addProduct(['product_id' => $product_id, 'cart_qty' => 1]);
		redirect('cart', 'refresh');
	}

	public function update()
	{

	}

	public function delete($cart_id)
	{
		$this->CartModel->deleteProduct($cart_id);
		redirect('cart', 'refresh');		
	}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */