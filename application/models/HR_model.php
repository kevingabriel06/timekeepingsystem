<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HR_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // Get all trainees with their related information
    public function get_all_trainees() {
        $this->db->select('trainees.*, users.FirstName, users.LastName, users.Email, users.IsActive, departments.DepartmentName, supervisors.SupervisorID, CONCAT(s_users.FirstName, " ", s_users.LastName) as SupervisorName');
        $this->db->from('trainees');
        $this->db->join('users', 'users.UserID = trainees.UserID');
        $this->db->join('departments', 'departments.DepartmentID = trainees.DepartmentID');
        $this->db->join('supervisors', 'supervisors.SupervisorID = trainees.SupervisorID', 'left');
        $this->db->join('users as s_users', 's_users.UserID = supervisors.UserID', 'left');
        return $this->db->get()->result();
    }
    
    // Get all departments
    public function get_departments() {
        return $this->db->get('departments')->result();
    }
    
    // Get all supervisors
    public function get_supervisors() {
        $this->db->select('supervisors.*, users.FirstName, users.LastName');
        $this->db->from('supervisors');
        $this->db->join('users', 'users.UserID = supervisors.UserID');
        return $this->db->get()->result();
    }
    
    // Add new trainee
    public function add_trainee($user_data, $trainee_data) {
        $this->db->trans_start();
        
        // Insert into users table
        $user_data['RoleID'] = 4; // Trainee role ID
        $this->db->insert('users', $user_data);
        $user_id = $this->db->insert_id();
        
        // Insert into trainees table
        $trainee_data['UserID'] = $user_id;
        $this->db->insert('trainees', $trainee_data);
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    // Update trainee
    public function update_trainee($trainee_id, $user_data, $trainee_data) {
        $this->db->trans_start();
        
        // Get UserID from trainee record
        $user_id = $this->db->get_where('trainees', ['TraineeID' => $trainee_id])->row()->UserID;
        
        // Update users table
        $this->db->where('UserID', $user_id);
        $this->db->update('users', $user_data);
        
        // Update trainees table
        $this->db->where('TraineeID', $trainee_id);
        $this->db->update('trainees', $trainee_data);
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    // Delete/Deactivate trainee
    public function delete_trainee($trainee_id) {
        $this->db->trans_start();
        
        // Get UserID from trainee record
        $user_id = $this->db->get_where('trainees', ['TraineeID' => $trainee_id])->row()->UserID;
        
        // Deactivate user instead of deleting
        $this->db->where('UserID', $user_id);
        $this->db->update('users', ['IsActive' => 0]);
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    // Add new department
    public function add_department($department_name) {
        return $this->db->insert('departments', ['DepartmentName' => $department_name]);
    }
}