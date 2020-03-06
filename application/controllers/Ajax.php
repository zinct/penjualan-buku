<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['user_data'] = $this->UserData_model->get_data();
		is_loggin_admin($this->data['user_data']);
		$this->load->model('Ajax_model');
	}

	public function index()
	{
		$id = $this->input->post('id');
		echo json_encode($this->Ajax_model->get_where_buku($id));
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */