<?php
session_start();
class C_login extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','user_agent','session','form_validation','upload'));

		if ($this->session->userdata('username_admin')=="") {
			redirect('auth');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['username_admin'] = $this->session->userdata('username_admin');
		$this->load->view('nav', $data);
		$this->load->view('home',$data);
		$this->load->view('footer', $data);		
	}

	public function logout() {
		$this->session->unset_userdata('username_admin');
		session_destroy();
		redirect('auth');
	}
	
}
?>