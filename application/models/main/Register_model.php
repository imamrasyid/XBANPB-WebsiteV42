<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
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
        $data = array(
            'username' => $this->encryption->encrypt($this->input->post('username')),
            'email' => $this->encryption->encrypt($this->input->post('email')),
            'password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('password'))),
            're_password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('re_password')))
        );

        // Checking Username
        $check = $this->db->get_where('accounts', array('login' => $data['username']));
        $check2 = $check->row();
        if ($check2)
        {
            $this->session->set_flashdata('false', 'This Username Already Registered');
            redirect(base_url('register'), 'refresh');
        }
        else 
        {
            // Insert
            $insert = $this->db->insert('accounts', array(
                'login' => $this->encryption->decrypt($data['username']),
                'email' => $this->encryption->decrypt($data['email']),
                'password' => $this->encryption->decrypt($data['password'])
                )
            );
            if ($insert) 
            {
                $this->session->set_flashdata('true', 'Successfully Registered');
                redirect(base_url('register'), 'refresh');
            }
            else 
            {
                $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                redirect(base_url('register'), 'refresh');
            }
        }
    }

    function check_username()
    {
        if (empty($_GET['username'])) 
        {
            $q = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Cannot Be Empty!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            echo json_encode($q);
        }
        if (!empty($_GET['username'])) 
        {
            $data = array(
                'username' => $this->encryption->encrypt($_GET['username'])
            );
            if (strlen($this->encryption->decrypt($data['username'])) < 4)
            {
                $w = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Must Contains 4 Characters Or More!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                echo json_encode($w);
            }
            if (strlen($this->encryption->decrypt($data['username'])) > 16) 
            {
                $e = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Can Only Have 16 Characters!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                echo json_encode();
            }
            if (strlen($this->encryption->decrypt($data['username'])) >= 4 && strlen($this->encryption->decrypt($data['username'])) <= 16) 
            {
                $check = $this->db->get_where('accounts', array('login' => $this->encryption->decrypt($data['username'])));
                $check2 = $check->row();
                if ($check2) 
                {
                    $b = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Already Registered!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    echo json_encode($b);
                }
                else 
                {
                    $c = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Username</strong> Can Be Used!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    echo json_encode($c);
                }
            }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>