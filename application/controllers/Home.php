<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SliderModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data['slider']		= $this->SliderModel->getAll();
		$data['home']		= $this->ProductModel->getHome();
		$data['recommend']	= $this->ProductModel->getRecommend();

		$this->load->view('template/header');
		$this->load->view('front/home', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */