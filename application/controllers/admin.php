<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data['content'] = $this->load->view('index', "", true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function data_admin() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            //halaman
            $page = $this->uri->segment(3);
            $limit = '5';
            if (!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;
            $data1['tot'] = $offset;
            $config['base_url'] = base_url() . 'index.php/admin/data_admin';
            $config['total_rows'] = $this->data_admin->jmlh_tabel_status();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data1["paginator"] = $this->pagination->create_links();
            //status
            $data1['pilihan'] = '<input text="hidden" name="status" value="0"/>';
            $data1['kata'] = "Sudah Aktif, silahkan anda edit terlebih dahulu";
            $cek = $this->data_admin->cek_status();
            foreach ($cek as $hasil):
                if ($hasil->status == 1) {
                    $data1['pilihan'] = '<input type="hidden" name="status" value="0"/>';
                    $data1['kata'] = "Sudah Aktif, silahkan anda edit terlebih dahulu";
                    break;
                } else {
                    $data1['pilihan'] = '<input type="checkbox" name="status" value="1"/>';
                    $data1['kata'] = "Aktif";
                }
            endforeach;
            $this->session->set_userdata('message', "");
            $data1['tabel'] = $this->data_admin->tabel_status($limit, $offset);
            $data1['isi_semester'] = $this->data_admin->ambil_semester();
            $data['content'] = $this->load->view('data_admin', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function isi_status() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data1['pilihan'] = '<input text="hidden" name="status" value="0"/>';
            $data1['kata'] = "Sudah Aktif, silahkan anda edit terlebih dahulu";
            $cek = $this->data_admin->cek_status();
            foreach ($cek as $hasil):
                if ($hasil->status == 1) {
                    $data1['pilihan'] = '<input type="hidden" name="status" value="0"/>';
                    $data1['kata'] = "Sudah Aktif, silahkan anda edit terlebih dahulu";
                    break;
                } else {
                    $data1['pilihan'] = '<input type="checkbox" name="status" value="1"/>';
                    $data1['kata'] = "Aktif";
                }
            endforeach;
            $this->session->set_userdata('message', "");
            $data1['isi_semester'] = $this->data_admin->ambil_semester();
            $data['content'] = $this->load->view('add_status', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function input_form_status() {
        $this->form_validation->set_rules('tahun_ajar1', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('tahun_ajar2', 'Tahun Ajaran', 'required');
        $semester = $this->input->post('semester');
        if ($this->form_validation->run() && $semester != 0) {
            $tahun_ajar1 = $this->input->post('tahun_ajar1', true);
            $tahun_ajar2 = $this->input->post('tahun_ajar2', true);
            if ($this->data_admin->check_status($tahun_ajar1, $tahun_ajar2, $semester) == false) {
                $status = $this->input->post('status');
                $query = $this->data_admin->add_data_status($tahun_ajar1, $tahun_ajar2, $semester, $status);
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/data_admin");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/data_admin");
                }
            } else {
                $this->session->set_userdata('operation', "duplicate");
                $this->session->set_userdata('message', "Data gagal disimpan, karena Tahun Ajaran dan Semester sudah ada");
                redirect("admin/data_admin");
            }
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_admin");
        }
    }

    public function update_status($id) {
        $data = $this->session_normal();
        $data1['data_update'] = $this->data_admin->get_data_status_id($id);
        $data1['isi_semester'] = $this->data_admin->ambil_semester();
        $data1['check_status_aktif'] = $this->data_admin->check_status_aktif();
        $data['content'] = $this->load->view('update_admin', $data1, true);
        $this->load->view('template', $data);
    }

    public function proses_update_status($id) {
        if ($this->session->userdata('login') != "") {
            $this->form_validation->set_rules('tahun_ajar1', 'Tahun Ajaran', 'required');
            $this->form_validation->set_rules('tahun_ajar2', 'Tahun Ajaran', 'required');
            $semester = $this->input->post('semester');
            if ($this->form_validation->run() && $semester != 0) {
                $tahun_ajar1 = $this->input->post('tahun_ajar1', true);
                $tahun_ajar2 = $this->input->post('tahun_ajar2', true);
                $status = $this->input->post('status');
                $query = $this->data_admin->update_data_status($id, $tahun_ajar1, $tahun_ajar2, $semester, $status);
                if ($query = true) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/data_admin");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/data_admin");
                }
            } else {
                $this->session->set_userdata('operation', "duplicate");
                $this->session->set_userdata('message', validation_errors());
                redirect("admin/data_admin");
            }
            redirect('admin/data_admin');
        } else {
            redirect(base_url());
        }
    }

    public function hapus_status($id) {
        if ($this->session->userdata('login') != "") {
            $this->data_admin->delete_data_status($id);
            if ($query = true) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/data_admin");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/data_admin");
            }
        } else {
            redirect(base_url());
        }
    }

    public function data_dosen() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            //halaman
            $page = $this->uri->segment(3);
            $limit = '5';
            if (!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;
            $data1['tot'] = $offset;
            $config['base_url'] = base_url() . 'index.php/admin/data_dosen';
            $config['total_rows'] = $this->data_admin->jmlh_tabel_biodata_dosen();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data1["paginator"] = $this->pagination->create_links();
            //status

            $this->session->set_userdata('message', "");
            $data1['tabel'] = $this->data_admin->tabel_biodata_dosen($limit, $offset);
            $data['content'] = $this->load->view('data_dosen', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function add_dosen() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data['content'] = $this->load->view('add_biodata_dosen', '', true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function update_dosen($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data1['data_dosen'] = $this->data_admin->get_data_biodata_id($id);
            $data1['check_login'] = $this->data_admin->check_login_dosen($id);
            $data['content'] = $this->load->view('update_biodata_dosen', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function reset_password($nip) {
        if ($this->session->userdata('login') != "") {
            $query = $this->data_admin->hapus_login($nip);
            if ($query = true) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/data_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/data_dosen");
            }
        } else {
            redirect(base_url());
        }
    }

    public function update_proses_dosen() {
        $this->form_validation->set_rules('nip1', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('tempat', 'tempat lahir', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        if ($this->form_validation->run()) {
            $nip = $this->input->post('nip1', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $tanggal = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $tempat = $this->input->post('tempat', true);
            $jabatan = $this->input->post('jabatan', true);
            $telp = $this->input->post('telp', true);
            $jk = $this->input->post('jk', true);
            $check_login = $this->data_admin->check_login_dosen($nip);
            if ($check_login) {
                $query = $this->data_admin->update_data_biodata_dosen($nip, $nama, $alamat, $tempat, $tanggal, $jabatan, $telp, $jk);
            } else {
                $password = md5($this->input->post('password', true));
                $query = $this->data_admin->update_data_biodata_dosen($nip, $nama, $alamat, $tempat, $tanggal, $jabatan, $telp, $jk);
                $query1 = $this->data_admin->add_data_login($nip, $password);
            }
            if ($query || $query1) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/data_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/data_dosen");
            }
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_dosen");
        }
    }

    public function proses_add_dosen() {
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('tempat', 'tempat lahir', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('password1', 'password1', 'required');
        if ($this->form_validation->run()) {
            $nip = $this->input->post('nip', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $tanggal = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $tempat = $this->input->post('tempat', true);
            $jabatan = $this->input->post('jabatan', true);
            $telp = $this->input->post('telp', true);
            $jk = $this->input->post('jk', true);
            $password = md5($this->input->post('password', true));
            $query = $this->data_admin->add_data_biodata_dosen($nip, $nama, $alamat, $tempat, $tanggal, $jabatan, $telp, $jk);
            $query1 = $this->data_admin->add_data_login($nip, $password);
            if ($query && $query1) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/data_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/data_dosen");
            }
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_dosen");
        }
    }

    function delete_dosen($nip) {
        if ($this->session->userdata('login') != "") {
            $query1 = $this->data_admin->delete_biodata_dosen($nip);
            $query = $this->data_admin->hapus_login($nip);
            if ($query && $query1) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/data_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/data_dosen");
            }
        } else {
            redirect(base_url());
        }
    }

    function data_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            //halaman
            $page = $this->uri->segment(3);
            $limit = '5';
            if (!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;
            $data1['tot'] = $offset;
            $config['base_url'] = base_url() . 'index.php/admin/data_matkul';
            $config['total_rows'] = $this->data_admin->jmlh_tabel_matkul();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data1["paginator"] = $this->pagination->create_links();
            //status

            $this->session->set_userdata('message', "");
            $data1['tabel'] = $this->data_admin->tabel_matkul($limit, $offset);
            $data['content'] = $this->load->view('data_matkul', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    function add_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data1['isi_semester'] = $this->data_admin->ambil_semester();
            $data['content'] = $this->load->view('add_matkul', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    function update_matkul($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $data1['data_matkul'] = $this->data_admin->get_data_matkul($id);
            $data1['isi_semester'] = $this->data_admin->ambil_semester();
            $data['content'] = $this->load->view('update_matkul', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    function delete_matkul($nip) {
        if ($this->session->userdata('login') != "") {
            $query1 = $this->data_admin->delete_data_matkul($nip);
            if ($query1) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/data_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/data_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_add_matkul() {
        $this->form_validation->set_rules('kd_matkul', 'KODE MATKUL', 'required');
        $this->form_validation->set_rules('nm_matkul', 'NAMA MATKUL', 'required');
        $this->form_validation->set_rules('jml_sks', 'JUMLAH SKS', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        if ($this->form_validation->run()) {
            $kd_matkul = $this->input->post('kd_matkul', true);
            $nm_matkul = $this->input->post('nm_matkul', true);
            $jml_sks = $this->input->post('jml_sks', true);
            $semester = $this->input->post('semester', true);
            $query = $this->data_admin->add_data_matkul($kd_matkul, $nm_matkul, $jml_sks, $semester);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/data_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/data_matkul");
            }
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_matkul");
        }
    }

    public function proses_update_matkul() {
        $this->form_validation->set_rules('kd_matkul1', 'KODE MATKUL', 'required');
        $this->form_validation->set_rules('nm_matkul', 'NAMA MATKUL', 'required');
        $this->form_validation->set_rules('jml_sks', 'JUMLAH SKS', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        if ($this->form_validation->run()) {
            $kd_matkul = $this->input->post('kd_matkul1', true);
            $nm_matkul = $this->input->post('nm_matkul', true);
            $jml_sks = $this->input->post('jml_sks', true);
            $kd_semester = $this->input->post('semester', true);
            $query = $this->data_admin->update_data_matkul($kd_matkul, $nm_matkul, $jml_sks, $kd_semester);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/data_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/data_matkul");
            }
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_matkul");
        }
    }

    public function data_kuisoner_total_nilai() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            //halaman
            $page = $this->uri->segment(3);
            $limit = '5';
            if (!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;
            $data1['tot'] = $offset;
            $config['base_url'] = base_url() . 'index.php/admin/data_lihat_nilai_kuisoner';
            $config['total_rows'] = $this->data_admin->jmlh_tabel_kuisoner_total_nilai($this->session->userdata('status'));
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data1["paginator"] = $this->pagination->create_links();
            //status

            $this->session->set_userdata('message', "");
            $data1['tabel'] = $this->data_admin->tabel_kuisoner($limit, $offset, $this->session->userdata('status'));
            $data['content'] = $this->load->view('data_lihat_nilai_kuisoner', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function data_kuisoner() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            //halaman
            $page = $this->uri->segment(3);
            $limit = '5';
            if (!$page):
                $offset = 0;
            else:
                $offset = $page;
            endif;
            $data1['tot'] = $offset;
            $config['base_url'] = base_url() . 'index.php/admin/data_lihat_nilai_kuisoner';
            $config['total_rows'] = $this->data_admin->jmlh_tabel_pertemuan_matkul($this->session->userdata('status'));
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data1["paginator"] = $this->pagination->create_links();
            //status
            $this->session->set_userdata('message', "");
            $data1['tabel'] = $this->data_admin->tabel_kuisoner_k($limit, $offset, $this->session->userdata('status'));
            $data['content'] = $this->load->view('data_lihat_nilai_kuisoner_k', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function lihat_nilai_ipd() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $matkul = $this->input->post('matkul');
            $data1['matkul'] = $this->input->post('matkul');
            $data1['nm_matkul'] = $this->input->post('nm_matkul');
            $data1['tabel_kuisoner'] = $this->data_admin->tabel_lihat_nilai_ipd($matkul, $this->session->userdata('status'));
            $data['content'] = $this->load->view('detail_nilai_kuisoner', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function lihat_nilai_evaluasi_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session_normal();
            $matkul = $this->input->post('matkul');
            $data1['cek_grafik'] = $this->data_admin->cek_grafik_kuisoner($matkul, $this->session->userdata('status'));
            $data1['matkul'] = $this->input->post('matkul');
            $data1['nm_matkul'] = $this->input->post('nm_matkul');
            $data1['grafik'] = $this->data_admin->grafik_kuisoner($matkul, $this->session->userdata('status'));
            $data['content'] = $this->load->view('grafik_kuisoner', $data1, true);
            $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function upload_file() {
        if ($this->session->userdata('login') != "") {
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session_normal();
                $data1['aktif'] = '';
                $data['content'] = $this->load->view('upload_file_krs_mahasiswa', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session_normal();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('upload_file_krs_mahasiswa', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_upload_krs_mahasiswa() {
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', $this->upload->display_errors());
            redirect('admin/upload_file');
        } else {
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            $temp=1;
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$temp - 1]['nim'] = $data['cells'][$i][1];
                $dataexcel[$temp - 1]['kd_kls'] = $data['cells'][$i][2];
                $dataexcel[$temp - 1]['kd_matkul'] = $data['cells'][$i][3];
                $dataexcel[$temp - 1]['status'] = $this->session->userdata('status');
                $temp++;
            }
            delete_files($upload_data['file_path']);
            $cek = $this->data_admin->krsmahasiswa($dataexcel);
            if ($cek) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Masukkan");
                redirect('admin/upload_file');
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data Gagal Di masukkan");
                redirect('admin/upload_file');
            }
        }
    }
    
    public function upload_file_dosen() {
        if ($this->session->userdata('login') != "") {
            $aktif = $this->data_admin->ambil_status();
            if ($aktif != false) {
                $data = $this->session_normal();
                $data1['aktif'] = '';
                $data['content'] = $this->load->view('upload_file_krs_dosen', $data1, true);
                $this->load->view('template', $data);
            } else {
                $data = $this->session_normal();
                $data1['aktif'] = '<h1>Maaf Tahun ajaran perkuliahan anda belum Aktif</h1><h2 style="color:red">Hubungi Admin 
                                    untuk mengedit Tahun Ajaran</h2>';
                $data['content'] = $this->load->view('upload_file_krs_dosen', $data1, true);
                $this->load->view('template', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_upload_krs_dosen() {
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', $this->upload->display_errors());
            redirect('admin/upload_file_dosen');
        } else {
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            $temp=1;
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$temp - 1]['nip'] = $data['cells'][$i][1];
                $dataexcel[$temp - 1]['kd_kls'] = $data['cells'][$i][2];
                $dataexcel[$temp - 1]['kd_matkul'] = $data['cells'][$i][3];
                $dataexcel[$temp - 1]['status'] = $this->session->userdata('status');
                $temp++;           
            }
            delete_files($upload_data['file_path']);
            $cek = $this->data_admin->krsdosen($dataexcel);
            if ($cek) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Masukkan");
                redirect('admin/upload_file_dosen');
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data Gagal Di masukkan");
                redirect('admin/upload_file_dosen');
            }
        }
    }

    public function upload_file_matkul() {
        if ($this->session->userdata('login') != "") {
              $data = $this->session_normal();
                $data['content'] = $this->load->view('upload_file_matkul', '', true);
                $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_upload_matkul() {
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', $this->upload->display_errors());
            redirect('admin/upload_file_matkul');
        } else {
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            $temp =1;
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$temp - 1]['kd_matkul'] = $data['cells'][$i][1];
                $dataexcel[$temp - 1]['nm_matkul'] = $data['cells'][$i][2];
                $dataexcel[$temp - 1]['jml_sks'] = $data['cells'][$i][3];
                $dataexcel[$temp - 1]['semester'] = $data['cells'][$i][4];
                $temp++;
                
            }
            delete_files($upload_data['file_path']);
            $cek = $this->data_admin->data_matkul($dataexcel);
            if ($cek) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Masukkan");
                redirect('admin/upload_file_matkul');
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data Gagal Di masukkan");
                redirect('admin/upload_file_matkul');
            }
        }
    }
    
     public function upload_file_mahasiswa() {
        if ($this->session->userdata('login') != "") {
              $data = $this->session_normal();
                $data['content'] = $this->load->view('upload_file_mahasiswa', '', true);
                $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_upload_mahasiswa() {
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', $this->upload->display_errors());
            redirect('admin/upload_file_mahasiswa');
        } else {
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            $temp;
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$temp - 1]['nim'] = $data['cells'][$i][1];
                $dataexcel[$temp - 1]['nama'] = $data['cells'][$i][2];
                $temp++;
                
            }
            delete_files($upload_data['file_path']);
            $cek = $this->data_admin->data_upload_mahasiswa($dataexcel);
            if ($cek) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Masukkan");
                redirect('admin/upload_file_mahasiswa');
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data Gagal Di masukkan");
                redirect('admin/upload_file_mahasiswa');
            }
        }
    }

     
     public function upload_file_login() {
        if ($this->session->userdata('login') != "") {
              $data = $this->session_normal();
                $data['content'] = $this->load->view('upload_file_login', '', true);
                $this->load->view('template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_upload_file_login() {
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', $this->upload->display_errors());
            redirect('admin/upload_file_login');
        } else {
            $upload_data = $this->upload->data();
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            // Sheet 1
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            $temp=1;
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$temp - 1]['username'] = $data['cells'][$i][1];
                $dataexcel[$temp - 1]['password'] = $data['cells'][$i][2];
                $dataexcel[$temp - 1]['type'] = $data['cells'][$i][3];
                $temp++;
            }
            delete_files($upload_data['file_path']);
            $cek = $this->data_admin->data_upload_login($dataexcel);
            if ($cek) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Masukkan");
                redirect('admin/upload_file_login');
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data Gagal Di masukkan");
                redirect('admin/upload_file_login');
            }
        }
    }

    public function session_normal() {
        $nama_type = $this->data_admin->ambil_type($this->session->userdata('type'));
        $this->session->set_userdata('nama_type', $nama_type);
        $data['nama'] = $this->session->userdata('username');
        $data['type'] = $this->session->userdata('nama_type');
        $data['status'] = $this->session->userdata('status');
        $this->data_admin->check_name($this->session->userdata('username'), $this->session->userdata('type'));
        return $data;
    }

}