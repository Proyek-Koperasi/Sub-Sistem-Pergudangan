<?php
/**
 * pada penjualan tidak dapa dilakukan penghapusan data
 * update data hanya dapat dilakukan oleh admin dalam situai tertentu
 * karena data yang telah masuk adlah dta yang bersifat penting tiap recordnya
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

	function __construct()
	{
		parent:: __construct();
	}

	function get_pembelian()
    {
        $sql="SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian,t.status
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier
                group by t.id_pembelian";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPembelianByid($id)
    {
    	$this->db->select("*");
    	$this->db->where("id_pembelian", $id);
    	$this->db->from("t_pembelian");
    	$this->db->join("t_supplier", "t_pembelian.id_supplier = t_supplier.id_supplier");
    	$query = $this->db->get();
    	return $query->result();
    }

	public function count_all()
	{
		return $this->db->count_all();
	}

	public function getAll($start, $limit)	
	{
		$this->db->select('*');
		$data = $this->db->get('t_pembelian',$limit , $start);
		return $data->result();
	}

	public function getById($id)
	{
		$this->db->where('t_detail_pembelian.id_pembelian', $id);
		$this->db->join('t_barang', 't_detail_pembelian.id_barang=t_barang.id_barang');
		$data = $this->db->get('t_detail_pembelian');
		return $data->result();
	}
	
	public function store($object)
	{
		$this->db->insert('t_pembelian', $object);
	}

	public function update($id, $object)
	{
		$this->db->where('id_pembelian', $id);
		$this->db->update('t_pembelian', $object);
	}
}


/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */