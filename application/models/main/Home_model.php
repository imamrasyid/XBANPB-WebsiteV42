<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function ModulReadPlayers($limit = 10)
    {
        $this->db->trans_start();
        $this->db->select('*', TRUE);
        $this->db->from('accounts');
        $this->db->where('player_name != ', '', TRUE);
        $this->db->where('access_level < ', '3', TRUE);
        $this->db->order_by('exp', 'DESC', TRUE);
        $this->db->limit($limit);

        $result = $this->db->get()->result_array();
        $this->db->trans_complete();

        if ($this->db->trans_status()) return $result;
        else return [];
    }

    function ModulReadClans($limit = 10)
    {
        $this->db->trans_start();
        $this->db->select('*', TRUE);
        $this->db->from('clan_data');
        $this->db->order_by('clan_exp', 'DESC', TRUE);
        $this->db->limit($limit);

        $result = $this->db->get()->result_array();
        $this->db->trans_complete();

        if ($this->db->trans_status()) return $result;
        else return [];
    }

    function get_quickslide()
    {
        // return $this->db->order_by('id', 'desc')->limit('5')->get('web_quickslide')->result_array();
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
