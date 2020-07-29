<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reference
 *
 * @author rajitha
 */
class Reference extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reference_model');
    }

    public function show_school() {
        $data_list['schools'] = $this->reference_model->get_school();
        $this->load->view('./reference/school_view', $data_list);
    }

    public function create_school() {


        $data_list['status'] = $this->reference_model->get_status();

        $this->form_validation->set_rules('name', 'School Name', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');



        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors()
            ];

            $this->session->set_flashdata($data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
            ];

            if ($this->reference_model->create_school($data)) {
                $this->session->set_flashdata('school_created', 'New school has been created');
                redirect('reference/create_school');
            }
            else{
                 $this->session->set_flashdata('school_created_failed', 'This school already exits');
                 redirect('reference/create_school');
            }
        }

        $this->load->view('./reference/school_create', $data_list);
    }

    public function get_school_data($sch_id) {
        $data['status'] = $this->reference_model->get_status();
        $data['single_school'] = $this->reference_model->edit_school($sch_id);
        
        $this->load->view('./reference/school_update', $data);
    }
    public function update_school($id) {
        //var_dump($id);
        if (!$id) {
            die('Invalid School id');
        }
        $this->form_validation->set_rules('name', 'School Name', 'required|trim');
        $this->form_validation->set_rules('status', 'School status', 'required|trim');
        
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'errors' => validation_errors(),
            ];
            $this->session->set_flashdata($data);
            redirect('reference/get_school_data/'. $id);
        }
        else {
            $db_data = [
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
            ];
            
            
            if ($this->reference_model->update_school($db_data, $id)) {
                $this->session->set_flashdata('school_update', 'School has been updated');
                redirect('reference/get_school_data/'. $id);
            } else {
                $this->session->set_flashdata('school_update_failed', 'There was an error trying to update the school');
                redirect('reference/get_school_data/'. $id);
            }
        }
    }
    
    public function view_system_log() {
        $data['system_log']= $this->reference_model->getSystemlog();
        $this->load->view('./reference/system_task_log_view', $data);
    }
    public function show_class_type() {
        $data['class_types']= $this->reference_model->get_class_type();
        $this->load->view('./reference/class_type_view', $data);
    }
    

}
