<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SliderModel extends CI_Model {
	function getAll()
	{
		return $this->db->get('slider')->result_array();
	}
}

/* End of file SliderModel.php */
/* Location: ./application/models/SliderModel.php */