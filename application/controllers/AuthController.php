<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
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
        $this->load->model('Auth_model', 'auth');
    }


    public function login()
    {
        $this->load->view('auth/login');
    }

    public function submit()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->auth->verify_user($email, $password);

        if ($user) {
            $this->session->set_userdata([
                'UserID' => $user->UserID,
                'RoleID'    => $user->RoleID // Make sure 'role' is a column in your users table
            ]);

            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful!',
                'redirect_url' => site_url('hr/dashboard')
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid email or password.'
            ]);
        }
    }
}
