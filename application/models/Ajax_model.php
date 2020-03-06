<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

	public function get_where_buku($id)
	{

		return $this->db->get_where('tb_buku', ['id' => $id])->row_array();
	}

}

/* End of file Ajax_model.php */
/* Location: ./application/models/Ajax_model.php */