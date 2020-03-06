<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_loggin_user();
		$this->load->model('Admin_model');
		$this->data['user_data'] = $this->UserData_model->get_data();
		is_loggin_admin($this->data['user_data']);
		$this->data['data_pemesanan'] = $this->User_model->get_where_data_pemesanan($this->data['user_data']['id']);
		$this->data['num_pemesanan'] = $this->User_model->get_where_num_pemesanan($this->data['user_data']['id']);
	}

	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->data['jumlah_buku'] = $this->Admin_model->get_book_num();
		$this->data['jumlah_pemesanan'] = $this->Admin_model->get_pemesanan_num();
		$this->data['jumlah_user'] = $this->Admin_model->get_user_num();
		$this->data['jumlah_admin'] = $this->Admin_model->get_admin_num();
		$this->data['jumlah_pemesanan_pending'] = $this->Admin_model->get_pemesanan_pending_num();
		$this->data['jumlah_pemesanan_bayar'] = $this->Admin_model->get_pemesanan_bayar_num();
		$this->data['laporan'] = $this->Admin_model->get_laporan();
		
		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');
		$this->load->view('Admin/index');
		$this->load->view('Templates/js/sweetalert/message');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/footer');
	}
	
}
