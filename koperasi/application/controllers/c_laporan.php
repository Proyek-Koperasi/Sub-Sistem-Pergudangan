<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_laporan extends CI_Controller {
	
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
	$this->load->library('session','template');
	$this->load->model('m_pembelian','',TRUE);
	$this->load->model('m_barang','',TRUE);

	//$this->load->view('admin/nav');
	}

	public function index()
    {
        if(isset($_POST['submit']))
        {
            $tgl_start=  $this->input->post('tgl_start');
            $tgl_end=  $this->input->post('tgl_end');
            $data['pembelianlist']=  $this->m_pembelian->laporan_periode($tgl_start,$tgl_end);
            $this->template->load('template','laporan',$data);
        }
        else if(isset($_POST['submit2']))
        {
            $tgl_start      = $this->input->post('tgl_start');
            $tgl_end        = $this->input->post('tgl_end');

            $data['tgl_start'] = $tgl_start;
            $data['tgl_end']   = $tgl_end;     

        


            // $a['data']   = $this->db->query("SELECT * FROM t_pembelian WHERE tanggal_pembelian >= '$tgl_start' AND tanggal_pembelian <= '$tgl_end' ORDER BY id_pembelian")->result();
            $data['data']  = $this->db->query("SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian, sum(td.subtotal) as total
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier 
                and t.tanggal_pembelian between '$tgl_start' and '$tgl_end'
                group by t.id_pembelian")->result();
            $this->load->view('agenda_pembelian', $data);
        }
        else
        {
            $data['pembelianlist']=  $this->m_pembelian->laporan_default();
            //$this->load->view('admin/laporan',$data);
            $this->template->load('template','laporan',$data);
        }
    }


    public function cetak_agenda() {
        $tgl_start      = $this->input->post('tgl_start');
        $tgl_end        = $this->input->post('tgl_end');

        $a['tgl_start'] = $tgl_start;
        $a['tgl_end']   = $tgl_end;     

        


            // $a['data']   = $this->db->query("SELECT * FROM t_pembelian WHERE tanggal_pembelian >= '$tgl_start' AND tanggal_pembelian <= '$tgl_end' ORDER BY id_pembelian")->result();
            $a['data']  = $this->db->query("SELECT t.id_pembelian,t.tanggal_pembelian,t.keterangan_pembelian,o.nama_admin,s.nama_supplier,t.total_harga_pembelian, sum(td.subtotal) as total
                FROM t_pembelian as t,t_detail_pembelian as td,t_admin as o,t_supplier as s, t_barang as b
                WHERE td.id_pembelian=t.id_pembelian and o.id_admin=t.id_admin and t.id_supplier=s.id_supplier 
                and t.tanggal_pembelian between '$tgl_start' and '$tgl_end'
                group by t.id_pembelian")->result();
            $this->load->view('agenda_pembelian', $a);
        }


    
    
    public function excel()
    {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['pembelianlist']=  $this->m_pembelian->laporan_default();
        $this->load->view('laporan_excel',$data);
    }
    
    public function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI PEMBELIAN PADA KOPERASI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(40, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Supplier', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->m_pembelian->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(40, 7, $r->tanggal_pembelian, 1,0);
            $pdf->Cell(30, 7, $r->nama_supplier, 1,0);
            $pdf->Cell(30, 7, $r->nama_admin, 1,0);
            $pdf->Cell(38, 7, $r->total_harga_pembelian, 1,1,'R');
            $no++;
            $total=$total+$r->total_harga_pembelian;
        }
        // end
        $pdf->Cell(110,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0,'R');
        $pdf->Output();
    }
}
?>