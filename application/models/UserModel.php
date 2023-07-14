<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	function login($formulir)
	{
		$email		= $formulir['user_email'];
		$password	= sha1($formulir['user_password']);

		$data = $this->db->where('user_email', $email)->where('user_password', $password)->get('user')->row_array();

		if (empty($data))
			return 'gagal';

		$data['isLoggedUser'] = true;

		$this->session->set_userdata('user', $data);
		return 'sukses';
	}

	function profile($formulir)
	{
		$user = $this->session->userdata('user');

		$formulir['user_password'] = $formulir['user_password'] == '' ? $user['user_password'] : sha1($formulir['user_password']);
		$this->db->where('user_id', $formulir['user_id'])->update('user', $formulir);

		$user					= $this->db->where('user_id', $formulir['user_id'])->get('user')->row_array();
		$user['isLoggedUser']	= true;
		$this->session->set_userdata('user', $user);
	}

	function getAll()
	{
		return $this->db->get('user')->result_array();
	}

	function create($formulir)
	{
		$formulir['user_password'] = sha1($formulir['user_password']);
		$this->db->insert('user', $formulir);
	}

	function getDetail($user_id)
	{
		return $this->db->where('user_id', $user_id)->get('user')->row_array();
	}

	function update($user_id, $formulir)
	{
		$user = $this->getDetail($user_id);
		$formulir['user_password'] = $formulir['user_password'] == '' ? $user['user_password'] : sha1($formulir['user_password']);

		$this->db->where('user_id', $user_id)->update('user', $formulir);
	}

	function delete($user_id)
	{
		$this->db->where('user_id', $user_id)->delete('user');
	}

}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */