<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Halaman extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $status = $this->data_admin->ambil_status();
        $tahun_ajar = $this->data_admin->ambil_tahun_ajar();
        $this->session->set_userdata('status', $status);
        $type = $this->session->userdata('type');
        $login = $this->session->userdata('login');
        if ($login != "") {
            if ($type == 1) {
                redirect('admin');
            } else if ($type == 2) {
                redirect('dosen');
            } else if ($type == 3) {
                redirect('mahasiswa');
            } else {
                redirect('halaman/logout');
            }
        }
        $this->load->view('login');
    }

    public function cek_login() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->load->model('data_admin');
            $temp = $this->data_admin->check_login($username, $password);
            if ($temp == true) {
                redirect(base_url());
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Username dan Password tidak ditemukan");
                redirect(base_url());
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect(base_url());
        }
    }

    public function logout() {//fungsi logout{          
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('status');
        redirect(base_url());
    }

}