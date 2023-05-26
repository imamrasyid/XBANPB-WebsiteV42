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
    
    function ModulRead($file_type = '')
    {
        if ($file_type == '') return [];
        else
        {
            $this->db->trans_start();
            $this->db->select('*', TRUE);
            $this->db->from('web_download');
            $this->db->where('file_type', $file_type, TRUE);
            $this->db->order_by('id', 'DESC', TRUE);

            $result = $this->db->get()->result_array();
            $this->db->trans_complete();

            if ($this->db->trans_status()) return $result;
            else return [];
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
