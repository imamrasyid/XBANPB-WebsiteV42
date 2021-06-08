<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/home_model', 'home');
    }
    function index()
    {
        $data['title'] = 'XBAN Origin || Home';

        $data['quickslide'] = $this->home->get_quickslide();
        $data['bestplayers'] = $this->home->get_bestplayers();
        $data['bestclans'] = $this->home->get_bestclans();

        $data['content'] = 'main/content/home/content_home';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('access_level');

        redirect(base_url('home'), 'refresh');
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>