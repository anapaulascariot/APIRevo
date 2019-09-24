<?php defined('BASEPATH') or exit('No direct script access allowed');

class Demo extends CI_Controller
{

    public function index()
    {
        $this->load->view('demo/index');
    }

    public function process_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($this->accountModel->login($username, $password)) {
            $this->session->set_userdata('username', $username);
            $this->load->view('demo/welcome');
        } else {
            $data['error'] = 'Invalid Account';
            $this->load->view('demo/index', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        redirect('demo');
    }

}