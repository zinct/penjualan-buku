<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_where_data_pemesanan($user_id)
	{
		$this->db->select('tb_pemesanan.*, tb_buku.*');
		$this->db->from('tb_pemesanan');
		$this->db->join('tb_buku', 'tb_pemesanan.buku_id = tb_buku.id');
		$this->db->where('user_id', $user_id);
		return $this->db->get()->result_array();
	}

	public function get_where_num_pemesanan($user_id)
	{
		return $this->db->get_where('tb_pemesanan', ['user_id' => $user_id])->num_rows();
	}

	public function insert_pemesanan($buku_id)
	{

		$nama_pelanggan = htmlspecialchars($this->input->post('nama_pelanggan', TRUE));
		$user_id = htmlspecialchars($this->input->post('user_id', TRUE));
		$telp = htmlspecialchars($this->input->post('telp', TRUE));
		$alamat = htmlspecialchars($this->input->post('alamat', TRUE));
		$kode_pos = htmlspecialchars($this->input->post('kode_pos', TRUE));
		$jumlah_buku = htmlspecialchars($this->input->post('jumlah_buku', TRUE));
		$kode_transaksi = htmlspecialchars($this->input->post('kode_transaksi', TRUE));

		$data = [
			'nama_pelanggan' => $nama_pelanggan,
			'user_id' => $user_id,
			'telp' => $telp,
			'alamat' => $alamat,
			'kode_pos' => $kode_pos,
			'buku_id' => $buku_id,
			'jumlah_buku' => $jumlah_buku,
			'kode_transaksi' => $kode_transaksi,
			'is_success' => 3
		];

		$this->db->insert('tb_pemesanan', $data);

		// Message
		$this->session->set_flashdata('success', 'Silahkan Lanjut Ke Menu Transaksi Untuk Pembayaran :)');
		$this->session->set_flashdata('jumlah_buku', $jumlah_buku);
		redirect(BASE_URL('User/index'),'refresh');

	}

	public function get_where_pemesanan($pemesanan_id)
	{
		$this->db->select('tb_pemesanan.*, tb_buku.*');
		$this->db->from('tb_pemesanan');
		$this->db->join('tb_buku', 'tb_pemesanan.buku_id = tb_buku.id');
		$this->db->where('pemesanan_id', $pemesanan_id);
		return $this->db->get()->row_array();
	}

	public function upload_bukti()
	{
		if (isset($_FILES['image']['name'])) 
		{

			$new_file_name = $_FILES['image']['name'];
			$pemesanan_id = $this->input->post('pemesanan_id', TRUE);

			if ($new_file_name) {

				$config['upload_path'] = './assets/img/bukti';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')) {

	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('danger', $error);
	                redirect(BASE_URL('User/pembayaran'),'refresh');
	            
	            } else {

	            	$new_file_name = $this->upload->data('file_name');

	            	$data = [
	            		'bukti_pembayaran' => $new_file_name,
	            		'is_success' => 2
	            	];

	            	$this->db->where('pemesanan_id', $pemesanan_id);
	            	$this->db->update('tb_pemesanan', $data);

	            	// Message
					$this->session->set_flashdata('success', 'Yey kamu Sudah Melakukan Transaksi');
					redirect(BASE_URL('User/index'),'refresh');

	            }
	        }
		}
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */