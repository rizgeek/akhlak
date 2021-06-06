<?php 

class Tools
{
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('model');
        $this->CI->load->library('menu');

    }

    public function view($halaman, $data = null)
    {
        // PARSING MENU SESUAI DENGAN JENIS ENTITAS
        $sidebar = '';
        $levelAkses = $this->CI->session->userdata('level_akses');

        if($levelAkses == 'ADMIN'){
            $sidebar=$this->CI->menu->sidebar();
        }elseif($levelAkses == 'AGEN'){
            $sidebar=$this->CI->menu->Agen();
        }elseif($levelAkses == 'MANAGER'){
            $sidebar=$this->CI->menu->Agen();
        }else{
            redirect(base_url('Login/Logout'));
        }

        $menu['menu'] = $sidebar;


        $this->CI->load->view('PARTIAL/head');
        $this->CI->load->view('PARTIAL/menu_mobile',$menu);
        $this->CI->load->view('PARTIAL/menu_desktop',$menu);
        $this->CI->load->view('PARTIAL/header_desktop');
        $this->CI->load->view("DALAM/$halaman",$data);
        $this->CI->load->view('PARTIAL/footer');
    }

    public function generateKode($tabel,$kolom,$initial){
        $kode = $this->CI->model->query("SELECT MAX($kolom) as maxKode FROM $tabel")->row();
        $kode = $kode->maxKode;

        $noUrut = (int) substr($kode, 3,17);
        $noUrut++;
        $kode = $initial.sprintf('%07s',$noUrut);
        return $kode; 
    }

    public function Notif($text1,$text2,$icon,$alamat)
    {
        $notif = "Swal.fire('$text1','$text2','$icon');";
        $this->CI->session->set_flashdata('PESAN', $notif);
        redirect(base_url($alamat));
    }

    
}