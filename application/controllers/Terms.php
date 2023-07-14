<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/terms');
		$this->load->view('template/footer');
		
	}
}

/* End of file Terms.php */
/* Location: ./application/controllers/Terms.php */