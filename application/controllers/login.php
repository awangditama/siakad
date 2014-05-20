<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    
     
    function __construct() {
        parent::__construct();
    }

   
    public function index() {
        $this->load->view('login');  
    }

    public function form() {       
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->load->model('data_admin');
            $temp = $this->data_admin->check_login($username, $password);
            if ($temp == true) {
                echo "sukses";
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "data gagal di insert");
                redirect(base_url());
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect(base_url());
            
        }
    }
}