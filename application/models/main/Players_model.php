<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Players_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_players()
    {
        return $this->db->order_by('exp', 'desc')->limit(500)->get_where('accounts', array('access_level <' => '3', 'player_name !=' => ''))->num_rows();
    }

    function get_players2($limit, $start)
    {
        return $this->db->where(array('access_level <' => '3', 'player_name !=' => ''))->order_by('exp', 'desc')->get('accounts', $limit, $start)->result_array();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>