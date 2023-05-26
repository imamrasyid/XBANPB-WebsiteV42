<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Xban_Controller
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
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required'
        );
        if ($this->form_validation->run()) {
            $data = array(
                'login' => $this->input->post('username', true),
                'password' => $this->lib_a->pass_encrypt($this->input->post('password', true))
            );

            $this->db->trans_start();
            $this->db->select('*', TRUE);
            $this->db->from('accounts');
            $this->db->where('login', $data['login'], TRUE);
            $this->db->where('password', $data['password'], TRUE);
            $this->db->where('access_level >= ', '0', TRUE);

            $result = $this->db->get()->row_array();
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $sessionData = array(
                    'username' => $result['login'],
                    'uid' => $result['player_id'],
                    'access_level' => $result['access_level']
                );

                $this->session->set_userdata($sessionData);
                redirect(base_url() . index_page() . '/home', 'refresh');
            } else {
                $this->session->set_flashdata('false', $this->db->error()['message']);
                redirect(base_url() . index_page() . '/login', 'refresh');
            }
        } else {
            $data['title'] = 'Login';
            $data['content'] = 'main/content/login/content_login';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
