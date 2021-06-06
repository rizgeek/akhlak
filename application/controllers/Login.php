<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('tools');
        $this->load->library('validasidata');
        $this->load->model('model');
        date_default_timezone_set('Asia/Jakarta');
    }
    
    
    public function index()
    {
        $this->load->view('V_Login');
    }

    public function Validasi()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('login'));
        if ($this->form_validation->run() == TRUE) {
            $cek = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password'))
            );

            $cek = $this->model->ambilDataTertentu('tb_akun',$cek)->row();
            if($cek != null){
                $dataPengguna = $this->model->ambilDataTertentu('tb_pengguna',['kd_pengguna' => $cek->kd_pengguna])->row();

                $data = array(
                    'kd_pengguna' => $dataPengguna->kd_pengguna,
                    'kd_unit' => $dataPengguna->kd_unit,
                    'nama' => $dataPengguna->nama,
                    'level_akses' => $cek->level_akses,
                    'status' => $cek->status,
                    'kd_akun' => $cek->kd_akun,
                    'username' => $cek->username,
                    'login' => TRUE,
                );
                $this->session->set_userdata($data);

                if($cek->level_akses == 'ADMIN'){
                    redirect(base_url('Admin'));
                }elseif($cek->level_akses == 'AGEN' || $cek->level_akses == 'MANAGER'){
                    redirect(base_url('Agen'));
                }else{
                    $this->tools->Notif('GAGAL','Username dan Password yang anda masukan salah','error','Login');
                }

            }else{ 
                $this->tools->Notif('GAGAL','Username dan Password yang anda masukan salah','error','Login');
            }
        } else {
            $this->tools->Notif('GAGAL','Username dan Password yang anda masukan salah','error','Login');
        }
        
    }

    public function Logout()
    {
        session_destroy();
        redirect(base_url('Login'));
    }

}

/* End of file Login.php */
