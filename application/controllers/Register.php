<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends Xban_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('lib_a');
        $this->lib_a->Protect_Register();
    }
    function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|is_unique[accounts.login]|required'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|valid_email|is_unique[accounts.email]|required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|required'
        );
        $this->form_validation->set_rules(
            're_password',
            'Re-Password',
            'trim|strtolower|min_length[4]|max_length[16]|alpha_numeric|matches[password]|required'
        );
        $this->form_validation->set_rules(
            'hint_question',
            'Hint Question',
            'trim|in_list[What was your childhood nickname?,What is the name of your favorite childhood friend?,In what city or town did your mother and father meet?,What is your favorite team?,What is your favorite movie?,What was your favorite sport in high school?,What was your favorite food as a child?,What is the first name of the boy or girl that you first kissed?,What was the make and model of your first car?,What was the name of the hospital where you were born?,Who is your childhood sports hero?,What school did you attend for sixth grade?,What was the last name of your third grade teacher?,In what town was your first job?,What was the name of the company where you had your first job?]|required'
        );
        $this->form_validation->set_rules(
            'hint_answer',
            'Hint Answer',
            'trim|alpha_numeric_spaces|required'
        );
        if ($this->form_validation->run()) {
            $data = array(
                'login' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => $this->lib_a->pass_encrypt($this->input->post('password', true)),
                'hint_question' => $this->input->post('hint_question', true),
                'hint_answer' => $this->input->post('hint_answer', true),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->trans_start();
            $this->db->insert('accounts', $data, TRUE);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->session->set_flashdata('true', 'Successfully registered.');
                redirect(base_url() . index_page() . '/login', 'refresh');
            } else {
                $this->session->set_flashdata('false', $this->db->error()['message']);
                redirect(base_url() . index_page() . '/register', 'refresh');
            }
        } else {
            $data['title'] = 'Register';
            $data['content'] = 'main/content/register/content_register';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
    }
    function checkusername()
    {
        $data = array(
            'username' => $this->input->get('username', true)
        );

        if ($data['username'] == '') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Cannot Be Empty!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return;
        } else if (strlen($data['username']) < 4) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Must Contains 4 Characters Or More!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return;
        } else if (strlen($data['username']) > 16) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Can Only Have 16 Characters!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return;
        }

        $this->db->trans_start();
        $this->db->select('login', TRUE);
        $this->db->from('accounts');
        $this->db->where('login', $data['username'], TRUE);

        $result = $this->db->get()->row_array();
        $this->db->trans_complete();

        if ($this->db->trans_status()) {
            if ($result != []) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username</strong> Already Registered!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                return;
            } else {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Username</strong> Can Be Used!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                return;
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->db->error()['message'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return;
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
