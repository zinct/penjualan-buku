<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_loggin_user();
		$this->load->model('Data_model');
		$this->data['user_data'] = $this->UserData_model->get_data();
		is_loggin_admin($this->data['user_data']);
		$this->data['data_pemesanan'] = $this->User_model->get_where_data_pemesanan($this->data['user_data']['id']);
		$this->data['num_pemesanan'] = $this->User_model->get_where_num_pemesanan($this->data['user_data']['id']);
	}

	public function index()
	{
		$this->data['title'] = 'Data Buku';
		$this->data['data_buku'] = $this->Data_model->get_buku();

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');
		$this->load->view('Data/index');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/js/sweetalert/delete');
		$this->load->view('Templates/js/sweetalert/message');
		$this->load->view('Templates/js/upload_file');
		$this->load->view('Templates/js/update_buku');
		$this->load->view('Templates/footer');

		$this->Data_model->update_buku();

		if (isset($_POST['insert'])) {
			$this->Data_model->upload_buku();
			$this->Data_model->insert_buku();
		}
						

	}

	public function deleteBuku($id)
	{
		$this->Data_model->delete_buku($id);
	}

	public function user()
	{
		$this->data['title'] = 'Data User';
		$this->data['data_user'] = $this->Data_model->get_user();

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');
		$this->load->view('Data/user');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/js/sweetalert/message');
		$this->load->view('Templates/js/sweetalert/delete.php');
		$this->load->view('Templates/footer');

		// $this->Data_model->insert_user();
		// $this->Data_model->update_user();		

	}

	public function deleteuser($id)
	{
		$this->Data_model->delete_user($id);
	}

	public function laporan()
	{
		$this->data['title'] = 'Data Laporan';
		$this->data['data_laporan'] = $this->Data_model->get_laporan();

		$this->load->view('Templates/header', $this->data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Templates/topbar');
		$this->load->view('Data/laporan');
		$this->load->view('Templates/copyright');
		$this->load->view('Templates/js/update_buku');
		$this->load->view('Templates/footer');

		// $this->Data_model->insert_user();
		// $this->Data_model->update_user();	
	}

	



}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */