<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author rajitha
 */
class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_model');
    }

    //put your code here
    public function view_student() {
        $data['student'] = $this->student_model->show_students();
        $this->load->view('./student/view_student', $data);
    }

    public function add_student() {
        $data_set['school'] = $this->student_model->get_school();
        $data_set['gender'] = $this->student_model->get_gender();
        $data_set['status'] = $this->student_model->get_status();
        $data_set['class_type'] = $this->student_model->get_class_type();
        $data_set['attempt'] = $this->student_model->get_attempt_type();


        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('index_number', 'Index Number', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('nic', 'NIC', 'trim|min_length[10]');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('school', 'School', 'required|trim');
        $this->form_validation->set_rules('year', 'Acadamic Year', 'required|trim');
        $this->form_validation->set_rules('class_type', 'Class Type', 'required|trim');
        $this->form_validation->set_rules('attempt', 'Attempt Number', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors()
            ];
            $this->session->set_flashdata($data);
        } else {

            if ($this->student_model->add_student() && $this->student_model->add_student_log() ) {
                $this->session->set_flashdata('student_created', 'Student has been registered');
                redirect('student/add_student');
            } else {
                $this->session->set_flashdata('student_created_failed', 'There was an error trying to create the Student');
                redirect('student/add_student');
            }
        }

        $this->load->view('./student/add_student', $data_set);
    }

    public function get_student_by_id() {
        // POST data
        $postData = $this->input->post();
        //var_dump($postData);
        //exit;
        // get data
        $data['student'] = $this->student_model->getStudentDetails($postData);
        header('Content-Type: application/json');
        echo json_encode($data['student']);
        //var_dump($data);
        //exit();
    }

    public function add_student_mark() {

        if ($data = $this->student_model->add_student_mark() && $data = $this->student_model->add_student_mark_log()) {
            header('Content-Type: application/json');
            echo json_encode($data);
            return TRUE;
            
        } else {

            return FALSE;
        }
    }

    public function view_single_student_mark($id) {
        $data['student'] = $this->student_model->get_student_data($id);
        $data['marks'] = $this->student_model->get_student_mark($id);
        $this->load->view('student/view_single_student_mark_list', $data);
    }

    public function update_single_student_mark($id) {
        $data['marks'] = $this->student_model->view_student_mark($id);
        $this->load->view('student/update_single_student_mark', $data);
    }

    public function update_mark($stu_id) {
        if (!$stu_id) {
            die('Invalid Student id');
        }
        $this->form_validation->set_rules('mark', 'Marks', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors(),
            ];
            $this->session->set_flashdata($data);
            redirect('student/update_single_student_mark/'. $stu_id);
        }
        else {
            $db_data = [
                'mark' => $this->input->post('mark')
            ];
            
            
            if ($this->student_model->update_student_mark($db_data, $stu_id)) {
                $this->session->set_flashdata('student_update', 'Student marks has been updated');
                redirect('student/update_single_student_mark/'. $stu_id);
            } else {
                $this->session->set_flashdata('student_created_failed', 'There was an error trying to update the mark');
                redirect('student/update_single_student_mark/'. $stu_id);
            }
        }
    }

}
