<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('UserModel');
	}

	public function index()
	{
		$data['user'] = $this->UserModel->getAll();

		if ($this->input->post())
		{
			$this->UserModel->create($this->input->post());
			redirect('admin/user', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/user', $data);
		$this->load->view('admin/footer');
	}

	public function update($user_id)
	{
		$data['user']	= $this->UserModel->getAll();
		$data['detail']	= $this->UserModel->getDetail($user_id);

		if ($this->input->post())
		{
			$this->UserModel->update($user_id, $this->input->post());
			redirect('admin/user', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/userupdate', $data);
		$this->load->view('admin/footer');
	}

	public function delete($user_id)
	{
		$this->UserModel->delete($user_id);
		redirect('admin/user', 'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */