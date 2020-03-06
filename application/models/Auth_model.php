<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function register()
	{
		$nama = htmlspecialchars($this->input->post('nama', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$result = $this->db->get_where('tb_user', ['email' => $email])->num_rows();

		if ($result > 0) {
			
			$this->session->set_flashdata('danger', 'Email Sudah Terdaftar, Pilih Email Lain');
			redirect(BASE_URL('Auth/register'),'refresh');
		} else {

			$data = [
			'nama_user' => $nama,
			'email' => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => 2
			];

		$this->db->insert('tb_user', $data);

		// Message
		$this->session->set_flashdata('success', 'Data Kamu Sudah Terdaftar');
		redirect(BASE_URL('Auth/index'),'refresh');

		}

		
	}

	public function login()
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$result = $this->db->get_where('tb_user', ['email' => $email])->num_rows();

		if ($result > 0) {
			
			$data['user'] = $this->db->get_where('tb_user', ['email' => $email])->row_array();
			$pass = $data['user']['password'];
			$role = $data['user']['role_id'];

			if (password_verify($password, $pass)) {				

				$data = array(
					'email' => $email,
					'role_id' => $role
				);

				// Message
				$this->session->set_flashdata('success', 'Kamu Berhasil Login');

				$this->session->set_userdata($data);

				// Check Level User
				if ($role == 1) {
					redirect(BASE_URL('Admin/index'),'refresh');
				} else if ($role == 2) {
					redirect(BASE_URL('User/index'),'refresh');
				}			

			} else {

				// Message
				$this->session->set_flashdata('danger', 'Password Salah');
				redirect(BASE_URL('Auth/index'),'refresh');

			}

		} else {

			// Message
			$this->session->set_flashdata('danger', 'Email Tidak Terdaftar');
			redirect(BASE_URL('Auth/index'),'refresh');

		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */