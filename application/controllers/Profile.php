<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $data['user']->picture = base64_encode($data['user']->picture);
        $this->load->view('templates/header');
        $this->load->view('profile/index', $data);
    }

    public function update() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $user_id = $this->session->userdata('user_id');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );

            // Handle base64 image data
            $picture_data = $this->input->post('picture');
            if ($picture_data) {
                if (preg_match('/^data:image\/(\w+);base64,/', $picture_data, $type)) {
                    $picture_data = substr($picture_data, strpos($picture_data, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif

                    if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                        $this->session->set_flashdata('error', 'Invalid image type');
                        redirect('profile');
                    }

                    $picture_data = base64_decode($picture_data);

                    if ($picture_data === false) {
                        $this->session->set_flashdata('error', 'Invalid image data');
                        redirect('profile');
                    }

                    $data['picture'] = $picture_data;
                } else {
                    $this->session->set_flashdata('error', 'Invalid image format');
                    redirect('profile');
                }
            }

            $this->User_model->update_user($user_id, $data);
            $this->session->set_userdata('user_name', $data['name']);
            if (isset($data['picture'])) {
                $this->session->set_userdata('user_picture', base64_encode($data['picture']));
            }
            $this->session->set_flashdata('success', 'Profile updated successfully');
            redirect('profile');
        }
    }

    public function change_password() {
        // This method remains unchanged
    }
}