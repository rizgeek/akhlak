<?php

class menu
{
    public function sidebar()
    {
        $pengguna = array(
            array('label' => 'Data Pengguna','url' =>  base_url('Admin/dataPengguna')),
            array('label' => 'Tambah Pengguna','url' =>   base_url('Admin/tambahPengguna')),
        );

        $kegiatan = array(
            array('label' => 'Data Kegiatan','url' =>  base_url('Admin/dataKegiatan')),
            array('label' => 'Tambah Kegiatan','url' =>  base_url('Admin/tambahKegiatan')),
        );

        
        $menuAdmin = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin'),'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin/dataUnit'),'icon' => 'fa fa-tree', 'label' => 'Unit'),
            array('child' => TRUE, 'child_menu' => $pengguna, 'url' => '#','icon' => 'fa fa-users', 'label' => 'Pengguna'),
            array('child' => TRUE, 'child_menu' => $kegiatan, 'url' => '#','icon' => 'fa fa-calendar', 'label' => 'Kegiatan'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin/downloadLaporan'),'icon' => 'fa fa-book', 'label' => 'Laporan'),
        );

        return $menuAdmin;
    }

    
    public function Agen()
    {
        $menuAgen = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Agen'),'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
        );

        return $menuAgen;
    }

}
