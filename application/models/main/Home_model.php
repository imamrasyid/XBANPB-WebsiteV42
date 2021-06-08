<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_quickslide()
    {
        return $this->db->order_by('id', 'desc')->limit('5')->get('web_quickslide')->result_array();
    }

    function get_bestplayers()
    {
        return $this->db->order_by('exp', 'desc')->limit(10)->get_where('accounts', array('access_level <' => '3', 'player_name != ' => ''))->result_array();
    }

    function get_bestclans()
    {
        return $this->db->order_by('clan_exp', 'desc')->limit(10)->get('clan_data')->result_array();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>