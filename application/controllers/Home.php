<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Xban_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/home_model', 'home');
    }
    function index()
    {
        $data['title'] = 'Home';

        // $data['quickslide'] = @$this->home->get_quickslide();
        $data['bestplayers'] = $this->home->ModulReadPlayers(10);
        $data['bestclans'] = $this->home->ModulReadClans(10);

        $data['content'] = 'main/content/home/content_home';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
