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
}
