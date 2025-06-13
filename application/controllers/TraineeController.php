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

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Trainee_model', 'trainee');
    }

    public function dashboard()
    {
        $userId = $this->session->userdata('UserID'); // or however you're storing the logged-in user

        $data['title'] = 'Trainee Dashboard';

        $data['user'] = $this->trainee->get_login_user();

        $timelogs = $this->trainee->get_active_timelog($userId);

        $data['clockedIn'] = !empty($timelogs); // Set status based on filtered logs
        $data['timelogs'] = $timelogs;

        $data['logsforday'] = $this->trainee->get_time_logs();

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }


    public function clock_in()
    {
        // Assume user is logged in, UserID from session
        $userId = $this->session->userdata('UserID');

        if (!$userId) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
            return;
        }

        $result = $this->trainee->clock_in($userId);

        if ($result) {
            echo json_encode(['status' => 'success', 'time' => date('h:i:s A')]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to record clock in']);
        }
    }

    public function clock_out()
    {
        $userId = $this->session->userdata('UserID');

        $result = $this->trainee->clock_out($userId);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'time' => date('h:i:s A', strtotime($result)) // UTC+8 time
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No active session found or already clocked out.'
            ]);
        }
    }

    public function attendance_summary()
    {
        $data['title'] = 'Attendance Summary';

        $data['user'] = $this->trainee->get_login_user();

        $data['timelogs'] = $this->trainee->get_time_logs();

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/attendance-summary', $data);
        $this->load->view('layout/footer', $data);
    }

    public function submit_request()
    {
        $data['title'] = 'Submit Request';

        $data['user'] = $this->trainee->get_login_user();

        $data['timelogs'] = $this->trainee->get_time_logs();

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/submit-request', $data);
        $this->load->view('layout/footer');
    }

    public function update_request()
    {
        $log_id = $this->input->post('log_id');
        $login_time = $this->input->post('login_time');
        $logout_time = $this->input->post('logout_time');

        if (!$log_id || !$login_time || !$logout_time) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            return;
        }

        $updated = $this->trainee->update_log($log_id, $login_time, $logout_time);

        if ($updated) {
            echo json_encode(['status' => 'success', 'message' => 'Log updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update log.']);
        }
    }

    public function request()
    {
        $data['title'] = 'Request';

        $data['user'] = $this->trainee->get_login_user();

        $this->load->view('layout/header', $data);
        $this->load->view('trainee/request', $data);
        $this->load->view('layout/footer');
    }

    public function profile_settings()
    {
        $data['title'] = 'Profile Settings';

        $data['user'] = $this->trainee->get_login_user();

        $this->load->view('layout/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('layout/footer', $data);
    }
}
