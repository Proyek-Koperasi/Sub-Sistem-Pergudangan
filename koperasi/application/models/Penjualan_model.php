<?php
/**
 * pada penjualan tidak dapa dilakukan penghapusan data
 * update data hanya dapat dilakukan oleh admin dalam situai tertentu
 * karena data yang telah masuk adlah dta yang bersifat penting tiap recordnya
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

	function __construct()
	{
		parent:: __construct();
	}

	function get_penjualan()
    {
        // $sql="SELECT t.id_penjualan,t.tanggal_penjualan,t.keterangan_penjualan,o.id_admin,t.total_harga_penjualan,t.status_pjl
        //         FROM t_penjualan as t,detail_penjualan as td,t_admin as o, t_barang as b
        //         WHERE td.id_penjualan=t.id_penjualan and o.id_admin=t.id_admin
        //         group by t.id_penjualan";
        // $query = $this->db->query($sql);
        // return $query->result();
        $query = $this->db->query("SELECT * FROM t_penjualan");
        return $query->result();
        
    }

	public function getPenjualanByid($id)
    {
    	$this->db->select("*");
    	$this->db->where("id_penjualan", $id);
    	$this->db->from("t_penjualan");
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
		$data = $this->db->get('t_penjualan',$limit , $start);
		return $data->result();
	}

	public function getById($id)
	{
		$this->db->where('detail_penjualan.id_penjualan', $id);
		$this->db->join('t_barang', 'detail_penjualan.id_barang=t_barang.id_barang');
		$data = $this->db->get('detail_penjualan');
		return $data->result();
	}
	
	public function store($object)
	{
		$this->db->insert('t_penjualan', $object);
	}

	public function update($id, $object)
	{
		$this->db->where('id_penjualan', $id);
		$this->db->update('t_penjualan', $object);
	}

}


/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */