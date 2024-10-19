<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['user_name'] = $this->session->userdata('user_name');
        $data['user_picture'] = $this->session->userdata('user_picture');
        $this->load->view('templates/header');
        $this->load->view('dashboard/index', $data);
    }
}