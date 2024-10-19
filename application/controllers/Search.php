<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    private $pixabay_api_key = '46612293-c0ad1fa4e900c3ce9f511f2f5';

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('search/index');
    }

    public function search_media() {
        $query = $this->input->get('query');
        $media_type = $this->input->get('media_type');

        $url = "https://pixabay.com/api/?key={$this->pixabay_api_key}&q=" . urlencode($query);
        
        if ($media_type == 'video') {
            $url .= "&video_type=all";
        }

        $response = file_get_contents($url);
        $results = json_decode($response, true);

        $data['results'] = $results['hits'];
        $data['media_type'] = $media_type;

        $this->load->view('templates/header');
        $this->load->view('search/results', $data);
    }
}