<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {
	function getAll()
	{
		$member = $this->session->userdata('member');

		$this->db->join('product', 'cart.product_id = product.product_id', 'left');
		$this->db->join('category', 'product.category_id = category.category_id', 'left');
		return $this->db->where('member_id', $member['member_id'])->get('cart')->result_array();
	}

	function addProduct($formulir)
	{
		$member = $this->session->userdata('member');

		$masuk['member_id']		= $member['member_id'];
		$masuk['product_id ']	= $formulir['product_id'];
		$masuk['cart_qty ']		= $formulir['cart_qty'];

		$this->db->insert('cart', $masuk);

		$this->db->set('product_stock', 'product_stock-'.$formulir['cart_qty'], FALSE)->where('product_id', $formulir['product_id'])->update('product');
	}

	function deleteProduct($cart_id)
	{
		$detail = $this->db->where('cart_id', $cart_id)->get('cart')->row_array();
		$this->db->set('product_stock', 'product_stock+'.$detail['cart_qty'], FALSE)->where('product_id', $detail['product_id'])->update('product');

		$this->db->where('cart_id', $cart_id)->delete('cart');
	}

	function checkout($formulir)
	{
		$member = $this->session->userdata('member');

		$jumlah_checkout 	= $this->db->get('checkout')->num_rows();
		$next_checkout 		= str_pad($jumlah_checkout + 1, 4, '0', STR_PAD_LEFT);
		$checkout_number 	= date('ym').$next_checkout;

		$checkout['member_id']			= $member['member_id'];
		$checkout['checkout_number']	= $checkout_number;
		$checkout['checkout_total']		= $formulir['checkout_total'];
		$checkout['checkout_delivery']	= $formulir['checkout_delivery'];
		$checkout['checkout_discount']	= $formulir['checkout_discount'];
		$checkout['checkout_payment']	= $formulir['checkout_payment'];
		$checkout['checkout_status']	= 'pending';
		$checkout['checkout_datetime']	= date('Y-m-d H:i:s');

		$this->db->insert('checkout', $checkout);
		$checkout_id = $this->db->insert_id();

		$cart = $this->db->where('member_id', $member['member_id'])->get('cart')->result_array();

		foreach ($cart as $key => $value)
		{
			$checkout_product['checkout_id']			= $checkout_id;
			$checkout_product['product_id']				= $value['product_id'];
			$checkout_product['checkout_product_qty']	= $value['cart_qty'];

			$this->db->insert('checkout_product', $checkout_product);
		}

		$this->db->where('member_id', $member['member_id'])->delete('cart');

		$destination['checkout_id']					= $checkout_id;
		$destination['destination_first_name']		= $formulir['destination_first_name'];
		$destination['destination_last_name']		= $formulir['destination_last_name'];
		$destination['destination_company_name']	= $formulir['destination_company_name'];
		$destination['destination_country']			= $formulir['destination_country'];
		$destination['destination_city']			= $formulir['destination_city'];
		$destination['destination_address']			= $formulir['destination_address'];
		$destination['destination_telp']			= $formulir['destination_telp'];
		$destination['destination_mobile']			= $formulir['destination_mobile'];
		$destination['destination_notes']			= $formulir['destination_notes'];

		$this->db->insert('destination', $destination);
	}

	function orders()
	{
		$member = $this->session->userdata('member');
		return $this->db->where('member_id', $member['member_id'])->get('checkout')->result_array();
	}

	function ordersDetail($checkout_id)
	{
		$this->db->join('member', 'checkout.member_id = member.member_id', 'left');
		$this->db->join('destination', 'checkout.checkout_id = destination.checkout_id', 'left');
		$data = $this->db->where('checkout.checkout_id', $checkout_id)->get('checkout')->row_array();


		$this->db->join('product', 'checkout_product.product_id = product.product_id', 'left');
		$data['product'] = $this->db->where('checkout_id', $checkout_id)->get('checkout_product')->result_array();

		return $data;
	}

	function ordersPayment($formulir)
	{
		$detail = $this->ordersDetail($formulir['checkout_id']);

		$config['upload_path']		= FCPATH.'assets/img/payment/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['detect_mime']		= true;

		$this->upload->initialize($config);
		if ($this->upload->do_upload('checkout_file'))
		{
			$detail = $this->ordersDetail($formulir['checkout_id']);
			$image	= $detail['checkout_file'];
			if ($image != '')
			{
				if (file_exists(FCPATH.'assets/img/payment/'.$image)) { unlink(FCPATH.'assets/img/payment/'.$image); }
			}

			$checkout_file = $this->upload->data('file_name');
		}

		$checkout_file = $this->upload->data('file_name');

		$this->db->where('checkout_id', $formulir['checkout_id']);
		$this->db->set('checkout_file', $checkout_file)->set('checkout_status', 'checking')->update('checkout');
	}

	function ordersAll()
	{
		$this->db->join('member', 'checkout.member_id = member.member_id', 'left');
		return $this->db->get('checkout')->result_array();
	}

	function ordersUpdate($checkout_id, $formulir)
	{
		$this->db->where('checkout_id', $checkout_id)->update('checkout', $formulir);
	}

	function ordersDelete($checkout_id)
	{
		$this->db->where('checkout_id', $checkout_id)->delete('checkout_product');
		$this->db->where('checkout_id', $checkout_id)->delete('destination');
		$this->db->where('checkout_id', $checkout_id)->delete('checkout');
	}

	function ordersRecent()
	{
		$this->db->join('member', 'checkout.member_id = member.member_id', 'left');
		$this->db->order_by('checkout_datetime', 'DESC');
		return $this->db->where_in('checkout_status', ['pending', 'checking', 'packing', 'sending', 'canceled'])->get('checkout', 5)->result_array();
	}

	function ordersCompleted()
	{
		$this->db->join('member', 'checkout.member_id = member.member_id', 'left');
		$this->db->order_by('checkout_datetime', 'DESC');
		return $this->db->where_in('checkout_status', ['finished'])->get('checkout', 5)->result_array();
	}
}

/* End of file CartModel.php */
/* Location: ./application/models/CartModel.php */