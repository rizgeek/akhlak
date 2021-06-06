<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $session = $this->session->userdata('login');
        if($session){
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
        $this->tools->view('10_V_update_password');
    }

    public function updatePassword()
    {
        
        $this->form_validation->set_rules($this->validasidata->cekInput('updtepassword'));
        if ($this->form_validation->run() == TRUE) {
            $passwordBaru = $this->input->post('passwordBaru');
            $passwordUlang = $this->input->post('passwordUlang');
            if($passwordBaru === $passwordUlang){
                $username = $this->session->userdata('username');
                $passwordLama = $this->input->post('passwordLama');
                $cek = $this->model->ambilDataTertentu('tb_akun',['username' => $username, 'password' => sha1($passwordLama)])->row();
                if(!$cek == NULL){
                    $data = array(
                        'password' =>sha1($passwordUlang)
                    );
                    $this->model->updateData('tb_akun',$data,['username' => $username, 'password' => sha1($passwordLama)]);
                    $this->tools->Notif('Berhasil','Password Berhasil di update silahkan login kembali','success','Login');
                }else{
                    $this->tools->Notif('Perhatian','Password Lama yang anda masukan tidak sesuai','warning','Setting');
                }
                
            }else{
                $this->tools->Notif('Perhatian','Password baru dan validasi tidak sesuai','error','Setting');
            }

        } else {
            $this->tools->Notif('Perhatian','Minimal Password terdiri dari 6 digit','warning','Setting');
        }
        
        
    }

}

/* End of file Setting.php */
