<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $session = $this->session->userdata('login');
        $level = $this->session->userdata('level_akses');
        
        if($session && $level == 'AGEN' || $level == 'MANAGER'){
            $this->load->library('menu');
            $this->load->library('tools');
            $this->load->library('validasidata');
            $this->load->model('model');
            date_default_timezone_set('Asia/Jakarta');
        }else{
            redirect(base_url('Login/Logout'));
        }
    }   

    public function index()
    {
        $data['levelAkses'] = $this->session->userdata('level_akses');
        $data['data'] = $this->model->ambilSemuaData('tb_kegiatan')->result();
        $this->tools->view('6_V_AGEN_data_kegiatan',$data);
    }

    public function uploadLaporan()
    {
        $kdKegiatan = $this->uri->segment(3);
        $data['kegiatan'] = $this->model->ambilDataTertentu('tb_kegiatan',['kd_kegiatan' => $kdKegiatan])->row();
        $this->tools->view('7_V_AGEN_uploadLaporan',$data);
    }

    public function CUploadLaporan()
    {
        if(isset($_FILES)){
            $this->form_validation->set_rules($this->validasidata->cekInput('upload'));
            if($this->form_validation->run() == TRUE) {
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'pdf|xls|xlsx|csv|doc|docx';
                $config['max_width']  = '10240';
                $config['encrypt_name'] = TRUE;
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('fileInput')){
                    $error = array('error' => $this->upload->display_errors());
                    $this->tools->Notif('GAGAL','Periksa Kembali Data yang anda inputkan','error','Agen/index');
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $dataDB = array(
                        'kd_laporan' => $this->tools->generateKode('tb_laporan','kd_laporan','KDL'),
                        'kd_kegiatan' => $this->input->post('kdKegiatan'),
                        'kd_unit' => $this->session->userdata('kd_unit'),
                        'laporan' =>  $data['upload_data']['file_name'],
                        'tanggal_upload' =>  date('Y-m-d'),
                    );
                    
                    $this->model->inputData('tb_laporan',$dataDB);
                    $this->tools->Notif('BERHASIL','Laporan Telah di upload','success','Agen/index');
                }
                
            } else {
                $this->tools->Notif('GAGAL','Periksa Kembali Data yang anda inputkan','error','Agen/index');
            }
            
        }else{
            redirect(base_url('Login/Logout'));
        }    
    }

    public function dataLaporan()
    {
        $kdKegiatan = $this->uri->segment(3);
        if(isset($kdKegiatan)){
            $data['data'] = $this->model->ambilDataTertentu('tb_laporan',['kd_kegiatan' => $kdKegiatan, 'kd_unit' => $this->session->userdata('kd_unit')])->result();
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




}

/* End of file Agen.php */
