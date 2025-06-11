<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HRController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function dashboard()
    {
        $data['title'] = 'HR Officer Dashboard';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/dashboard', $data);
        $this->load->view('layout/footer');
    }

    // Manage User
    public function manage_users()
    {
        $data['title'] = 'Manage Users';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/manage-users', $data);
        $this->load->view('layout/footer');
    }

    // Leave Approval
    public function leave_approval()
    {
        $data['title'] = 'Leave Approval';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/leave-approval', $data);
        $this->load->view('layout/footer');
    }

    // List of Supervisor
    public function manage_supervisor()
    {
        $data['title'] = 'Manage Supervisor';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/supervisor', $data);
        $this->load->view('layout/footer');
    }


    // List of Trainees
    public function manage_trainees()
    {
        $data['title'] = 'Manage Trainees';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/trainees', $data);
        $this->load->view('layout/footer');
    }

    // List of Trainees
    public function add_users()
    {
        $data['title'] = 'Add User';

        $this->load->view('layout/header', $data);
        $this->load->view('hr/add-user', $data);
        $this->load->view('layout/footer');
    }
    
   
    
    // Add Trainee
    public function add_trainee() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.Username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('school', 'School', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Trainee';
            $data['departments'] = $this->HR_model->get_departments();
            $data['supervisors'] = $this->HR_model->get_supervisors();
            
            $this->load->view('layout/header', $data);
            $this->load->view('hr/add-trainee', $data);
            $this->load->view('layout/footer');
        } else {
            $user_data = array(
                'Username' => $this->input->post('username'),
                'PasswordHash' => $this->input->post('password'), // In production, hash this password
                'FirstName' => $this->input->post('firstname'),
                'LastName' => $this->input->post('lastname'),
                'Email' => $this->input->post('email'),
                'IsActive' => 1
            );
            
            $trainee_data = array(
                'DepartmentID' => $this->input->post('department'),
                'SupervisorID' => $this->input->post('supervisor'),
                'School' => $this->input->post('school'),
                'StartDate' => date('Y-m-d'),
                'BatchID' => $this->input->post('batch')
            );
            
            if ($this->HR_model->add_trainee($user_data, $trainee_data)) {
                $this->session->set_flashdata('success', 'Trainee added successfully');
            } else {
                $this->session->set_flashdata('error', 'Error adding trainee');
            }
            redirect('hr/manage_trainees');
        }
    }
    
    // Update Trainee
    public function update_trainee($trainee_id) {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('school', 'School', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Update Trainee';
            $data['departments'] = $this->HR_model->get_departments();
            $data['supervisors'] = $this->HR_model->get_supervisors();
            
            $this->load->view('layout/header', $data);
            $this->load->view('hr/edit-trainee', $data);
            $this->load->view('layout/footer');
        } else {
            $user_data = array(
                'FirstName' => $this->input->post('firstname'),
                'LastName' => $this->input->post('lastname')
            );
            
            $trainee_data = array(
                'DepartmentID' => $this->input->post('department'),
                'SupervisorID' => $this->input->post('supervisor'),
                'School' => $this->input->post('school'),
                'BatchID' => $this->input->post('batch')
            );
            
            if ($this->HR_model->update_trainee($trainee_id, $user_data, $trainee_data)) {
                $this->session->set_flashdata('success', 'Trainee updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Error updating trainee');
            }
            redirect('hr/manage_trainees');
        }
    }
    
    // Delete/Deactivate Trainee
    public function delete_trainee($trainee_id) {
        if ($this->HR_model->delete_trainee($trainee_id)) {
            $this->session->set_flashdata('success', 'Trainee deactivated successfully');
        } else {
            $this->session->set_flashdata('error', 'Error deactivating trainee');
        }
        redirect('hr/manage_trainees');
    }
    
    // Add Department (AJAX)
    public function add_department() {
        $department_name = $this->input->post('department_name');
        if ($this->HR_model->add_department($department_name)) {
            echo json_encode(['status' => 'success', 'message' => 'Department added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error adding department']);
        }
    }
}

