<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isLoggedUser())
			redirect('admin/login', 'refresh');

		$this->load->model('CategoryModel');
	}

	public function index()
	{
		$data['category'] = $this->CategoryModel->getAll();

		if ($this->input->post())
		{
			$this->CategoryModel->create($this->input->post());
			redirect('admin/category', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/category', $data);
		$this->load->view('admin/footer');
	}

	public function update($category_id)
	{
		$data['category']	= $this->CategoryModel->getAll();
		$data['detail']		= $this->CategoryModel->getDetail($category_id);

		if ($this->input->post())
		{
			$this->CategoryModel->update($category_id, $this->input->post());
			redirect('admin/category', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/categoryupdate', $data);
		$this->load->view('admin/footer');
	}

	public function delete($category_id)
	{
		$this->CategoryModel->delete($category_id);
		redirect('admin/category', 'refresh');
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */