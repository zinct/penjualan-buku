<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_book_num()
	{
		return $this->db->get('tb_buku')->num_rows();
	}

	public function get_user_num()
	{
		return $this->db->get_where('tb_user', ['role_id' => 2])->num_rows();
	}

	public function get_admin_num()
	{
		return $this->db->get_where('tb_user', ['role_id' => 1])->num_rows();
	}

	public function get_pemesanan_num()
	{
		return $this->db->get('tb_pemesanan')->num_rows();
	}

	public function get_pemesanan_pending_num()
	{
		return $this->db->get_where('tb_pemesanan', ['is_success' => 2])->num_rows();
	}

	public function get_pemesanan_bayar_num()
	{
		return $this->db->get_where('tb_pemesanan', ['is_success' => 3])->num_rows();
	}

	public function get_laporan()
	{
		$query = "SELECT SUM(pendapatan) FROM `tb_laporan`";
		return $this->db->query($query)->row_array();
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */