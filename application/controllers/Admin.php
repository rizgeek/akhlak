<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $session = $this->session->userdata('login');
        $level = $this->session->userdata('level_akses');
        
        if($session && $level == 'ADMIN'){
            $this->load->library('menu');
            $this->load->library('tools');
            $this->load->library('validasidata');
            $this->load->model('model');
            date_default_timezone_set('Asia/Jakarta');
        }else{
            redirect(base_url('Login/Logout'));
        }
    }

    public function hapusData()
    {
        $tabel = $this->uri->segment(3);
        $kolom = $this->uri->segment(4);
        $kode = $this->uri->segment(5);
        $alamatKembali = $this->uri->segment(6);
        if (isset($tabel) and isset($kolom) and isset($kode) and isset($alamatKembali)) {
            $this->model->hapusData($tabel, [$kolom => $kode]);
            $this->tools->Notif('Berhasil', 'Data Berhasil Dihapus', 'success', "Admin/$alamatKembali");
        } else {
            redirect(base_url('Login/Logout'));
        }

    }

    public function index()
    {
        $this->dataKegiatan();
    }

    public function dataUnit()
    {
        $data['kd_unit'] = $this->tools->generateKode('tb_unit', 'kd_unit', 'KDU');
        $data['data_unit'] = $this->model->ambilSemuaData('tb_unit')->result();
        $this->tools->view('1_V_unit', $data);
    }

    public function cDataUnit()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('unit'));
        if ($this->form_validation->run() == true) {
            $data = array(
                'kd_unit' => $this->tools->generateKode('tb_unit', 'kd_unit', 'KDU'),
                'unit' => $this->input->post('nama_unit'),
            );

            $this->model->inputData('tb_unit', $data);
            $this->tools->Notif('Berhasil', 'Data unit berhasil disimpan', 'success', 'Admin/dataUnit');
        } else {
            $this->tools->Notif('Gagal', 'Data unit gagal disimpan', 'error', 'Admin/dataUnit');
        }
    }

    public function UDataUnit()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('unit'));
        if ($this->form_validation->run() == true) {
            $data = array(
                'unit' => $this->input->post('nama_unit'),
            );
            $where = ['kd_unit' => $this->input->post('kode_unit')];
            $this->model->updateData('tb_unit', $data, $where);
            $this->tools->Notif('Berhasil', 'Data unit berhasil disimpan', 'success', 'Admin/dataUnit');
        } else {
            $this->tools->Notif('Gagal', 'Data unit gagal disimpan', 'error', 'Admin/dataUnit');
        }
    }

    // DATA PENGGUNA
    public function dataPengguna()
    {
        $join = [
            ['tb_akun', 'tb_pengguna.kd_pengguna = tb_akun.kd_pengguna', 'INNER JOIN'],
            ['tb_unit', 'tb_pengguna.kd_unit = tb_unit.kd_unit', 'INNER JOIN'],
        ];

        $rootTable = 'tb_pengguna';
        $selectData = 'tb_pengguna.*,tb_akun.username,tb_akun.level_akses,tb_unit.unit';
        $data['data'] = $this->model->jointTabel($selectData, $rootTable, $join)->result();
        $this->tools->view('3_V_dataPengguna', $data);
    }

    public function tambahPengguna()
    {
        $data['username'] = $this->tools->generateKode('tb_pengguna', 'kd_pengguna', 'KDP');
        $data['unit'] = $this->model->ambilSemuaData('tb_unit')->result();
        $this->tools->view('2_V_tambahPengguna', $data);
    }

    public function cDataPengguna()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('pengguna'));
        if ($this->form_validation->run() == true) {
            $kdPengguna = $this->tools->generateKode('tb_pengguna', 'kd_pengguna', 'KDP');
            $dataPengguna = array(
                'kd_pengguna' => $kdPengguna,
                'kd_unit' => $this->input->post('kdUnit'),
                'nama' => $this->input->post('nama_pengguna'),
            );
            $dataAkun = array(
                'kd_akun' => $this->tools->generateKode('tb_akun', 'kd_akun', 'KDA'),
                'kd_pengguna' => $kdPengguna,
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'level_akses' => $this->input->post('levelAkses'),
                'status' => 'AKTIF',
            );

            $this->model->inputData('tb_pengguna', $dataPengguna);
            $this->model->inputData('tb_akun', $dataAkun);
            $this->tools->Notif('BERHASIL', 'Data Pengguna Berhasil didaftarkan', 'success', 'Admin/tambahPengguna');
        } else {
            $this->tools->Notif('GAGAL', 'Password Minimal 6 Digit', 'error', 'Admin/tambahPengguna');
        }

    }

    // DATA KEGIATAN
    public function dataKegiatan()
    {
        // AMBIL DATA UNIT
        $dataUnit = $this->model->ambilSemuaData('tb_unit')->result();

        // AMBIL DATA KEGIATAN
        $dataKegiatan =  $this->model->ambilSemuaData('tb_kegiatan')->result();

        // AMBIL JUMLAH PROPOSAL BERDASARKAN UNIT
        $jmlProposalUnitPerKegiatan = array();
        foreach($dataKegiatan as $dk){
            $sumJmlProposal = 0;
            foreach($dataUnit as $dt){
                $kolom = "COUNT('kd_laporan') as jml";
                $where = ['kd_unit' => $dt->kd_unit, 'kd_kegiatan' => $dk->kd_kegiatan];
                $tmp = $this->model->ambilDataTertentuSelect('tb_laporan',$kolom,$where)->row();
                $sumJmlProposal += $tmp->jml;
            }
            $jmlProposalUnitPerKegiatan[$dk->kd_kegiatan] = ((100 / $dk->jumlah_rkap_laporan) * $sumJmlProposal) / count($dataUnit);
        }

        
        
        $data['dataKegiatan'] = $dataKegiatan;
        $data['levelAkses'] = $this->session->userdata('level_akses');
        $data['presentase'] = $jmlProposalUnitPerKegiatan;
        $this->tools->view('5_V_data_kegiatan',$data);
    }

    public function laporanPerkegiatan()
    {
        $kdKegiatan = $this->uri->segment(3);
        if(isset($kdKegiatan)){
            $dataUnit = $this->model->ambilSemuaData('tb_unit')->result();;
            $jumlahLaporan = array();
            foreach ($dataUnit as $dt) {
                $query = "SELECT COUNT(tb_laporan.kd_unit) AS jml FROM tb_laporan WHERE tb_laporan.kd_unit = '$dt->kd_unit' and tb_laporan.kd_kegiatan = '$kdKegiatan' ";
                $jml = $this->model->query($query)->row();
                $jumlahLaporan[$dt->kd_unit] = $jml->jml;
            }

            $data['kegiatan'] = $this->model->ambilDataTertentu('tb_kegiatan', ['kd_kegiatan' => $kdKegiatan])->row();
    
            $data['unit'] = $dataUnit;
            $data['jml'] = $jumlahLaporan;
    
            $this->tools->view('9_V_AGEN_detailLaporan',$data);
        }else{
            redirect(base_url('Login/Logout'));
        }
    }

    public function tambahKegiatan()
    {
        $this->tools->view('4_V_tambahKegiatan');
    }

    public function cDataKegiatan()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('kegiatan'));
        if ($this->form_validation->run() == true) {
            
            $time_input = strtotime($this->input->post('bulanKegiatan')); 
            $date_input = getDate($time_input); 
            $stringDate = $date_input['year']."-".$date_input['mon']."-1";
            $date=date_create($stringDate);
            $date=date_format($date,"Y/m/d");

            $data = array(
                'kd_kegiatan' => $this->tools->generateKode('tb_kegiatan','kd_kegiatan','KDK'),
                'nama_kegiatan' => $this->input->post('namaKegiatan'),
                'bulan_kegiatan' => $date,
                'tanggal_kumpul' => $this->input->post('tanggalKumpul'),
                'jumlah_rkap_laporan' => $this->input->post('jmlRkapLaporan'),
            );

            $this->model->inputData('tb_kegiatan',$data);
            $this->tools->Notif('BERHASIL','Data Kegiatan Berhasil disimpan','success','Admin/tambahKegiatan');
        } else {
            $this->tools->Notif('GAGAL','Periksa Kembali Inputan Anda','error','Admin/tambahKegiatan');
        }

    }


    public function dataLaporan()
    {
        $kdKegiatan = $this->uri->segment(3);
        $kdUnit = $this->uri->segment(4);
        if(isset($kdKegiatan) && isset($kdUnit)){
            $data['data'] = $this->model->ambilDataTertentu('tb_laporan',['kd_kegiatan' => $kdKegiatan, 'kd_unit' => $kdUnit])->result();
            $kegiatan = $this->model->ambilDataTertentu('tb_kegiatan',['kd_kegiatan' => $kdKegiatan])->row();
            $data['presentase'] =(100/$kegiatan->jumlah_rkap_laporan) * count($data['data']);
            $data['levelAkses'] = $this->session->userdata('level_akses');
            $this->tools->view('8_V_AGEN_dataLaporan',$data);
        }else{
            redirect(base_url('Login/Logout'));
        }
    }
    public function Download()
    {
        $kdLaporan = $this->uri->segment(3);
        if(isset($kdLaporan)){
            $data = $this->model->ambilDataTertentu('tb_laporan',['kd_laporan' => $kdLaporan])->row();
            $namaFile = $data->laporan;
            $this->load->helper('download');
            force_download("./uploads/$namaFile", NULL);
        }else{
            redirect(base_url('Login/Logout'));
        }
    }



    public function downloadLaporan()
    {
        $data['data'] = $this->model->ambilSemuaData('tb_kegiatan')->result();
        $this->tools->view('12_V_download_laporan',$data);
    }

    public function downloadLaporanExcel()
    {
        if(isset($_POST['kegiatan'])){
            $kegiatan = $this->input->post('kegiatan');

            $dataUnit = $this->model->ambilSemuaData('tb_unit')->result();
            $dataKegiatan = $this->model->ambilSemuaData('tb_kegiatan')->result();
            $data = array();

            if($kegiatan != "semua"){
                $dataKegiatan = $this->model->ambilDataTertentu('tb_kegiatan', ['kd_kegiatan' => $kegiatan])->result();
            }
            
            if(count($dataKegiatan) > 0 && count($dataUnit) > 0) {
                $this->templateExcel($data,  $dataUnit, $dataKegiatan);
            }else{
                $this->tools->Notif('Perhatian','Data Tidak Tersedia','warning','Admin/downloadLaporan');
            }

        }else{
            redirect(base_url('Login/Logout'));
        }
    }


    private function templateExcel($data,  $dataUnit, $dataKegiatan)
    {
        foreach ($dataUnit as $du) {
            foreach ($dataKegiatan as $dk) {
                $query = "SELECT COUNT(tb_laporan.kd_laporan) as jmlaporan FROM tb_laporan WHERE tb_laporan.kd_unit = '$du->kd_unit' AND tb_laporan.kd_kegiatan = '$dk->kd_kegiatan'";
                $tmp = $this->model->query($query)->row();
                $data[$du->kd_unit][$dk->kd_kegiatan] = array(
                    'nama_kegiatan' => $dk->nama_kegiatan,
                    'jumlah_rkap_laporan' => $dk->jumlah_rkap_laporan,
                    'jumlah_realisasi' => $tmp->jmlaporan,
                    'persen' => (int) (100 / $dk->jumlah_rkap_laporan) * $tmp->jmlaporan
                );

            }
        }
    
        // template

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'UNIT');
        $sheet->setCellValue('B2', 'KEGIATAN');
        $sheet->setCellValue('C2', 'RKAP');
        $sheet->setCellValue('D2', 'TERPENUHI');
        $sheet->setCellValue('E2', 'PRESENTASE');
        
        $baris = 4;
        $barisUnit = 4;
        foreach ($dataUnit as $du) {
            $sheet->setCellValue("A$barisUnit", $du->unit);

            $jmlKegiatan = 0;
            $totalPersen = 0;
            foreach ($dataKegiatan as $dk) {

                $persen = (int) $data[$du->kd_unit][$dk->kd_kegiatan]['persen'];
                $sheet->setCellValue("B$baris",  $data[$du->kd_unit][$dk->kd_kegiatan]['nama_kegiatan']);
                $sheet->setCellValue("C$baris",  $data[$du->kd_unit][$dk->kd_kegiatan]['jumlah_rkap_laporan']);
                $sheet->setCellValue("D$baris",  $data[$du->kd_unit][$dk->kd_kegiatan]['jumlah_realisasi']);
                $sheet->setCellValue("E$baris",  $persen);
                $baris++;
                $barisUnit++;
                $jmlKegiatan++;
                $totalPersen += $persen;
            }

            $sheet->setCellValue("D$barisUnit", "TOTAL PRESENTASE : ");
            $sheet->setCellValue("E$barisUnit", $totalPersen);
            $baris++;
            $barisUnit++;

            $sheet->setCellValue("D$barisUnit", "PRESENTASE  AKHIR : ");
            $sheet->setCellValue("E$barisUnit", $totalPersen / $jmlKegiatan );
            $baris++;
            $barisUnit++;

            $sheet->setCellValue("A$barisUnit", "*********************");
            $sheet->setCellValue("B$baris",  "*********************");
            $sheet->setCellValue("C$baris",  "*********************");
            $sheet->setCellValue("D$baris",  "*********************");
            $sheet->setCellValue("E$baris",  "*********************");
            
            
            $baris+=3;
            $barisUnit+=3;
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'data-kegiatan';
            
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
    
        $writer->save('php://output');

    }

}

/* End of file Admin.php */
