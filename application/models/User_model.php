<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author rajitha
 */
class User_model extends CI_Model {

    //put your code here
    public function get_all_user() {

        $query = $this->db->query(" SELECT tbl_user.id,tbl_user.first_name,tbl_user.last_name,tbl_user.username,tbl_user.mobile_number,tbl_user_type.type AS user_type,tbl_status.type AS status,tbl_title.type AS title  FROM tbl_user JOIN tbl_user_type ON tbl_user.user_type=tbl_user_type.id JOIN tbl_status ON tbl_user.status=tbl_status.id JOIN tbl_title ON tbl_user.title=tbl_title.id");

        return $query->result();
    }

    public function get_status() {
        $query = $this->db->get('tbl_status');
        return $query->result();
    }

    public function get_title() {
        $query = $this->db->get('tbl_title');
        return $query->result();
    }

    public function get_gender_type() {
        $query = $this->db->get('tbl_gender');
        return $query->result();
    }

    public function get_user_type() {
        $query = $this->db->get('tbl_user_type');
        return $query->result();
    }

    public function add_user() {
        
        $date = date('Y/m/d h:i:s a', time());
        
        $options = ['cost' => 12];
        $hashed_passwd = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = [
            'title' => $this->input->post('title'),
            'user_type' => $this->input->post('user_type'),
            'first_name' => $this->input->post('fname'),
            'gender' => $this->input->post('gender'),
            'last_name' => $this->input->post('lname'),
            'username' => $this->input->post('username'),
            'password' => $hashed_passwd,
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'status' => $this->input->post('status'),
            'created_date'=>$date
        ];
        
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('tbl_user');
        $row = $query->row();
        $email_status = $row->email;
        
        if (!$email_status==""){
            
            return FALSE;
            
        }else{
             $insert_query = $this->db->insert('tbl_user', $data);
             return $insert_query;
        }
        
       
    }
    
    public function add_user_log() {
        $date = date('Y/m/d h:i:s a', time());
        
        $data_log = [
            'task_status' => 1,
            'message' => 2,
            'created_by' => $this->session->userdata('id'),
            'created_at'=> $date
        ];

        $insert_query = $this->db->insert('tbl_log', $data_log);
        return $insert_query;
    }

    public function login_user($username, $password) {
        $requirement = ['username' => $username, 'status' => 1];

        $this->db->where($requirement); 
        //$this->db->where('username', $username);
        //$this->db->where('password', $password); //Not valid as it verifies plain-text passwords
        $result = $this->db->get('tbl_user');

        if (!$result->row()) //if user not found in the DB, exit the function by returning false
            return FALSE;

        $hashedPasswd = $result->row()->password; //Obtaining the password hash from the DB
        //var_dump($hashedPasswd);
        //exit;

        if (password_verify($password, $hashedPasswd)) {
            return $result->row(0)->id;
       } else {
            return FALSE;
       }
    }
    public function login_user_log($user) {
        $date = date('Y/m/d h:i:s a', time());
        
        $data_log = [
            'task_status' => 1,
            'message' => 3,
            'created_by' => $user,
            'created_at'=> $date
        ];

        $insert_query = $this->db->insert('tbl_log', $data_log);
        return $insert_query;
    }
     public function logout_user_log($user_id) {
        $date = date('Y/m/d h:i:s a', time());
        
        $data_log = [
            'task_status' => 1,
            'message' => 4,
            'created_by' => $user_id,
            'created_at'=> $date    
        ];

        $insert_query = $this->db->insert('tbl_log', $data_log);
        return $insert_query;
    }
    

    public function edit_user($id) {


        $this->db->where('id', $id);
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    public function update_user($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_user', $data);
        return TRUE;
    }

    public function getProfileData($uid) {
        $query = $this->db->query(" SELECT tbl_user.id,tbl_user.first_name,tbl_user.last_name,tbl_user.username,tbl_user.mobile_number, tbl_user.password,tbl_user.email,tbl_user.created_date,tbl_user_type.type AS user_type,tbl_status.type AS status,tbl_title.type AS title FROM tbl_user JOIN tbl_user_type ON tbl_user.user_type=tbl_user_type.id JOIN tbl_status ON tbl_user.status=tbl_status.id JOIN tbl_title ON tbl_user.title=tbl_title.id WHERE tbl_user.id=$uid");

        return $query->result();
    }

    public function update_profile_basic_data($data, $pro_id) {
        $this->db->where('id', $pro_id);
        $this->db->update('tbl_user', $data);
        return TRUE;
    }

    public function checkOldPass() {
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get('tbl_user');
        $row = $query->row();
        $old_password = $row->password;

        $new_password = $this->input->post('cu_password');

        if (!empty($row) && password_verify($new_password, $old_password)) {
            //echo 'okay';
            //return $result->row(0)->id;

            $options = ['cost' => 12];
            $new_hased_password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT, $options);

            $data = [
                'password' => $new_hased_password
            ];
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('tbl_user', $data);
            return TRUE;
        } else {
            //echo 'bad';
            return FALSE;
        }
    }

}
