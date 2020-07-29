<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reference_model
 *
 * @author rajitha
 */
class Reference_model extends CI_Model {

    //put your code here
    public function get_school() {
        $query = $this->db->query(
                "SELECT tbl_school.id,tbl_school.name,tbl_status.type AS status FROM tbl_school JOIN tbl_status ON tbl_school.status=tbl_status.id");

        return $query->result();
    }

    public function get_status() {
        $query = $this->db->get('tbl_status');
        return $query->result();
    }

    public function create_school($data) {

        $this->db->where('name', $this->input->post('name'));
        $query = $this->db->get('tbl_school');
        $row = $query->row();
        $store_school_name = $row->name;

        $school_db_name = strtolower($this->input->post('name'));
        $school_entered_name = strtolower($store_school_name);

        if ($school_db_name == $school_entered_name) {
            return FALSE;
        } else {

            $insert_query = $this->db->insert('tbl_school', $data);

            return $insert_query;
        }
    }

    public function edit_school($sid) {
        if ($sid) {
            // Select record

            $this->db->where('id', $sid);
            $query = $this->db->get('tbl_school');
            return $query->result();
        }
    }

    public function update_school($db_data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_school', $db_data);
        return TRUE;
    }

    public function getSystemlog() {
        $query = $this->db->query( "SELECT tbl_log.id,tbl_log.created_at,tbl_log_status.type AS status,tbl_task_list.task_name AS task,tbl_user.username AS user FROM tbl_log JOIN tbl_log_status ON tbl_log.task_status=tbl_log_status.id JOIN tbl_task_list ON tbl_log.message=tbl_task_list.id JOIN tbl_user ON tbl_log.created_by=tbl_user.id");

        return $query->result();
    }

    public function get_class_type() {
        $query = $this->db->get('tbl_class_type');
        return $query->result();
    }

}
