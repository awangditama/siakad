<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller {

    function __construct() {
        parent::__construct();
        define('FPDF_FONTPATH', 'system/fonts/');
    }

    function index() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data['content'] = $this->load->view('index', "", true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    function data_dosen() {
        if ($this->session->userdata('login') != "") {
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $this->session->set_userdata('status', $aktif);
                $this->session->unset_userdata('matkul');
                $this->session->unset_userdata('kelas');
                $data = $this->session();
                $data1['aktif'] = "";
                $data1['krs_dosen'] = $this->data_admin->ambil_krs_dosen($this->session->userdata('username'), $this->session->userdata('status'));
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function tampil_data_pertemuan() {
        if ($this->session->userdata('login') != "") {
            if ($this->session('status') != false) {
                $data = $this->session();
                if ($this->input->get('kelas') != "" && $this->input->get('matkul') != "") {
                    if ($this->data_admin->check_mahasiswa($this->input->get('kelas'), $this->input->get('matkul'), $this->session->userdata('status')) == true) {
                        $this->session->set_userdata('kelas', $this->input->get('kelas'));
                        $this->session->set_userdata('matkul', $this->input->get('matkul'));
                        $kd_dosen = $this->session->userdata('username');
                        $kd_kelas = $this->input->get('kelas');
                        $kd_matkul = $this->input->get('matkul');
                        $kd_status = $this->session->userdata('status');
                        $data1['kelas_tampil'] = $this->session->userdata('kelas');
                        $data1['matkul_tampil'] = $this->session->userdata('matkul');
                        $data1['tabel_pertemuan_ku'] = $this->data_admin->ambil_tabel_pertemuan($kd_matkul, $kd_kelas, $kd_status);
                        $data['content'] = $this->load->view('view_data_presensi', $data1, true);
                        $this->load->view('template', $data);
                    } else {
                        $data = $this->session();
                        $data1['aktif'] = '<h1>Maaf Belum Ada Mahasiswa yang Mengambil Mata Kuliah ini</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Pemrograman Mata Kuliah Siswa</h2>';
                        $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                        $this->load->view('template', $data);
                    }
                } else {
                    $kd_dosen = $this->session->userdata('username');
                    $kd_kelas = $this->session->userdata('kelas');
                    $kd_matkul = $this->session->userdata('matkul');
                    $kd_status = $this->session->userdata('status');
                    $data1['kelas_tampil'] = $this->session->userdata('kelas');
                    $data1['matkul_tampil'] = $this->session->userdata('matkul');
                    $data1['tabel_pertemuan_ku'] = $this->data_admin->ambil_tabel_pertemuan($kd_matkul,  $kd_kelas, $kd_status);
                    $data['content'] = $this->load->view('view_data_presensi', $data1, true);
                    $this->load->view('template', $data);
                }
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function add_pertemuan() {
        if ($this->session->userdata('login') != "") {
            if ($this->session('status') != false) {
                $data = $this->session();
                $kelas = $this->session->userdata('kelas');
                $matkul = $this->session->userdata('matkul');
                $status = $this->session->userdata('status');
                $data1['kelas_tampil'] = $this->session->userdata('kelas');
                $data1['matkul_tampil'] = $this->session->userdata('matkul');
                $data1['minggu_ke'] = $this->data_admin->ambil_pertemuan($matkul, $kelas, $status);
                $data1['tabel_simultan'] = $this->data_admin->ambil_simultan($kelas, $matkul, $status);
                $data1['opsi'] = $this->data_admin->ambil_opsi();
                $data['content'] = $this->load->view('new_add_presensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function update_presensi($id) {
        if ($this->session->userdata('login') != "") {
            if ($this->session('status') != false) {
                $this->load->model('data_admin');
                $kelas = $this->session->userdata('kelas');
                $matkul = $this->session->userdata('matkul');
                $status = $this->session->userdata('status');
                $check_mahasiswa = $this->data_admin->check_mahasiswa($kelas, $matkul, $status);
                $check = $this->data_admin->check_id_presensi_nilai($id);
                if ($check_mahasiswa) {
                    $data1['matkul_tampil'] = $this->session->userdata('matkul');
                    $data1['kelas_tampil'] = $this->session->userdata('kelas');
                    $data1['update_pertemuan'] = $this->data_admin->get_data_pertemuan_id($id);
                    if ($check) {
                        $data = $this->session();
                        $this->session->set_userdata('id', $id);
                        $data1['id'] = $id;
                        $data1['judul_kolom'] = $this->data_admin->ambil_opsi_update($id);
                        $data1['tabel_simultan'] = $this->data_admin->get_id_simultan($id);
                        $data1['total_mahasiswa'] = $this->data_admin->get_total_mahasiswa($matkul, $kelas, $status);
                        $data1['mahasiswa'] = "";
                        $data['content'] = $this->load->view('new_update_presensi', $data1, true);
                        $this->load->view('template', $data);
                    }
                } else {
                    $data = $this->session();
                    $data1['mahasiswa'] = '<h1>Maaf Belum Ada Mahasiswa yang Mengambil Mata Kuliah ini</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Pemrograman Mata Kuliah Siswa</h2>';
                    $data['content'] = $this->load->view('data_simultan', $data1, true);
                    $this->load->view('template', $data);
                }
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function input_proses_opsi() {
        $data = $this->session;
        $data1 = $this->session_data_pertemuan();
        $this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'required|integer');
        if ($this->form_validation->run()) {
            $matkul = $this->input->post('matkul');
            $kelas = $this->input->post('kelas');
            $minggu_ke = $this->input->post('minggu_ke');
            $bobot = $this->input->post('bobot_nilai');
            $dosen = $this->session->userdata('username');
            $status_id = $this->session->userdata('status');
            $query = $this->data_admin->add_data_pertemuan($matkul, $dosen, $kelas, $status_id, $minggu_ke, $bobot);
            if ($query) {
                $jumlah_nilai = $this->input->post("no");
                $jumlah_kategori = $this->input->post("no1");
                $id = $this->data_admin->ambil_id_pertemuan($matkul, $kelas, $dosen, $status_id, $minggu_ke);
                for ($no = 1; $no < $jumlah_nilai; $no++) {
                    $opsi_nilai = $this->input->post('pilihan' . $no);
                    if ($opsi_nilai != 0)
                        $this->data_admin->add_pertemuan_opsi($id, $opsi_nilai);
                }
                $jumlah2 = $this->input->post("no2");
                $id_opsi = $this->data_admin->ambil_id_pertemuan_opsi($id);
               foreach ($id_opsi as $row) {
                    for ($a = 1; $a < $jumlah2; $a++) {
                        $nim = $this->input->post('nim' . $a);
                        $this->data_admin->add_simultan_nilai($row->id, $nim);
                    }
                }
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("dosen/tampil_data_pertemuan");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("dosen/tampil_data_pertemuan");
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect("dosen/tampil_data_pertemuan");
        }
    }

    function update_proses_simultan($id) {
        $this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'required|integer');
        if ($this->form_validation->run()) {
            $data = $this->session();
            $this->load->model('data_admin');
            $kelas = $this->session->userdata('kelas');
            $matkul = $this->session->userdata('matkul');
            $status = $this->session->userdata('status');
            $minggu_ke = $this->input->post('minggu_ke');
            $bobot = $this->input->post('bobot_nilai');
            $query = $this->data_admin->update_data_pertemuan($id, $bobot, $kelas, $matkul, $status, $minggu_ke);
            if ($query) {
                $jumlah = $this->input->post("no");
                $no = 1;
                for ($no = 1; $no < $jumlah; $no++) {
                    $nim = $this->input->post("nim" . $no);
                    $id_opsi = $this->data_admin->ambil_opsi_update($id);
                    $id_opsi_pilihan = $_POST["pilihan" . $no];
                    $id_simultan = $_POST["detail" . $no];
                    for ($i = 0; $i < count($id_opsi_pilihan); $i++) {
                        $this->data_admin->update_id_presensi($nim, $id_opsi_pilihan[$i], $id_simultan[$i]);
                    }
                }
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("dosen/tampil_data_pertemuan");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("dosen/tampil_data_pertemuan");
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect("dosen/tampil_data_pertemuan");
        }
    }

    function hapus_pertemuan() {
        $kelas = $this->session->userdata('kelas');
        $matkul = $this->session->userdata('matkul');
        $dosen = $this->session->userdata('username');
        $status = $this->session->userdata('status');
        $cek_id_terakhir = $this->data_admin->ambil_id_terakhir($matkul, $kelas, $status);
          if ($cek_id_terakhir != 0) {
                $id_opsi = $this->data_admin->check_id_nilai($cek_id_terakhir);
                foreach($id_opsi as $row){
                    $this->data_admin->delete_data_pertemuan_nilai_detail($row->id);
                }
                $this->data_admin->delete_data_pertemuan($cek_id_terakhir);
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect('dosen/tampil_data_pertemuan');
            } else {
                echo "<script>
                    window.location.href='" . base_url() . "index.php/dosen/tampil_data_pertemuan';
                    alert('Data Tidak Ada Yang Dihapus');
                    </script>";
            }
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

    function session_data_pertemuan() {
        $this->session->set_userdata('kelas', $this->input->post('kelas'));
        $data1['kelas'] = $this->session->userdata('kelas');
        $this->session->set_userdata('matkul', $this->input->post('matkul'));
        $data1['matkul'] = $this->session->userdata('matkul');
        return $data1;
    }

    function total_data_simultan() {
        $this->load->model('data_admin');
        $status_aktif = $this->data_admin->ambil_status();
        if ($status_aktif) {
            $data = $this->session();
            $data1['aktif'] = "";
            $data1['krs_dosen'] = $this->data_admin->ambil_krs_dosen($this->session->userdata('username'), $this->session->userdata('status'));
            $data['content'] = $this->load->view('presensi_total_nilai', $data1, true);
            $this->load->view('template', $data);
        } else {
            $data = $this->session();
            $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Tahun Ajaran</h2>';
            $data['content'] = $this->load->view('presensi_dosen', $data1, true);
            $this->load->view('template', $data);
        }
    }

    function tampil_data_simultan() {
        $data = $this->session();
        $data1 = $this->session_data_pertemuan();
        $kd_matkul = $this->input->get('matkul');
        $kd_kelas = $this->input->get('kelas');
        $data1['tampil_matkul'] = $this->input->get('matkul');
        $data1['tampil_kelas'] = $this->input->get('kelas');
        $status = $this->session->userdata('status');
        $dosen = $this->session->userdata('username');
        $data1['minggu_ke'] = $this->data_admin->get_minggu($kd_matkul, $kd_kelas, $status);
        $data1['cek'] = $this->data_admin->check_nilai_simultan($kd_matkul, $kd_kelas, $status);
        $minggu_ke = $this->data_admin->ambil_total_minggu($kd_matkul, $kd_kelas, $status, $dosen);
        foreach ($minggu_ke as $row) {
            $data1['total_nilai'][$row->minggu_ke] = $this->data_admin->ambil_nilai_simultan($kd_matkul, $kd_kelas, $status, $dosen, $row->minggu_ke);
        }
        $total_mahasiswa = $this->data_admin->ambil_simultan_array($kd_kelas, $kd_matkul, $status);
        $data1['total_pertemuan_absensi'] = $this->data_admin->get_total_pertemuan_absensi($kd_matkul, $kd_kelas, $status, $dosen);
        $no = 0;
        $a = 0;
        foreach ($total_mahasiswa as $row) {
            $data1['nim_mhs'][$no] = $row['nim'];
            $data1['nama_mhs'][$no] = $row['nama'];
            $no++;
        }
        $data1['total_mahasiswa'] = $this->data_admin->get_total_mahasiswa($kd_matkul, $kd_kelas, $status);
        $mahasiswa = $this->data_admin->ambil_mahasiswa($kd_kelas, $kd_matkul, $status);
        foreach ($mahasiswa as $row1) {
            $data1['kehadiran'][$a] = $this->data_admin->get_total_absensi($kd_matkul, $kd_kelas, $status, $dosen, $row1->nim);
            $a++;
        }
        $data1['total_minggu'] = $this->data_admin->get_total_minggu($kd_matkul, $kd_kelas, $status, $dosen);

        $data['content'] = $this->load->view('tampil_data_simultan', $data1, true);
        $this->load->view('template', $data);
    }

    function pilih_absensi() {
        $data = $this->session();
        if ($this->session->userdata('login') != "") {
            $this->load->model('data_admin');
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $this->session->set_userdata('status', $aktif);
                $this->session->unset_userdata('matkul');
                $this->session->unset_userdata('kelas');
                $data1['krs_dosen'] = $this->data_admin->ambil_krs_dosen($this->session->userdata('username'), $this->session->userdata('status'));
                $data1['aktif'] = "";
                $data['content'] = $this->load->view('presensi_absensi_dosen', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function tampil_data_absensi() {
        $data = $this->session();
        if ($this->session->userdata('login') != "") {
            if ($this->session('status') != false) {
                if ($this->input->get('matkul') == "" && $this->input->get('kelas') == "") {
                    if ($this->data_admin->check_mahasiswa($this->session->userdata("kelas"), $this->session->userdata("matkul"), $this->session->userdata('status')) == true) {
                        $kd_matkul = $this->session->userdata('matkul');
                        $kd_dosen = $this->session->userdata('username');
                        $kd_kelas = $this->session->userdata('kelas');
                        $kd_status = $this->session->userdata('status');
                        $data1['kelas'] = $kd_kelas;
                        $data1['matkul'] = $kd_matkul;
                        $data1['tabel_absensi'] = $this->data_admin->ambil_tabel_absensi($kd_matkul,  $kd_kelas, $kd_status);
                        $data['content'] = $this->load->view('view_absensi', $data1, true);
                        $this->load->view('template', $data);
                    } else {
                        $data = $this->session();
                        $data1['aktif'] = '<h1>Maaf Belum Ada Mahasiswa yang Mengambil Mata Kuliah ini</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Pemrograman Mata Kuliah Siswa</h2>';
                        $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                        $this->load->view('template', $data);
                    }
                } else {
                    if ($this->data_admin->check_mahasiswa($this->input->get('kelas'), $this->input->get('matkul'), $this->session->userdata('status')) == true) {
                        $this->session->set_userdata('kelas', $this->input->get('kelas'));
                        $this->session->set_userdata('matkul', $this->input->get('matkul'));
                        $kd_matkul = $this->input->get('matkul');
                        $kd_dosen = $this->session->userdata('username');
                        $kd_kelas = $this->input->get('kelas');
                        $kd_status = $this->session->userdata('status');
                        $data1['tabel_absensi'] = $this->data_admin->ambil_tabel_absensi($kd_matkul,  $kd_kelas, $kd_status);
                        $data1['kelas'] = $kd_kelas;
                        $data1['matkul'] = $kd_matkul;
                        $data['content'] = $this->load->view('view_absensi', $data1, true);
                        $this->load->view('template', $data);
                    } else {
                        $data = $this->session();
                        $data1['aktif'] = '<h1>Maaf Belum Ada Mahasiswa yang Mengambil Mata Kuliah ini</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Pemrograman Mata Kuliah Siswa</h2>';
                        $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                        $this->load->view('template', $data);
                    }
                }
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function isi_absensi() {
        if ($this->session->userdata('login') != "") {
            $this->load->model('data_admin');
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session();
                $kelas = $this->session->userdata('kelas');
                $matkul = $this->session->userdata('matkul');
                $status = $this->session->userdata('status');
                $data1['tabel_absensi'] = $this->data_admin->ambil_simultan($kelas, $matkul, $status);
                $data1['opsi_id_pertemuan'] = $this->data_admin->ambil_pertemuan_presensi($kelas, $matkul, $status);
                $data['content'] = $this->load->view('add_absensi', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('presensi_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function input_proses_simultan_absensi() {
        $data = $this->session();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kompetensi', 'Kompetensi', 'required');
        if ($this->form_validation->run()) {
            $date = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $kompetensi = $this->input->post('kompetensi');
            $kelas = $this->session->userdata('kelas');
            $matkul = $this->session->userdata('matkul');
            $status = $this->session->userdata('status');
            $dosen = $this->session->userdata('username');
            if ($this->data_admin->check_tanggal($date, $matkul, $kelas, $status, $kompetensi) == false) {
                $query = $this->data_admin->add_data_pertemuan_absensi($matkul, $dosen, $kelas, $status, $date, $kompetensi);
                if ($query == true) {
                    $id_tabel = $this->data_admin->ambil_id_absensi($matkul, $kelas, $dosen, $status, $date, $kompetensi);
                    $jumlah = $this->input->post("no");
                    for ($no = 1; $no < $jumlah; $no++) {
                        $id_pertemuan_absensi = $id_tabel . " " . $no;
                        $nim = $this->input->post("nim" . $no);
                        $hadir = $this->input->post("hadir" . $no);
                        $this->data_admin->add_simultan_absensi($nim, $hadir, $id_pertemuan_absensi);
                    }
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("dosen/tampil_data_absensi");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("dosen/tampil_data_absensi");
                }
            } else {
                $this->session->set_userdata('operation', "duplicate");
                $this->session->set_userdata('message', "Data gagal disimpan, karena Tanggal sudah ada");
                redirect("dosen/tampil_data_absensi");
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect("dosen/tampil_data_absensi");
        }
    }

    function update_absensi($id) {
        $data = $this->session();
        $kelas = $this->session->userdata('kelas');
        $matkul = $this->session->userdata('matkul');
        $status = $this->session->userdata('status');
        $dosen = $this->session->userdata('username');
        $data1['tanggal'] = $this->data_admin->ambil_tanggal_abensi($matkul, $kelas,  $status, $id);
        $data1['id'] = $id;
        $data1['opsi_id_pertemuan'] = $this->data_admin->ambil_pertemuan_presensi($kelas, $matkul, $status);
        $data1['tabel_absensi'] = $this->data_admin->get_id_simultan_absensi($id);
        $data['content'] = $this->load->view('update_absensi', $data1, true);
        $this->load->view('template', $data);
    }

    function update_proses_simultan_absensi() {
        $data = $this->session();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kompetensi', 'Kompetensi', 'required');
        if ($this->form_validation->run()) {
            $date = date("Y-m-d", strtotime($this->input->post('tanggal1')));
            $kompetensi = $this->input->post('kompetensi');
            $id_pertemuan_absensi = $this->input->post('id_pertemuan_absensi');
                 $query = $this->data_admin->update_data_pertemuan_absensi($date, $kompetensi, $id_pertemuan_absensi);
                if ($query == true) {
                    $jumlah = $this->input->post("no");
                    for ($no = 1; $no < $jumlah; $no++) {
                        $id_pertemuan_absensi_ganti = $id_pertemuan_absensi . " " . $no;
                        $nim = $this->input->post("nim" . $no);
                        $hadir = $this->input->post("hadir" . $no);
                        $id_absensi = $this->input->post("id_absensi" . $no);
                        $this->data_admin->update_simultan_absensi($nim, $hadir, $id_pertemuan_absensi_ganti, $id_absensi);
                    }
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("dosen/tampil_data_absensi");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("dosen/tampil_data_absensi");
                }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect("dosen/tampil_data_absensi");
        }
    }

    function hapus_absensi($id) {
        $data = $this->session();
        $query1 = $this->data_admin->delete_data_pertemuan_absensi($id);
        $query2 = $this->data_admin->delete_data_absensi($id);
        if ($query1 == true && $query2 == true) {
            $this->session->set_userdata('operation', "sukses");
            $this->session->set_userdata('message', "Data Sukses di Hapus");
            redirect("dosen/tampil_data_absensi");
        } else {
            $this->session->set_userdata('operation', "gagal");
            $this->session->set_userdata('message', "Data gagal di Hapus");
            redirect("dosen/tampil_data_absensi");
        }
    }

    function print_simultan($id) {
        // $this->load->library('fpdf');
        $data['nilai_simultan'] = $this->data_admin->get_data_pertemuan_id($id);
        $data['judul_kolom'] = $this->data_admin->ambil_opsi_update($id);
        $data['tabel_simultan'] = $this->data_admin->get_id_simultan($id);
        $this->load->view('cetak_nilai', $data);
    }

}

