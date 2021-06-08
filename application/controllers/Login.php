<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/login_model', 'login');
        $this->load->library('lib_a');
        $this->lib_a->Protect_Login();
    }
    function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Contains 4 Character Or More',
                'max_length' => '%s Only Can Use 16 Characters',
                'alpha_numeric' => '%s Only Character And Number Allowed',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Contains 4 Character Or More',
                'max_length' => '%s Only Can Use 16 Characters',
                'alpha_numeric' => '%s Only Character And Number Allowed',
                'required' => '%s Cannot Be Empty'
            )
        );
        if ($this->form_validation->run() === FALSE) 
        {
            $data['title'] = 'XBAN Origin || Login';
            $data['content'] = 'main/content/login/content_login';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else
        {
            $this->login->validation();
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>