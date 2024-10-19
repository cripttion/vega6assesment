<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    public function register() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            // Handle base64 image data
            $picture_data = $this->input->post('picture');
            if (preg_match('/^data:image\/(\w+);base64,/', $picture_data, $type)) {
                $picture_data = substr($picture_data, strpos($picture_data, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif
    
                if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                    $this->session->set_flashdata('error', 'Invalid image type');
                    redirect('auth/register');
                }
    
                $picture_data = base64_decode($picture_data);
    
                if ($picture_data === false) {
                    $this->session->set_flashdata('error', 'Invalid image data');
                    redirect('auth/register');
                }
    
                // Store the base64 image data
                $picture_data = 'data:image/' . $type . ';base64,' . base64_encode($picture_data);
            } else {
                $this->session->set_flashdata('error', 'Invalid image format');
                redirect('auth/register');
            }
    
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'picture' => $picture_data // Store the base64 string
            );
    
            $this->User_model->register($data);
            $this->session->set_flashdata('success', 'Registration successful. You can now login.');
            redirect('auth/login');
        }
    }
    

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user_by_email($email);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_name', $user->name);
                $this->session->set_userdata('user_picture', base64_encode($user->picture));
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_picture');
        redirect('auth/login');
    }
    public function change_password() {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('profile');
        } else {
            $user_id = $this->session->userdata('user_id');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            $user = $this->User_model->get_user_by_id($user_id);

            if (password_verify($current_password, $user->password)) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                if ($this->User_model->update_password($user_id, $hashed_password)) {
                    $this->session->set_flashdata('success', 'Password changed successfully');
                } else {
                    $this->session->set_flashdata('error', 'Failed to change password');
                }
            } else {
                $this->session->set_flashdata('error', 'Current password is incorrect');
            }
            redirect('profile');
        }
    }
}