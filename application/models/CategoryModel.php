<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryModel extends CI_Model {
	function getAll()
	{
		return $this->db->get('category')->result_array();
	}

	function create($formulir)
	{
		$this->db->insert('category', $formulir);
	}

	function getDetail($category_id)
	{
		return $this->db->where('category_id', $category_id)->get('category')->row_array();
	}

	function update($category_id, $formulir)
	{
		$this->db->where('category_id', $category_id)->update('category', $formulir);
	}

	function delete($category_id)
	{
		$this->db->where('category_id', $category_id)->delete('category');
	}

}

/* End of file CategoryModel.php */
/* Location: ./application/models/CategoryModel.php */