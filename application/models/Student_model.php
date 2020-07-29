<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student_model
 *
 * @author rajitha
 */
class student_model extends CI_Model {

    //put your code here
    public function show_students() {

        $query = $this->db->query(" SELECT *,tbl_student.id,tbl_student.name,tbl_student.index_no,tbl_student.mobile_number,tbl_student.class_year,tbl_class_type.type AS class_type, tbl_status.type AS status,tbl_attempt.attempt_number AS attempt FROM tbl_student JOIN tbl_class_type ON tbl_student.class_type=tbl_class_type.id JOIN tbl_status ON tbl_student.status=tbl_status.id JOIN tbl_attempt ON tbl_student.attempt=tbl_attempt.id");

        return $query->result();
    }

    public function get_school() {
        $query = $this->db->get('tbl_school');
        return $query->result();
    }

    public function get_gender() {
        $query = $this->db->get('tbl_gender');
        return $query->result();
    }

    public function get_status() {
        $query = $this->db->get('tbl_status');
        return $query->result();
    }

    public function get_class_type() {
        $query = $this->db->get('tbl_class_type');
        return $query->result();
    }

    public function get_attempt_type() {
        $query = $this->db->get('tbl_attempt');
        return $query->result();
    }

    public function add_student() {

        $date = date('Y/m/d h:i:s a', time());

        $data = [
            'name' => $this->input->post('name'),
            'index_no' => $this->input->post('index_number'),
            'nic' => $this->input->post('nic'),
            'mobile_number' => $this->input->post('mobile_number'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'birthday' => $this->input->post('birthday'),
            'status' => $this->input->post('status'),
            'school' => $this->input->post('school'),
            'class_year' => $this->input->post('year'),
            'class_type' => $this->input->post('class_type'),
            'attempt' => $this->input->post('attempt'),
            'created_by' => 1,
            'created_date' => $date
        ];

        $insert_query = $this->db->insert('tbl_student', $data);
        return $insert_query;
    }

    public function add_student_log() {

        $date = date('Y/m/d h:i:s a', time());

        $data_log = [
            'task_status' => 1,
            'message' => 1,
            'created_by' => $this->session->userdata('id'),
            'created_at' => $date
        ];

        $insert_query = $this->db->insert('tbl_log', $data_log);
        return $insert_query;
    }

    public function getStudentDetails($postData) {
        if ($postData['student_id']) {
            // Select record

            $this->db->where('id', $postData['student_id']);
            $query = $this->db->get('tbl_student');
            return $query->result();
        }
    }

    public function add_student_mark() {
        $date = date('Y/m/d h:i:s a', time());

        $data = ['student_id' => $this->input->post('stu_id'),
            'paper_number' => $this->input->post('paper_number'),
            'mark' => $this->input->post('mark'),
            'created_by' => $this->session->id,
            'created_date' => $date
        ];

        $this->db->where('student_id', $this->input->post('stu_id'));
        $this->db->where('paper_number', $this->input->post('paper_number'));
        $query = $this->db->get('tbl_student_mark');
        if ($query->num_rows() >= 1) {
            return FALSE;
        } else {
            $insert_query = $this->db->insert('tbl_student_mark', $data);
            return $insert_query;
        }
    }

    public function add_student_mark_log() {
        $date = date('Y/m/d h:i:s a', time());

        $data_log = [
            'task_status' => 1,
            'message' => 5,
            'created_by' => $this->session->userdata('id'),
            'created_at' => $date
        ];

        $insert_query = $this->db->insert('tbl_log', $data_log);
        return $insert_query;
    }

    public function get_student_data($id) {
        $query = $this->db->query(" SELECT tbl_student.id,tbl_student.name,tbl_student.index_no,tbl_student.nic,tbl_student.address,tbl_student.mobile_number,tbl_student.class_year,tbl_student.birthday,tbl_school.name AS school,tbl_class_type.type AS class_type,tbl_status.type AS status, tbl_attempt.attempt_number AS attempt FROM tbl_student JOIN tbl_school ON  tbl_student.school=tbl_school.id JOIN tbl_class_type ON  tbl_student.class_type=tbl_class_type.id JOIN tbl_status ON  tbl_student.status=tbl_status.id JOIN tbl_attempt ON  tbl_student.attempt=tbl_attempt.id where tbl_student.id=$id");
        return $query->result();
    }

    public function get_student_mark($id) {
        $this->db->where('student_id', $id);
        $query = $this->db->get('tbl_student_mark');
        return $query->result();
    }

    public function view_student_mark($id) {
        $query = $this->db->query(" SELECT tbl_student_mark.id,tbl_student_mark.paper_number,tbl_student_mark.mark,tbl_student.name AS student_name,tbl_student.index_no AS index_number,tbl_student.id AS sid FROM tbl_student_mark JOIN tbl_student ON tbl_student_mark.student_id=tbl_student.id where tbl_student_mark.id=$id");
        return $query->result();
    }

    public function update_student_mark($data, $stu_id) {
        $this->db->where('id', $stu_id);
        $this->db->update('tbl_student_mark', $data);
        return TRUE;
    }

}
