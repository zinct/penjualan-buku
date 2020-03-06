<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model');
		$this->data['user_data'] = $this->UserData_model->get_data();
		$this->data['data_pemesanan'] = $this->User_model->get_where_data_pemesanan($this->data['user_data']['id']);
		$this->data['num_pemesanan'] = $this->User_model->get_where_num_pemesanan($this->data['user_data']['id']);
	}

	public function index()
	{
		$this->data['title'] = 'Selamat Datang';
		$this->data['data_buku'] = $this->Data_model->get_buku();

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/topbar');
		$this->load->view('User/index');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/footer');
	}

	public function pemesanan()
	{
		is_loggin_user();
		is_uri_correct();

		$buku_id = $this->uri->segment(3);

		$this->form_validation->set_rules('nama_pelanggan', 'nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'no telp', 'trim|required|numeric');
		$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|numeric');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('jumlah_buku', 'jumlah buku', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {

			$this->data['title'] = 'Pemesanan';
			$this->data['data_buku'] = $this->Data_model->get_where_buku($buku_id);

			$this->load->view('Templates/header', $this->data);
			$this->load->view('Templates/sidebar');
			$this->load->view('Templates/topbar');		
			$this->load->view('User/pemesanan');
			$this->load->view('Templates/copyright');
			$this->load->view('Templates/js/sweetalert/message');
			$this->load->view('Templates/js/upload_file');
			$this->load->view('Templates/footer');

		} else {
			
			$this->User_model->insert_pemesanan($buku_id);

		}
		
	}

	public function pembayaran()
	{
		is_loggin_user();
		is_uri_correct();
		is_loggin_pemesanan($this->data['user_data']['id']);

		$this->data['title'] = 'Pembayaran';
		$this->data['data_where_pemesanan'] = $this->User_model->get_where_pemesanan($this->uri->segment(3));

		if ($this->data['data_where_pemesanan']['is_success'] == 1) {
			redirect(BASE_URL('User/index'),'refresh');
		}

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');			
		$this->load->view('User/pembayaran');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/js/upload_file');
		$this->load->view('Templates/footer');

		$this->User_model->upload_bukti();
	}
}
