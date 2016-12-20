<?php
class M_barang extends CI_Model {

function __construct(){
    $this->load->database();
parent::__construct();
}

    public function generatorid($table)
    {
        return $table."-".date("Ymd")."-".rand(5,99999);
    }

    function get_barang()
    {
        $sql = "select * from t_barang ORDER BY nama_barang ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function tambah_barang() {
        $data = array(
            'id_barang'=> $this->generatorid("BRG"),
            'nama_barang'=> $this->input->post('nama_barang'),
            'jumlah_barang'=>$this->input->post('jumlah_barang'),
            'tanggal_pembuatan_barang'=>$this->input->post('tanggal_pembuatan_barang'),
            'tanggal_kadaluarsa_barang'=>$this->input->post('tanggal_kadaluarsa_barang'),
            'max_persediaan_barang'=>$this->input->post('max_persediaan_barang'),
            'min_persediaan_barang'=>$this->input->post('min_persediaan_barang'),
            'isi_satuan'=>$this->input->post('isi_satuan'),
            'harga_beli'=>$this->input->post('harga_beli'),
            'harga_jual'=>$this->input->post('harga_jual')
        );
    
        return $this->db->insert('t_barang', $data);

    }

    function get_barang_edit($id_barang) {
        $this->db->order_by('id_barang','ASC');
        $this->db->where('id_barang',$id_barang);
        $query = $getData = $this->db->get('t_barang');
        
        if($getData->num_rows() > 0)   
        return $query;   
        else  
        return null;     
    }

    function edit_barang() {
        $id_barang = $this->input->post('id_barang');
        $data = array(
            'nama_barang'=> $this->input->post('nama_barang'),
            'jumlah_barang'=>$this->input->post('jumlah_barang'),
            'tanggal_pembuatan_barang'=>$this->input->post('tanggal_pembuatan_barang'),
            'tanggal_kadaluarsa_barang'=>$this->input->post('tanggal_kadaluarsa_barang'),
            'max_persediaan_barang'=>$this->input->post('max_persediaan_barang'),
            'min_persediaan_barang'=>$this->input->post('min_persediaan_barang'),
            'isi_satuan'=>$this->input->post('isi_satuan'),
            'harga_beli'=>$this->input->post('harga_beli'),
            'harga_jual'=>$this->input->post('harga_jual')            
        );
        
            $this->db->where('id_barang',$this->input->post('id_barang',$id_barang));
            $this->db->update('t_barang', $data);      
    }


    function delete($id_barang){
        $this->db->where('id_barang',$id_barang);
        $this->db->delete('t_barang');
    }

    function get_supplier()
    { 
        $this->db->select('id_supplier');
        $this->db->select('nama_supplier');
        $this->db->from('t_supplier');
        $query = $this->db->get();
        $result = $query->result();

        //array untuk menyimpan id_posisi & posisi
        $id_supplier = array('-Pilih-');
        $nama_supplier = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id_supplier, $result[$i]->id_supplier);
            array_push($nama_supplier, $result[$i]->nama_supplier);
        }
        return $supplier_result = array_combine($id_supplier, $nama_supplier);
    }

    function pilih_barang()
    { 
        $this->db->select('id_barang');
        $this->db->select('nama_barang');
        $this->db->from('t_barang');
        $query = $this->db->get();
        $result = $query->result();

        //array untuk menyimpan id_posisi & posisi
        $id_barang = array('-Pilih-');
        $nama_barang = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id_barang, $result[$i]->id_barang);
            array_push($nama_barang, $result[$i]->nama_barang);
        }
        return $barang_result = array_combine($id_barang, $nama_barang);
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->where('id_barang', $id);
        $data = $this->db->get('t_barang');
        return $data->result();
    }


}