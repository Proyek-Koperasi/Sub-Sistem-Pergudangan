<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array('username_admin' => $this->input->post('username_admin', TRUE),
						'password_admin' => md5($this->input->post('password_admin', TRUE))
			);
		$this->load->model('m_login'); // load model_user
		$hasil = $this->m_login->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id_admin'] = $sess->id_admin;
				$sess_data['username_admin'] = $sess->username_admin;
				$sess_data['nama_admin'] = $sess->nama_admin;
				$sess_data['hak_akses'] = $sess->hak_akses;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('hak_akses')=='1') {
				redirect('c_login');
			}
			elseif ($this->session->userdata('hak_akses')=='2') {
				redirect('c_login/coba');
			}		
		}
		else {
			echo "<script>alert('Login gagal! Username atau password yang Anda masukkan salah.');history.go(-1);</script>";
		}
	}

}

?>
