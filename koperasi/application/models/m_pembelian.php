<?php
class M_pembelian extends CI_Model {

function __construct(){
parent::__construct();
}


function get_pembelian()
    {
        $sql="SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier
                group by t.id_pembelian";
        $query = $this->db->query($sql);
        return $query->result();
    }

function get_detail_pembelian()
    {
        $sql="SELECT td.id_pembelian,t.id_pembelian,b.nama_barang,td.jumlah_barang,b.harga_beli ,sum(b.harga_beli*td.jumlah_barang) as subtotal_pembelian
                FROM t_pembelian as t,t_detail_pembelian as td,t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and td.id_barang=b.id_barang and status='0'
                group by td.id_detail_pembelian";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->where('id_detail_pembelian', $id);
        $data = $this->db->get('t_detail_pembelian');
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
                                'status'=>'0');
        $this->db->insert('t_detail_pembelian',$data);
    }


    function simpan_pembelian($data)
    {
        $this->db->insert('t_pembelian',$data);
        $last_id=  $this->db->query("select id_pembelian from t_pembelian order by id_pembelian desc")->row_array();
        $this->db->query("update t_detail_pembelian set id_pembelian='".$last_id['id_pembelian']."' where status='0'");
        $this->db->query("update t_detail_pembelian set status='1' where status='0'");
    }


function simpan($data)
{
$query=$this->db->query('insert into t_barang (id_barang,nama_barang,jumlah_barang,tanggal_pembuatan_barang,tanggal_kadaluarsa_barang, max_persediaan_barang, min_persediaan_barang,isi_satuan, harga_beli, harga_jual, id_supplier)
		values (
			"'.$data['id_barang'].'",
			"'.$data['nama_barang'].'",
			"'.$data['jumlah_barang'].'",
			"'.$data['tanggal_pembuatan_barang'].'",
			"'.$data['tanggal_kadaluarsa_barang'].'",
			"'.$data['max_persediaan_barang'].'",
			"'.$data['min_persediaan_barang'].'",
			"'.$data['isi_satuan'].'",
			"'.$data['harga_beli'].'",
			"'.$data['harga_jual'].'",
			"'.$data['id_supplier'].'"
		)');
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

//fungsi untuk menghapus data dalam satu row di dalam tabel	barang
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



    function get_barang()
    {
        $sql = "select * from t_barang a JOIN t_supplier b ON a.id_supplier = b.id_supplier ORDER BY id_barang ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function laporan_default()
    {
        $query="SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian, sum(td.subtotal) as total
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier
                group by t.id_pembelian";
        return $this->db->query($query);
    }
    
    function laporan_periode($tgl_start,$tgl_end)
    {
        $query="SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian, sum(td.subtotal) as total
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier 
                and t.tanggal_pembelian between '$tgl_start' and '$tgl_end'
                group by t.id_pembelian";
        return $this->db->query($query);
    }

    function get_konfirmasi($id_pembelian){

        $this->db->set('status','1');
        $this->db->where('id_pembelian',$id_pembelian);
        $this->db->update('t_pembelian');
        $this->get_detailByIdPembelian($id_pembelian);
        return true; 
    }

    function get_detailByIdPembelian($id_pembelian){
        $this->db->where('id_pembelian',$id_pembelian);
        $data = $this->db->get('t_detail_pembelian');
        $q = $data->result();
        foreach ($q as $qu) {
            $idb = $this->get_jumlahBarangByID($qu->id_barang);
            foreach ($idb as $j) {
                $jum = $j->jumlah_barang + $qu->jumlah_barang;
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