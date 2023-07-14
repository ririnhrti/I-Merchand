<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model {
	function getAll()
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		return $this->db->order_by('product_id', 'DESC')->get('product')->result_array();
	}

	function getHome()
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$product = $this->db->order_by('product_id', 'DESC')->get('product')->result_array();

		$nomor = 0;
		$data = [];
		foreach ($product as $key => $value)
		{
			$show = explode(',', $value['product_show']);
			if (in_array('home', $show))
			{
				$data[$nomor] = $value;
				$nomor++;
			}
		}

		return $data;
	}

	function getRecommend()
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		$product = $this->db->order_by('product_id', 'DESC')->get('product')->result_array();

		$nomor = 0;
		$data = [];
		foreach ($product as $key => $value)
		{
			$show = explode(',', $value['product_show']);
			if (in_array('recommend', $show))
			{
				$data[$nomor] = $value;
				$nomor++;
			}
		}

		return $data;
	}

	function getDetail($product_id)
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		return $this->db->where('product_id', $product_id)->get('product')->row_array();
	}

	function create($formulir)
	{
		$config['upload_path']		= FCPATH.'assets/img/product/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['detect_mime']		= true;

		$this->upload->initialize($config);
		$this->upload->do_upload('product_image');

		$formulir['product_image'] = $this->upload->data('file_name');

		$this->db->insert('product', $formulir);
	}

	function update($product_id, $formulir)
	{
		$config['upload_path']		= FCPATH.'assets/img/product/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['detect_mime']		= true;

		$this->upload->initialize($config);
		if ($this->upload->do_upload('product_image'))
		{
			$product	= $this->getDetail($product_id);
			$image		= $product['product_image'];
			if ($image != '')
			{
				if (file_exists(FCPATH.'assets/img/product/'.$image)) { unlink(FCPATH.'assets/img/product/'.$image); }
			}

			$formulir['product_image'] = $this->upload->data('file_name');
		}

		$this->db->where('product_id', $product_id)->update('product', $formulir);
	}

	function delete($product_id)
	{
		// hapus file kalau ada
		$product	= $this->getDetail($product_id);
		$image		= $product['product_image'];
		if ($image != '')
		{
			if (file_exists(FCPATH.'assets/img/product/'.$image))
			{
				unlink(FCPATH.'assets/img/product/'.$image);
			}
		}

		$this->db->where('product_id', $product_id)->delete('product');
	}

	function low_stock()
	{
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		return $this->db->order_by('product_stock', 'ASC')->get('product', 5)->result_array();
	}
}

/* End of file ProductModel.php */
/* Location: ./application/models/ProductModel.php */