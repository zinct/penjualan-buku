<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function get_buku()
	{
		return $this->db->get('tb_buku')->result_array();
	}

	public function get_where_buku($id)
	{
		return $this->db->get_where('tb_buku', ['id' => $id])->row_array();
	}

	public function insert_buku()
	{

		if (isset($_POST['insert'])) {
			$nama = $this->input->post('nama');
			$stok = $this->input->post('stok');
			$harga = $this->input->post('harga');

			$data = [
				'nama_buku' => htmlspecialchars($nama),
				'harga' => htmlspecialchars($harga),
				'stok' => htmlspecialchars($stok)
			];

			$this->db->insert('tb_buku', $data);

			// Message
			$this->session->set_flashdata('success', 'Buku berhasil di Tambahkan');
			redirect(BASE_URL('Data/index'),'refresh');
		}

	}

	public function upload_buku($old_file_name = null)
	{
		if (isset($_FILES['image']['name'])) 
		{

			$new_file_name = $_FILES['image']['name'];

			if ($new_file_name) {

				$config['upload_path'] = './assets/img/buku';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')) {

	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('danger', $error);
	                redirect(BASE_URL('Data/index'),'refresh');
	            
	            } else {          	

	            	if ($old_file_name) {
	            		unlink(FCPATH . 'assets/img/Buku/' . $old_file_name);
	            	}
	                $this->db->set('image', $new_file_name);            

	            }
	        }
		}
	}

	public function update_buku()
	{
		if (isset($_POST['update'])) {

			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$stok = $this->input->post('stok');
			$harga = $this->input->post('harga');
			$old_file_name = $this->input->post('image');
			$extension = $this->input->post('extension');

			$old_file_name = $old_file_name . '.' . $extension;

			$data = [
					'nama_buku' => htmlspecialchars($nama),
					'stok' => htmlspecialchars($stok),
					'harga' => htmlspecialchars($harga)
				];

			$this->db->where('id', $id);
			$this->upload_buku($old_file_name);

			$this->db->update('tb_buku', $data);

			

			

			// Message
			$this->session->set_flashdata('success', 'Buku berhasil di Update');
			redirect(BASE_URL('Data/index'),'refresh');

		}
		

	}

	public function delete_buku($id)
	{
		$data = $this->db->get('tb_buku', ['id' => $id])->row_array();

		if ($data['image']) {
			unlink(FCPATH . 'assets/img/Buku/' . $data['image']);
		}
		
		$this->db->delete('tb_buku', ['id' => $id]);		

		// Message
		$this->session->set_flashdata('success', 'Buku Telah di Hapus');
		redirect(BASE_URL('Data/index'),'refresh');

	}

	public function get_user()
	{
		$this->db->select('tb_user.*, tb_role.role_name');
		$this->db->from('tb_user');
		$this->db->join('tb_role', 'tb_user.role_id = tb_role.id');

		return $this->db->get()->result_array();
	}

	public function delete_user($id)
	{

		$this->db->delete('tb_user', ['id' => $id]);		

		// Message
		$this->session->set_flashdata('success', 'Buku Telah di Hapus');
		redirect(BASE_URL('Data/user'),'refresh');
	}

	public function get_laporan()
	{
		return $this->db->get('tb_laporan')->result_array();
	}

	public function get_pemesanan()
	{
		$this->db->select('tb_pemesanan.*, tb_buku.*');
		$this->db->from('tb_pemesanan');
		$this->db->join('tb_buku', 'tb_pemesanan.buku_id = tb_buku.id');

		return $this->db->get()->result_array();
	}

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */