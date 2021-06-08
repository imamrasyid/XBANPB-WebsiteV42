<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Download extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/download_model', 'download');
    }
    function index()
    {
        $data['title'] = 'XBAN Origin || Download';

        $data['client'] = $this->download->get_client();
        $data['launcher'] = $this->download->get_launcher();
        $data['supportapp'] = $this->download->get_supportapp();

        $data['content'] = 'main/content/download/content_download';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>