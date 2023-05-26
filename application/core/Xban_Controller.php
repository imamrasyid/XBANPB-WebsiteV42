<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Xban_Controller extends CI_Controller
{
    public $app_name;
    public $app_version;
    public $app_author;

    public function __construct()
    {
        parent::__construct();
        $this->app_name = 'XBAN PB';
        $this->app_version = '2.0';
        $this->app_author = '[DEV] EyeTracker';
    }
}

/* End of file Xban_Controller.php */
