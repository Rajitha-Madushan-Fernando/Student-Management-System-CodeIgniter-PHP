<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author rajitha
 */
class User extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function showDate() {
        $date = date('Y/m/d h:i:s a', time());
        echo $date;
    }
    public function index() {

        $this->load->view('./login_file/login');
    }

    public function show_user() {
        $data['users'] = $this->user_model->get_all_user();
        $this->load->view('./user/view_all_user', $data);
    }

    public function add_user() {
        $data_set['status'] = $this->user_model->get_status();
        $data_set['title'] = $this->user_model->get_title();
        $data_set['user_type'] = $this->user_model->get_user_type();
        $data_set['gender'] = $this->user_model->get_gender_type();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|trim');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('username', 'User Name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('mobile_number', 'Mobile_number', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors()
            ];
            $this->session->set_flashdata($data);
        } else {

            if ($this->user_model->add_user() && $this->user_model->add_user_log()) {
                $this->session->set_flashdata('user_created', 'User has been registered');
                redirect('user/add_user');
            } else {
                $this->session->set_flashdata('user_created_failed', 'The Email address your entered is already exist');
                redirect('user/add_user');
            }
        }


        $this->load->view('./user/add_user', $data_set);
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


        if ($this->form_validation->run() === FALSE) {
            //If form validation fails
            $data = [
                'errors' => validation_errors()
            ];
            $this->session->set_flashdata($data);
            redirect('./user/');
        } else {
            //If the form validation is successfull
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_id = $this->user_model->login_user($username, $password);

            if ($user_id) {
                //Login successfull
                $user_data = [
                    'id' => $user_id,
                    'username' => $username,
                    'logged_in' => TRUE
                ];
                //This line execute log entry
                $this->user_model->login_user_log($user_id);
                //This line execute log entry


                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');
                redirect('./student/view_student');
            } else {
                //Login failed
                $this->session->set_flashdata('login_failed', 'Entered User name or Password does not match!');
                redirect('./user');
            }
        }


        $this->load->view('./login_file/login');
    }

    public function logout() {

        //This line execute log entry
        $user_id= $this->session->userdata('id');
        $this->user_model->logout_user_log($user_id);
        //This line execute log entry
        $this->session->sess_destroy();
        redirect('./user/login');
    }

    public function edit_user($id) {
        $data['status'] = $this->user_model->get_status();
        $data['title'] = $this->user_model->get_title();
        $data['user_type'] = $this->user_model->get_user_type();
        $data['gender'] = $this->user_model->get_gender_type();


        $data['single_user'] = $this->user_model->edit_user($id);
        $this->load->view('./user/edit_user', $data);
    }

    public function update_user($id) {


        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|trim');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('mobile_number', 'Mobile_number', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            //If form validation fails
            $data = [
                'errors' => validation_errors()
            ];
            $this->session->set_flashdata($data);
            redirect('./user/edit_user/' . $id);
        } else {

            $uid = $id;
            $title = $this->input->post('title');
            $user_type = $this->input->post('user_type');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $gender = $this->input->post('gender');
            $email = $this->input->post('email');
            $mobile_number = $this->input->post('mobile_number');
            $status = $this->input->post('status');




            $data = [
                'title' => $title,
                'user_type' => $user_type,
                'first_name' => $fname,
                'last_name' => $lname,
                'gender' => $gender,
                'email' => $email,
                'mobile_number' => $mobile_number,
                'status' => $status
            ];

            if ($this->user_model->update_user($data, $id)) {
                $this->session->set_flashdata('user_updated', 'User has been updated');
                redirect('user/edit_user/' . $id);
            } else {
                $this->session->set_flashdata('user_updated_failed', 'There was an error trying to update the user');
                redirect('user/edit_user' . $id);
            }
        }
    }

    public function showUserProfile() {

        if ($this->session->id) {

            $uid = $this->session->id;
            $data['user'] = $this->user_model->getProfileData($uid);

            $this->load->view('user/view_profile', $data);
        } else {
            redirect('./user');
        }
    }

    public function profile_basic_data_get($id) {
        //var_dump($id);
        $data['user_profile'] = $this->user_model->getProfileData($id);
        $this->load->view('user/load_basic_data', $data);
    }

    public function profile_basic_data_update($pro_id) {
        //var_dump($id);
        if (!$pro_id) {
            die('Invalid User id');
        }
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('username', 'User Name', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors(),
            ];
            $this->session->set_flashdata($data);
            redirect('user/profile_basic_data_get/' . $pro_id);
        } else {
            $db_data = [
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'mobile_number' => $this->input->post('mobile_number'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username')
            ];


            if ($this->user_model->update_profile_basic_data($db_data, $pro_id)) {
                $this->session->set_flashdata('profile_update', 'Your Profile has been updated');
                redirect('user/showUserProfile/' . $pro_id);
            } else {
                $this->session->set_flashdata('profile_update_failed', 'There was an error trying to update the profile');
                redirect('user/profile_basic_data_get/' . $pro_id);
            }
        }
    }

    public function profile_login_data_get($id) {
        //var_dump($id);
        $data['user_profile'] = $this->user_model->getProfileData($id);
        $this->load->view('user/load_login_data', $data);
    }

    public function profile_login_data_update($pro_id) {
        //var_dump($pro_id);
        if (!$pro_id) {
            die('Invalid User id');
        }
        $this->form_validation->set_rules('cu_password', 'Current password', 'required|trim');
        $this->form_validation->set_rules('new_password', ' Password', 'required|trim');
        $this->form_validation->set_rules('re_new_password', 'Confirmation password', 'required|trim|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors(),
            ];
            $this->session->set_flashdata($data);
            redirect('user/profile_login_data_get/' . $pro_id);
        } else {

            if ($this->user_model->checkOldPass()) {
                $this->session->set_flashdata('profile_update', 'Your Password has been updated');
                redirect('user/showUserProfile/' . $pro_id);
            } else {
                $this->session->set_flashdata('profile_update_failed', 'It seems your current password is wrong!');
                redirect('user/profile_login_data_get/' . $pro_id);
            }
        }
    }

}
