<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends Xban_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $this->session->sess_destroy();
        redirect(base_url() . index_page() . '/home', 'refresh');
    }
}

/* End of file Logout.php */
