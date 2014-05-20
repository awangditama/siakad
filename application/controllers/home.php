<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function index() {
        $this->load->view('home');
    }

    public function dosen() {
        $this->load->view('dosen');
    }
    
    public function login(){
        $this->load->view('login');
    }

}

?>
