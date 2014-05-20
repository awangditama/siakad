<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        define('FPDF_FONTPATH', 'system/fonts/');
    }

    function session() {
        $this->load->model('data_admin');
        $nama_type = $this->data_admin->ambil_type($this->session->userdata('type'));
        $this->session->set_userdata('nama_type', $nama_type);
        $data['nama'] = $this->session->userdata('username');
        $data['status'] = $this->session->userdata('status');
        $data['type'] = $this->session->userdata('nama_type');
        $this->data_admin->check_name($this->session->userdata('username'), $this->session->userdata('type'));
        return $data;
    }

    function index() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
                $data = $this->session();
                $data['content'] = $this->load->view('index', '', true);
                $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }
    
    function lihat_kuisoner(){
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $data['content'] = $this->load->view('mahasiswa_kuisoner', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function lihat_kuisoner_k() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $data['content'] = $this->load->view('mahasiswa_kuisoner_k', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

     function proses_kuisoner() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $pilihan1 = $this->input->post('pilihan1');
                $pilihan2 = $this->input->post('pilihan2');
                $pilihan3 = $this->input->post('pilihan3');
                $pilihan4 = $this->input->post('pilihan4');
                $pilihan5 = $this->input->post('pilihan5');
                $pilihan6 = $this->input->post('pilihan6');
                $pilihan7 = $this->input->post('pilihan7');
                $pilihan8 = $this->input->post('pilihan8');
                $pilihan9 = $this->input->post('pilihan9');
                $pilihan10 = $this->input->post('pilihan10');     
                $nim = $this->session->userdata('username');
                $status = $this->session->userdata('status');
                $matkul = $this->session->userdata('matkul');
                $kelas = $this->session->userdata('kelas');
                $this->data_admin->add_kuisoner_total_nilai($matkul,$kelas,$status,$nim);
                $id_kuisoner = $this->data_admin->ambil_id_kuisoner_total_nilai($nim,$matkul,$kelas,$status);
                $array = array($pilihan1, $pilihan2, $pilihan3, $pilihan4, $pilihan5, $pilihan6,$pilihan7,$pilihan8,$pilihan9,$pilihan10);
                for ($i = 1; $i <= count($array); $i++) {
                    $nilai = $_POST['pilihan' . $i];
                    $query = $this->data_admin->add_kuisoner_detail_total_nilai($id_kuisoner, $nilai);
                }
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("mahasiswa/view_total_nilai");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("mahasiswa/view_total_nilai");
                }
            } else {
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }
    
    function proses_kusioner_k() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $pilihan1 = $this->input->post('pilihan1');
                $soal1 = $this->input->post('soal1');
                $pilihan2 = $this->input->post('pilihan2');
                $pilihan3 = $this->input->post('pilihan3');
                $pilihan4 = $this->input->post('pilihan4');
                $pilihan5 = $this->input->post('pilihan5');
                $pilihan6 = $this->input->post('pilihan6');
                $nim = $this->session->userdata('username');
                $id = $this->session->userdata('id');
                $this->data_admin->add_kuisoner($id, $nim);
                $id_kuisoner = $this->data_admin->ambil_id_kuisoner($id, $nim);
                $array = array($pilihan1, $pilihan2, $pilihan3, $pilihan4, $pilihan5, $pilihan6);
                for ($i = 1; $i <= count($array); $i++) {
                    $nilai = $_POST['pilihan'.$i];
                    $soal = $_POST['soal'.$i];
                   $query = $this->data_admin->add_kuisoner_detail($id_kuisoner, $soal,$nilai);
                }
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("mahasiswa/view_presensi_kompetensi");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("mahasiswa/view_presensi_kompetensi");
                }
            } else {
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function lihat_nilai_presensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $data1['tabel_mata_kuliah_mhs'] = $this->data_admin->ambil_tabel_mahasiswa($this->session->userdata('username'), $this->session->userdata('status'));
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->session->unset_userdata('session_matkul');
                $this->session->unset_userdata('session_kelas');
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function view_presensi_kompetensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                if($this->input->get('var1')!="" && $this->input->get('var2')!="" ){
                    $matkul = $this->input->get('var1');
                    $kelas = $this->input->get('var2');  
                    $this->session->set_userdata('session_matkul', $matkul);
                    $this->session->set_userdata('session_kelas', $kelas);
                }else{
                    $matkul = $this->session->userdata('session_matkul');
                    $kelas = $this->session->userdata('session_kelas'); 
                }
                $data = $this->session();
                $data1['aktif'] = '';
                $data1['kd_matkul'] = $matkul;
                $data1['kd_kelas'] = $kelas;   
                $data1['ambil_tabel_pertemuan'] = $this->data_admin->ambil_tabel_pertemuan_mhs($matkul, $kelas, $this->session->userdata('status'));
                $data['content'] = $this->load->view('mahasiswa_nilai_kompetensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function detail_presensi_kompetensi($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $cek_kuisoner = $this->data_admin->check_id_kuisoner($id, $this->session->userdata('username'));
                $this->session->unset_userdata('id');
                if ($cek_kuisoner == false) {
                    $this->session->set_userdata('id', $id);
                    redirect(base_url() . "index.php/mahasiswa/lihat_kuisoner_k");
                }
                $data = $this->session();
                $data1['aktif'] = '';
                $data1['kd_matkul'] = $this->session->userdata('session_matkul');
                $data1['kd_kelas'] = $this->session->userdata('session_kelas');
                $data1['pertemuan'] = $this->data_admin->get_pertemuan_presensi($id);
                $data1['judul_kolom'] = $this->data_admin->ambil_opsi_lihat_nilai($id, $this->session->userdata('username'));
                $data1['nilai'] = $this->data_admin->get_nilai_detail_presensi($id, $this->session->userdata('username'));
                $data['content'] = $this->load->view('mahasiswa_detail_presensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function lihat_absensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $data1['tabel_mata_kuliah_mhs'] = $this->data_admin->ambil_tabel_mahasiswa($this->session->userdata('username'), $this->session->userdata('status'));
                $data['content'] = $this->load->view('mahasiswa_absensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function lihat_detail_absensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $matkul = $this->input->get('var1');
                $kelas = $this->input->get('var2');
                $data1['kd_matkul'] = $matkul;
                $data1['kd_kelas'] = $kelas;
                $data1['total_pertemuan'] = $this->data_admin->get_jumlah_pertemuan_mhs($matkul, $kelas, $this->session->userdata('status'), $this->session->userdata('username'));
                $data1['tdk_hadir'] = $this->data_admin->get_tdk_hadir_mhs($matkul, $kelas, $this->session->userdata('status'), $this->session->userdata('username'));
                $data1['hadir'] = $this->data_admin->get_hadir_mhs($matkul, $kelas, $this->session->userdata('status'), $this->session->userdata('username'));
                $data1['tabel'] = $this->data_admin->ambil_tabel_absensi_mhs($matkul, $kelas, $this->session->userdata('status'), $this->session->userdata('username'));
                $data['content'] = $this->load->view('mahasiswa_detail_absensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function view_total_nilai() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $data1['aktif'] = '';
                $data1['tabel_mata_kuliah_mhs'] = $this->data_admin->ambil_tabel_mahasiswa($this->session->userdata('username'), $this->session->userdata('status'));
                $data['content'] = $this->load->view('mahasiswa_total_nilai', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_nilai_presensi', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function total_nilai_mhs_detail() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data1['aktif'] = '';
                $kd_matkul = $this->input->get('var1');
                $kd_kelas = $this->input->get('var2');        
                $cek_kuisoner = $this->data_admin->check_id_kuisoner_k($kd_matkul,$kd_kelas,$this->session->userdata('status'), $this->session->userdata('username'));
                $this->session->unset_userdata('id');
                if ($cek_kuisoner == false) {
                    $this->session->set_userdata('matkul', $kd_matkul);
                    $this->session->set_userdata('kelas', $kd_kelas);                    
                    redirect(base_url() . "index.php/mahasiswa/lihat_kuisoner");
                }
                $data1['kd_matkul'] = $kd_matkul;
                $data1['kd_kelas'] = $kd_kelas;
                $status = $this->session->userdata('status');
                $nim = $this->session->userdata('username');
                $data1['minggu_ke'] = $this->data_admin->get_minggu($kd_matkul, $kd_kelas, $status);
                $data1['cek'] = $this->data_admin->check_nilai_simultan($kd_matkul, $kd_kelas, $status);    
                $minggu_ke = $this->data_admin->ambil_total_minggu_mahasiswa($kd_matkul, $kd_kelas, $status);
                $a = 1;
                foreach ($minggu_ke as $row) {
                    $data1['total_nilai'][$row->minggu_ke] = $this->data_admin->ambil_nilai_simultan_mahasiswa($kd_matkul, $kd_kelas, $status, $nim, $row->minggu_ke);
                }
                $data1['total_pertemuan_absensi'] = $this->data_admin->get_total_pertemuan_absensi_mahasiswa($kd_matkul, $kd_kelas, $status);
                $data1['kehadiran'] = $this->data_admin->get_total_absensi_mahasiswa($kd_matkul, $kd_kelas, $status, $nim);
                $data1['total_minggu'] = $this->data_admin->get_total_minggu_mahasiswa($kd_matkul, $kd_kelas, $status);
                $data['content'] = $this->load->view('mahasiswa_detail_total_nilai', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('mahasiswa_kuisoner_k', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

}