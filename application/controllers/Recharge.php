<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Recharge extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/recharge_model', 'recharge');
    }
    function index()
    {
        $data['title'] = 'XBAN Origin || Recharge';

        $data['package_1'] = $this->recharge->load_package_1();
        $data['package_2'] = $this->recharge->load_package_2();
        $data['package_3'] = $this->recharge->load_package_3();

        $data['content'] = 'main/content/recharge/content_recharge';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
    // function buy_package()
    // {
    //     if (empty($_SESSION['uid']))
    //     {
    //         $this->session->set_flashdata('false', 'You Must Logged In To Buy Recharge Package');
    //         redirect(base_url('login'), 'refresh');
    //     }
    //     if (empty($_GET['idx']))
    //     {
    //         redirect(base_url('recharge'), 'refresh');
    //     }
    //     if (!empty($_GET['idx']))
    //     {
    //         if ($_GET['idx'] < 1 && $_GET['idx'] > 3)
    //         {
    //             redirect(base_url('recharge'), 'refresh');
    //         }
    //         if ($_GET['idx'] >= 1 && $_GET['idx'] <= 3)
    //         {
    //             if ($_GET['idx'] == 1)
    //             {
    //                 $this->recharge->buy_package_1($_GET['idx']);
    //             }
    //         }
    //     }
    // }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>