<?php
class M_penjualan extends CI_Model {

function __construct()
    {
        parent:: __construct();
    }

function get_detail_penjualan()
    {
        $sql="SELECT td.id_penjualan,t.id_penjualan,b.nama_barang,td.jumlah_barang,b.harga_beli ,sum(b.harga_beli*td.jumlah_barang) as subtotal_penjualan
                FROM t_penjualan as t,detail_penjualan as td,t_barang as b
                WHERE td.id_penjualan=t.id_penjualan and td.id_barang=b.id_barang and status_pjl='0'
                group by td.id_detail_penjualan";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->where('id_detail_penjualan', $id);
        $data = $this->db->get('detail_penjualan');
        return $data->result();
    }


    function simpan_barang()
    {
        $nama_barang    =  $this->input->post('nama_barang');
        $jumlah_barang  =  $this->input->post('jumlah_barang');
        $idbarang       = $this->db->get_where('t_barang',array('nama_barang'=>$nama_barang))->row_array();
        $data           = array(
                                'id_barang'=>$idbarang['id_barang'],
                                'jumlah_barang'=>$jumlah_barang,
                                'status_pjl'=>'0');
        $this->db->insert('detail_penjualan',$data);
    }


    function simpan_penjualan($data)
    {
        $this->db->insert('t_penjualan',$data);
        $last_id=  $this->db->query("select id_penjualan from t_penjualan order by id_penjualan desc")->row_array();
        $this->db->query("update detail_penjualan set id_penjualan='".$last_id['id_penjualan']."' where status='0'");
        $this->db->query("update detail_penjualan set status='1' where status='0'");
    }


//fungsi untuk mengambil data dari tabel barang untuk ditampilkan ke dalam halaman edit berdasar ID
function getEdit($id_barang){
        $this->db->where('id_barang',$id_barang);
        $query = $this->db->get('t_barang');
        
        return $query->result();
    }

//fungsi untuk menyimpan data ke dalam tabel barang setelah di update
function edit($param,$id_barang){
        $this->db->where('id_barang',$id_barang);
        $this->db->update('t_barang',$param);
        return true;
    }

//fungsi untuk menghapus data dalam satu row di dalam tabel barang
function delete($id_barang){
        $this->db->where('id_barang',$id_barang);
        $this->db->delete('t_barang');
    }


    function get_konfirmasi($id_penjualan){

        $this->db->set('status_pjl','1');
        $this->db->where('id_penjualan',$id_penjualan);
        $this->db->update('t_penjualan');
        $this->get_detailByIdPenjualan($id_penjualan);
        return true; 
    }

    function get_detailByIdPenjualan($id_penjualan){
        $this->db->where('id_penjualan',$id_penjualan);
        $data = $this->db->get('detail_penjualan');
        $q = $data->result();
        foreach ($q as $qu) {
            $idb = $this->get_jumlahBarangByID($qu->id_barang); //qu jumlah barang pd detail_penjualan, j->jumlah barang pd t_penjualan
            foreach ($idb as $j) {
                $jum = $j->jumlah_barang - $qu->jumlah_barang;
            }
            $query = "update t_barang set jumlah_barang = ".$jum." where id_barang = '".$qu->id_barang."'";
            
            $this->db->query($query);
        }
        return true;
    }

    function get_jumlahBarangByID($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('t_barang')->result();
    }

}