<?php 

function is_loggin_user() 
{

	$ci =& get_instance();

	if (!$ci->session->userdata('email')) {
		redirect(BASE_URL('Auth/forbidden'),'refresh');
	}

}

function is_loggin_admin($user_data)
{

	$ci =& get_instance();

	if ($user_data['role_id'] == 2) {
		redirect(BASE_URL('Auth/forbidden'),'refresh');
	}

}

function is_loggin_auth()
{
	
	$ci =& get_instance();

	if ($ci->session->userdata('email')) {
		redirect(BASE_URL('User/index'),'refresh');
	}

}

function is_uri_correct()
{

	$ci =& get_instance();

	if (!$ci->uri->segment(3)) {
		redirect(BASE_URL('Auth/forbidden'),'refresh');
	}

}

function is_loggin_pemesanan($user_id)
{
	$ci =& get_instance();

	$result = $ci->db->get_where('tb_pemesanan', ['user_id' => $user_id])->num_rows();

	if ($result == 0) {
		redirect(BASE_URL('Auth/forbidden'),'refresh');
	}
}