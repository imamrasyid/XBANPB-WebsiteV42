<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Download extends Xban_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/download_model', 'download');
    }
    function index()
    {
        $data['title'] = 'Download';
        $data['client'] = $this->download->ModulRead(1);
        $data['launcher'] = $this->download->ModulRead(2);
        $data['supportapp'] = $this->download->ModulRead(3);

        $data['content'] = 'main/content/download/content_download';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
