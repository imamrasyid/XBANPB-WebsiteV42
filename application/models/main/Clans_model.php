<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Clans_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_clans()
    {
        return $this->db->order_by('clan_exp', 'desc')->get('clan_data')->num_rows();
    }

    function get_clans2($limit, $start)
    {
        return $this->db->order_by('clan_exp', 'desc')->get('clan_data', $limit, $start)->result_array();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>