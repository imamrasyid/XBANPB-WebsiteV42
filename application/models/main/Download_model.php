<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_client()
    {
        return $this->db->get_where('web_download_clientlauncher', array('type' => 'client'))->result_array();
    }

    function get_launcher()
    {
        return $this->db->get_where('web_download_clientlauncher', array('type' => 'launcher'))->result_array();
    }

    function get_supportapp()
    {
        return $this->db->get_where('web_download_clientlauncher', array('type' => 'support'))->result_array();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>