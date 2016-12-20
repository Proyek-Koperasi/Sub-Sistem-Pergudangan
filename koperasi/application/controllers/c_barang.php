<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_barang extends CI_Controller {
	
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
	$this->load->model('m_barang','',TRUE);
	$this->load->library('form_validation');
	$this->load->view('nav');
	}

	public function index()
    {
    	$data['username_admin'] = $this->session->userdata('username_admin');
        $data['baranglist'] = $this->m_barang->get_barang();
        $this->load->view('v_barang',$data);
        $this->load->view('footer');
    }


    public function tambah()
	{
		$this->load->view('v_barang_insert');
	}

	public function validasi()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|is_unique[t_barang.nama_barang]');
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required|numeric');
		$this->form_validation->set_rules('tanggal_pembuatan_barang', 'Tanggal Pembuatan', 'trim|required|date');
		$this->form_validation->set_rules('tanggal_kadaluarsa_barang', 'Tanggal Kadaluarsa', 'trim|required|date');
		$this->form_validation->set_rules('max_persediaan_barang', 'Maksimal Persediaan', 'trim|required|numeric');
		$this->form_validation->set_rules('min_persediaan_barang', 'Minimal Persediaan', 'trim|required|numeric');
		$this->form_validation->set_rules('isi_satuan', 'Isi Satuan', 'trim|required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required|numeric');

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
			$this->load->view('v_barang_insert');	
		}
		else{
		
			$this->m_barang->tambah_barang();	
			redirect('c_barang','refresh');
		}
	}


	public function edit($id_barang)
	{
		$data['baranglist'] = $this->m_barang->get_barang_edit($id_barang);
		$this->load->view('v_barang_update',$data);
	}

	public function proses_edit()
	{
		$this->m_barang->edit_barang();
		redirect('c_barang/','refresh');
	}


	public function delete($id_barang){
		$this->m_barang->delete($id_barang);
		redirect('c_barang/','refresh');
	}
	
}
?>