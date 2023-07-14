<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Refund extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/refund');
		$this->load->view('template/footer');
		
	}
}

/* End of file Refund.php */
/* Location: ./application/controllers/Refund.php */