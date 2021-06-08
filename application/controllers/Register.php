<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/register_model', 'register');
        $this->load->library('lib_a');
        $this->lib_a->Protect_Register();
    }
    function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|is_unique[accounts.login]|required',
            array(
                'min_length' => '%s Must Contains 4 Characters Or More.',
                'max_length' => '%s Only Can Use 16 Characters.',
                'alpha_numeric' => '%s Only Can Use Characters And Number.',
                'is_unique' => '%s Already In Use.',
                'required' => '%s Cannot Be Empty.'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|valid_email|required',
            array(
                'valid_email' => '%s Invalid.',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Contains 4 Characters Or More.',
                'max_length' => '%s Can Only Use 16 Characters.',
                'alpha_numeric' => '%s Can Only Use Character And Number',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            're_password',
            'Re-Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|matches[password]|required',
            array(
                'min_length' => '%s Must Contains 4 Characters Or More.',
                'max_length' => '%s Can Only Use 16 Characters.',
                'alpha_numeric' => '%s Can Only Use Character And Number.',
                'matches' => '%s Doesnt Matches.',
                'required' => '%s Cannot Be Empty'
            )
        );
        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'XBAN Origin || Register';
            $data['content'] = 'main/content/register/content_register';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else 
        {
            $this->register->validation();
        }
    }
    function checkusername()
    {
        $this->register->check_username();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>