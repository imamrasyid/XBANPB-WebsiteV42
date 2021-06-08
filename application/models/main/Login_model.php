<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lib_a');
        $this->load->library('encryption');
    }

    function validation()
    {
        $data_enc = array(
            'username' => $this->encryption->encrypt($this->input->post('username')),
            'password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('password')))
        );

        $check1 = $this->db->get_where('accounts', array('login' => $this->encryption->decrypt($data_enc['username']), 'password' => $this->encryption->decrypt($data_enc['password'])));
        $check2 = $check1->row();
        if ($check2) 
        {
            if ($check2->access_level < 0) 
            {
                $this->session->set_flashdata('false', 'Your Account Has Been Banned. Login Failed.');
                redirect(base_url('login'), 'refresh');
            }
            if ($check2->access_level > 6) 
            {
                $this->session->set_flashdata('false', 'Your Account Have Invalid Data. Login Failed.');
                redirect(base_url('login'), 'refresh');
            }
            if ($check2->access_level >= 0 && $check2->access_level <= 6) 
            {
                $this->session->set_userdata('username', $check2->login);
                $this->session->set_userdata('uid', $check2->player_id);
                $this->session->set_userdata('access_level', $check2->access_level);

                redirect(base_url('home'), 'refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('false', 'Incorrect Username / Password.');
            redirect(base_url('login'), 'refresh');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>