<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembelian extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('username_admin')=="") {
			redirect('auth');
		}
		$this->load->library('cart');
		$this->load->model('m_barang');
		$this->load->model('m_pembelian');
		$this->load->model('pembelian_model');
		$this->load->model('detail_pembelian_model');
		$this->load->view('nav');
	}
	
	public function data()
    {
    	$data['username_admin'] = $this->session->userdata('username_admin');
        $data['pembelianlist'] = $this->pembelian_model->get_pembelian();
        $this->load->view('v_pembelian',$data);
        $this->load->view('footer');
    }

	public function index()
	{
		$data['itemId']=$this->m_barang->pilih_barang();
		$this->load->view('v_pembelian_insert',$data);
	}

	public function detail($id_pembelian)
    {
        $data['username_admin'] = $this->session->userdata('username_admin');
        $data['details'] = $this->pembelian_model->getById($id_pembelian);
        $data['pembelianlist'] = $this->pembelian_model->getPembelianByid($id_pembelian);
        // echo var_dump($data['pembelianlist']);die();
        $this->load->view('v_pembelian_d',$data);
        $this->load->view('footer');
    }

	/**
	 * search item :
	 * digunakan untuk mencari barang secara real time 
	 * pada saat kasir melakukan pencarian 
	 * berhubungan dengan ajax
	 *
	 * funsi in juga dikgunakan sebgai cek stok barang
	 */
	public function searchItem()
	{
		$idItem = $_POST['idItemSearch'];
		//load model search like berdasarkan id barang
		$data = $this->m_barang->searchBarang($idItem);
		echo json_encode($data);
	}

	/**
	 * menambahkan item pada list pembayaran
	 * barang yang akan dibeli 
	 */
	public function addToCart()
	{
		$idItem = $this->input->post('itemId');
		$items = $this->m_barang->getById($idItem);
		foreach ($items as $item) {
			$dataToCart = array(
				'id' => $item->id_barang,
				'name' => $item->nama_barang,
				'price' => $item->harga_beli,
				'qty' => $this->input->post('itemJumlah')
			);
			$this->cart->insert($dataToCart);
		}

		redirect('c_pembelian');
	}

	/**
	 * mengupdate data pada list pembayarn
	 * barang yang akan dibeli
	 * pengupdate-an berupa jumlah item yang dibeli 
	 */
	public function updateCart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
				
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $_POST[$i.'qty']
			);
			$i++;
			$this->cart->update($data);
		}
		redirect('c_pembelian');

	}
	/**
	 * menghapus item dari list pembayaran
	 * barang yang akan dibeli
	 */
	public function removeItemFromCart($rowId)
	{
		$rowId = $this->uri->segment(3);
		// $this->cart->remove($rowId);
		// redirect('pembelian');
		$data = array(
			'rowid' => $rowId,
			'qty' => 0);
		// echo var_dump($data); die();
		$this->cart->update($data);
		redirect('c_pembelian');
	}
	/**
	 * load vie pembayaran
	 */
	public function pembayaran()
	{
		$dataPembelian['id_supplier']=$this->m_barang->get_supplier();
		$this->load->view('v_pembayaran',$dataPembelian);
	}

	public function proses_pembayaran()
	{
		/**
		 *
		 * prose penyimpana kedalam table penjualan
		 *
		 */
		$dataPembelian['id_supplier']=$this->m_barang->get_supplier();
		$idAdmin = $this->session->userdata('id_admin');
		$idPembelian = "PBL-".date("Ymd")."-".rand(5, 9999);
		$dataPembelian = array(
			'id_pembelian' => $idPembelian,
			'tanggal_pembelian' => date('Y-m-d H:m:s'),
			'total_harga_pembelian' => $this->input->post('totalBayar'),
			'id_supplier' => $this->input->post('id_supplier'),
			'id_admin' => $idAdmin
		);


		$this->pembelian_model->store($dataPembelian);
		/**
		 * prose penyimpanan kedalam 
		 * table detile penjualan
		 */
		foreach ($this->cart->contents() as $item ) {
			$last_id = $this->db->query("select id_pembelian from t_pembelian order by tanggal_pembelian desc limit 1");

			foreach ($last_id->result() as $data) {

				$dataDetailPembelian = array(
					'id_detail_pembelian' => $id = "DBL-".date("Ymd")."-".rand(5, 9999),   
					'id_barang' => $item['id'],
					'jumlah_barang' => $item['qty'],
					'harga_satuan' => $item['price'],
					'subtotal' => $item['subtotal'],
					'id_pembelian' => $data->id_pembelian
				);
				// echo var_dump($dataDetailPembelian);
			}

			//echo var_dump($dataDetailPenjualan); die();
			$this->detail_pembelian_model->store($dataDetailPembelian);			
		}

		$this->cart->destroy();
		redirect('c_pembelian/data');
	}

	public function konfirmasi(){
		$id_pembelian= $this->input->get('t_pembelian');
		$this->m_pembelian->get_konfirmasi($id_pembelian);

		redirect('c_barang/','refresh');
	}

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */