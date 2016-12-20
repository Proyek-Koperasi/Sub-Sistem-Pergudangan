<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_penjualan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('username_admin')=="") {
			redirect('auth');
		}
		$this->load->library('cart');
		$this->load->model('m_barang');
		$this->load->model('m_penjualan');
		$this->load->model('penjualan_model');
		$this->load->model('detail_penjualan_model');
		$this->load->view('nav');
	}

	public function data()
	{
    	$data['username_admin'] = $this->session->userdata('username_admin');
        $data['penjualanlist'] = $this->penjualan_model->get_penjualan();
        $this->load->view('v_penjualan',$data);
        $this->load->view('footer');
    }

	public function index()
	{
		$data['itemId']=$this->m_barang->pilih_barang();
		$this->load->view('v_penjualan_insert',$data);
	}

	public function detail($id_penjualan)
    {
        $data['username_admin'] = $this->session->userdata('username_admin');
        $data['details'] = $this->penjualan_model->getById($id_penjualan);
        $data['penjualanlist'] = $this->penjualan_model->getPenjualanByid($id_penjualan);
        // echo var_dump($data['pembelianlist']);die();
        $this->load->view('v_penjualan_d',$data);
        $this->load->view('footer');
    }
    
    public function konfirmasi(){
		$id_penjualan= $this->input->get('t_penjualan');
		$this->m_penjualan->get_konfirmasi($id_penjualan);

		redirect('c_barang/','refresh');
	}



}

/* End of file c_penjualan.php */
/* Location: ./application/controllers/c_penjualan.php */