<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Clans_rank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main/clans_model', 'clanlist');
        $this->load->library('pagination');
    }
    function index()
    {
        $config['base_url'] = base_url('clans_rank/index');
        $config['total_rows'] = $this->clanlist->get_clans();
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

        $data['title'] = 'XBAN Origin || Clans Rank';

        $data['start'] = $this->uri->segment(3);
        $data['list'] = $this->clanlist->get_clans2($config['per_page'], $data['start']);

        $data['content'] = 'main/content/clans_rank/content_clansrank';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>