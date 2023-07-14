<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoryModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['product']	= $this->ProductModel->getAll();

		$this->load->view('template/header');
		$this->load->view('front/catalog', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Catalog.php */
/* Location: ./application/controllers/Catalog.php */