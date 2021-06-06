<?php
class ValidasiData
{
    public function cekInput($validasi)
    {
        $aturanValidasi = null;
        switch ($validasi) {

            case 'login':
                $aturanValidasi = [
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[6]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                ];
                break;

            case 'unit':
                $aturanValidasi = [
                    ['field' => 'kode_unit', 'label' => 'kode_unit', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nama_unit', 'label' => 'nama_unit', 'rules' => 'required|min_length[2]'],
                ];
                break;

            case 'pengguna' :
                $aturanValidasi = [
                    ['field' => 'nama_pengguna', 'label' => 'nama_pengguna  ', 'rules' => 'required|min_length[3]'],
                    ['field' => 'kdUnit', 'label' => 'kdUnit', 'rules' => 'required|min_length[9]'],
                    ['field' => 'levelAkses', 'label' => 'levelAkses', 'rules' => 'required|min_length[2]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[6]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                ];
                break;

            case 'kegiatan' :
                $aturanValidasi = [
                    ['field' => 'namaKegiatan', 'label' => 'namaKegiatan  ', 'rules' => 'required|min_length[3]'],
                    ['field' => 'bulanKegiatan', 'label' => 'bulanKegiatan', 'rules' => 'required'],
                    ['field' => 'jmlRkapLaporan', 'label' => 'jmlRkapLaporan', 'rules' => 'required'],
                    ['field' => 'tanggalKumpul', 'label' => 'tanggalKumpul', 'rules' => 'required'],
                ];
                break;

            case 'upload' :
                $aturanValidasi = [
                    ['field' => 'kdKegiatan', 'label' => 'kdKegiatan  ', 'rules' => 'required'],
                    ['field' => 'tanggalUpload', 'label' => 'tanggalUpload', 'rules' => 'required'],
                ];
                break;

                case 'updtepassword' :
                    $aturanValidasi = [
                        ['field' => 'passwordLama', 'label' => 'passwordLama  ', 'rules' => 'required|min_length[6]'],
                        ['field' => 'passwordBaru', 'label' => 'passwordBaru', 'rules' => 'required|min_length[6]'],
                        ['field' => 'passwordUlang', 'label' => 'passwordUlang', 'rules' => 'required|min_length[6]'],
                    ];
                    break;


            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
