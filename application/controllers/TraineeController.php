<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TraineeController extends CI_Controller
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
        $data['title'] = 'Trainee Dashboard';

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/dashboard', $data);
        $this->load->view('layout/footer');
    }

    public function attendance_summary()
    {
        $data['title'] = 'Attendance Summary';

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/attendance-summary', $data);
        $this->load->view('layout/footer');
    }

    public function request()
    {
        $data['title'] = 'Request';

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/request', $data);
        $this->load->view('layout/footer');
    }
}
