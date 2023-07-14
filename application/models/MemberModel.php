<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {
	function login($formulir)
	{
		$email		= $formulir['member_email'];
		$password	= sha1($formulir['member_password']);

		$data = $this->db->where('member_email', $email)->where('member_password', $password)->get('member')->row_array();

		if (empty($data))
			return 'gagal';

		$data['isLogged'] = true;

		$this->session->set_userdata('member', $data);
		return 'sukses';
	}

	function register($formulir)
	{
		$masuk['member_email']		= $formulir['member_email'];
		$masuk['member_password']	= sha1($formulir['member_password']);
		$this->db->insert('member', $masuk);
	}

	function detail()
	{
		$member = $this->session->userdata('member');
		return $this->db->where('member_id', $member['member_id'])->get('member')->row_array();
	}

	function update($formulir)
	{
		$this->db->where('member_id', $formulir['member_id'])->update('member', $formulir);

		$member				= $this->db->where('member_id', $formulir['member_id'])->get('member')->row_array();
		$member['isLogged']	= true;
		$this->session->set_userdata('member', $member);
	}
}

/* End of file MemberModel.php */
/* Location: ./application/models/MemberModel.php */