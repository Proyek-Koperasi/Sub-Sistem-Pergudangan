<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_supplier extends CI_Controller {
	
	function __construct()
	{
	parent::__construct();
	if ($this->session->userdata('username_admin')=="") {
			redirect('auth');
		}
	$this->load->helper('text');
	$this->load->helper(array('url','form'));
	$this->load->database();
	$this->load->model('m_login');
	$this->load->library('session');
	$this->load->model('m_supplier','',TRUE);
	$this->load->library('form_validation');
	$this->load->view('nav');
	}

	public function index()
    {
    	$data['username_admin'] = $this->session->userdata('username_admin');
        $data['supplier_list'] = $this->m_supplier->get_supplier();
        $this->load->view('v_supplier',$data);
        $this->load->view('footer');
    }


    public function tambah()
	{
		$this->load->view('v_supplier_insert');
	}

	public function validasi()
	{
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required|is_unique[t_supplier.nama_supplier]');
		$this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'trim|required');
		$this->form_validation->set_rules('telp_supplier', 'Nomor Telepon Supplier', 'trim|required|max_length[15]');

		$this->form_validation->set_message('required', '%s Harus Diisi.');
		$this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
		$this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
		$this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
		$this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
		$this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
	}

	public function proses_tambah()
	{
		$this->validasi();
				
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('v_supplier_insert');	
		}
		else{
		
			$this->m_supplier->tambah_supplier();	
			redirect('c_supplier','refresh');
		}
	}


	public function edit($id_supplier)
	{
		$data['supplier_list'] = $this->m_supplier->get_supplier_edit($id_supplier);
		$this->load->view('v_supplier_update',$data);
	}

	public function proses_edit()
	{
		$this->m_supplier->edit_supplier();
		redirect('c_supplier/','refresh');
	}


	public function delete($id_supplier){
		$this->m_supplier->delete($id_supplier);
		redirect('c_supplier/','refresh');
	}
	
}
?>