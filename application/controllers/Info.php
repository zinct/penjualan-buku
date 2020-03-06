<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_loggin_user();
		$this->load->model('Info_model');
		$this->data['user_data'] = $this->UserData_model->get_data();
		is_loggin_admin($this->data['user_data']);
		$this->data['data_pemesanan'] = $this->User_model->get_where_data_pemesanan($this->data['user_data']['id']);
		$this->data['num_pemesanan'] = $this->User_model->get_where_num_pemesanan($this->data['user_data']['id']);
		$this->data['all_data_pemesanan'] = $this->Info_model->get_data_pemesanan();
	}

	public function index()
	{
		$this->data['title'] = 'Info Pemesanan';

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');
		$this->load->view('Info/index');
		$this->load->view('Templates/js/konfirmasi_pesanan');
		$this->load->view('Templates/js/sweetalert/delete');
		$this->load->view('Templates/js/sweetalert/message');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/footer');

		$this->Info_model->konfirmasi();
		$this->Info_model->gagalkan();

	}

	public function deletepemesanan($pemesanan_id)
	{
		$this->Info_model->delete_pemesanan($pemesanan_id);
	}

}

/* End of file Info.php */
/* Location: ./application/controllers/Info.php */