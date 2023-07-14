<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('CategoryModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['product']	= $this->ProductModel->getAll();

		if ($this->input->post())
		{
			$this->ProductModel->create($this->input->post());
			redirect('admin/product', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/product', $data);
		$this->load->view('admin/footer');
	}

	public function update($product_id)
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['product']	= $this->ProductModel->getAll();
		$data['detail']		= $this->ProductModel->getDetail($product_id);

		if ($this->input->post())
		{
			$this->ProductModel->update($product_id, $this->input->post());
			redirect('admin/product', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/productupdate', $data);
		$this->load->view('admin/footer');
	}

	public function delete($product_id)
	{
		$this->ProductModel->delete($product_id);
		redirect('admin/product', 'refresh');
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */