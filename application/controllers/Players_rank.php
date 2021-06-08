<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Players_rank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/players_model', 'playerlist');
        $this->load->library('pagination');
    }
    function index()
    {
        $config['base_url'] = base_url('players_rank/index');
        $config['total_rows'] = $this->playerlist->get_players();
        $config['per_page'] = 10;

        $config['full_tag_open'] = '<ul class="pagination mt-5">';
        $config['full_tag_close'] = '</ul>';

        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0)" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['title'] = 'XBAN Origin || Players Rank';

        $data['start'] = $this->uri->segment(3);
        $data['list'] = $this->playerlist->get_players2($config['per_page'], $data['start']);

        $data['content'] = 'main/content/players_rank/content_playersrank';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>