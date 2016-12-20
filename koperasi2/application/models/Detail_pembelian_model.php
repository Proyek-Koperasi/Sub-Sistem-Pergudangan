<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pembelian_model extends CI_Model {

	// public $table = 't_barang';
	// public $id = 'id_barang';
	// public $order = 'DESC';

	function __construct()
	{
		parent:: __construct();
	}

	// function get_by_id($id)
	// {
	// 	$this->db->like($this->id,$id);
	// 	return $this->db->get($this->table)->row();
	// }

	// function insert($data)
	// {
	// 	$this->db->insert($this->table,$data);
	// }

	// function update($id,$data)
	// {
	// 	$this->db->where($this->id, $id);
	// 	$this->db->update($this->table,$data);
	// }

	public function store($object)
	{
		$this->db->insert('t_detail_pembelian', $object);
	}

	/**
	 * mengambi data detail penjualan
	 * berdasarkan id penjualan
	 */
	public function getByIdPembelian($idPembelian, $limit, $start)
	{
		$this->db->select('*');
		$this->db->where('id_pembelian', $idPembelian);
		$data = $this->db->get('t_detail_pembelian', $limit, $start);
		return $data->result();
	}

	public function getByIdBarang($id_barang)
	{
		$this->db->select('*');
		$this->db->where('id_barang', $id_barang);
		$data = $this->db->get('t_detail_pembelian');
		return $data->result();
	}

	
}

/* End of file Detail_penjualan_model.php */
/* Location: ./application/models/Detail_penjualan_model.php */