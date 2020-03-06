<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {

	public function get_data_pemesanan()
	{
		$this->db->select('tb_pemesanan.*, tb_buku.*');
		$this->db->from('tb_pemesanan');
		$this->db->join('tb_buku', 'tb_pemesanan.buku_id = tb_buku.id');
		return $this->db->get()->result_array();
	}

	public function konfirmasi()
	{
		if (isset($_POST['konfirmasi'])) {
			
			$pesanan_id = $this->input->post('pesanan_id');
			$pendapatan = $this->input->post('pendapatan');
			$buku_id = $this->input->post('buku_id');
			$jumlah_buku = $this->input->post('jumlah_buku');

			$data_buku = $this->db->get_where('tb_buku', ['id' => $buku_id])->row_array();

			$hasil_buku = $data_buku['stok'] - $jumlah_buku;

			$this->db->where('id', $buku_id);
			$this->db->update('tb_buku', ['stok' => $hasil_buku]);

			$data_pemesanan = [
				'is_success' => 1
			];

			$data_laporan = [
				'pendapatan' => $pendapatan
			];

			$this->db->insert('tb_laporan', $data_laporan);

			$this->db->where('pemesanan_id', $pesanan_id);
			$this->db->update('tb_pemesanan', $data_pemesanan);

			// Message
			$this->session->set_flashdata('success', 'Berhasil Melakukan Konfirmasi');
			redirect(BASE_URL('Info/index'),'refresh');
		}
	}

	public function gagalkan()
	{
		if (isset($_POST['gagalkan'])) {
			
			$pesanan_id = $this->input->post('pesanan_id');

			$data_pemesanan = [
				'is_success' => 4
			];

			$this->db->where('pemesanan_id', $pesanan_id);
			$this->db->update('tb_pemesanan', $data_pemesanan);

			// Message
			$this->session->set_flashdata('success', 'Mengaggalkan Pesanan Pelanggan');
			redirect(BASE_URL('Info/index'),'refresh');
		}
	}

	public function delete_pemesanan($pemesanan_id)
	{
		$data = $this->db->get_where('tb_pemesanan', ['pemesanan_id' => $pemesanan_id])->row_array();

		if ($data['bukti_pembayaran']) {
			unlink(FCPATH . 'assets/img/bukti/' . $data['bukti_pembayaran']);
		}
		
		$this->db->delete('tb_pemesanan', ['pemesanan_id' => $pemesanan_id]);

		// Message
		$this->session->set_flashdata('success', 'Pemesanan Berhasil Di Hapus');
		redirect(BASE_URL('Info/index'),'refresh');
	}

}

/* End of file Info_model.php */
/* Location: ./application/models/Info_model.php */