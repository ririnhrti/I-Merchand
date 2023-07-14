<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/about');
		$this->load->view('template/footer');
		
	}
}

/* End of file About.php */
/* Location: ./application/controllers/About.php */