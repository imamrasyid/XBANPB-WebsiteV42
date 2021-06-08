<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge_model extends CI_Model
{
    public int $e = 0;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function load_package_1()
    {
        return $this->db->get_where('web_package', array('package_id' => '1'))->row();
    }

    function load_package_2()
    {
        return $this->db->get_where('web_package', array('package_id' => '2'))->row();
    }

    function load_package_3()
    {
        return $this->db->get_where('web_package', array('package_id' => '3'))->row();
    }

    function buy_package_1($param)
    {
        // Checking Account
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b)
        {
            // Check Package Status
            $c = $this->db->get_where('web_package', array('package_id' => $param));
            $d = $c->row();
            if ($d)
            {
                if ($d->package_remaining <= 0)
                {
                    $this->session->set_flashdata('false', 'Package Not Available');
                    redirect(base_url('recharge'), 'refresh');
                }
                if ($d->package_remaining >= 1)
                {
                    // Check Webcoin
                    if ($b->kuyraicoin < $d->package_price)
                    {
                        $this->session->set_flashdata('false', 'Your Webcoin Not Enough To Buy This Package');
                        redirect(base_url('recharge'), 'refresh');
                    }
                    if ($b->kuyraicoin >= $d->package_price)
                    {
                        // Package Template
                        $prize_1 = 0;
                        $prize_2 = 0;
                        $prize_3 = 0;
                        $prize_4 = 0;
                        $prize_5 = 0;
                    }
                }
            }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>