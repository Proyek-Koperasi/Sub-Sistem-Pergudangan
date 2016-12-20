<?php
class M_supplier extends CI_Model {

function __construct(){
    $this->load->database();
parent::__construct();
}

    public function generatorid($table)
    {
        return $table."-".date("Ymd")."-".rand(5,99999);
    }

    function get_supplier()
    {
        $sql = "select * from t_supplier ORDER BY nama_supplier ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function tambah_supplier() {
        $data = array(
            'id_supplier'=> $this->generatorid("SPL"),
            'nama_supplier'=> $this->input->post('nama_supplier'),
            'alamat_supplier'=>$this->input->post('alamat_supplier'),
            'telp_supplier'=>$this->input->post('telp_supplier')
        );
    
        return $this->db->insert('t_supplier', $data);

    }

    function get_supplier_edit($id_supplier) {
        $this->db->order_by('id_supplier','ASC');
        $this->db->where('id_supplier',$id_supplier);
        $query = $getData = $this->db->get('t_supplier');
        
        if($getData->num_rows() > 0)   
        return $query;   
        else  
        return null;     
    }

    function edit_supplier() {
        $id_supplier = $this->input->post('id_supplier');
        $data = array(
            'nama_supplier'=> $this->input->post('nama_supplier'),
            'alamat_supplier'=>$this->input->post('alamat_supplier'),
            'telp_supplier'=>$this->input->post('telp_supplier')         
        );
        
            $this->db->where('id_supplier',$this->input->post('id_supplier',$id_supplier));
            $this->db->update('t_supplier', $data);      
    }


    function delete($id_supplier){
        $this->db->where('id_supplier',$id_supplier);
        $this->db->delete('t_supplier');
    }


}