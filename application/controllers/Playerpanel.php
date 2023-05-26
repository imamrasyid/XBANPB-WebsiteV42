<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Playerpanel extends Xban_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('lib_a');
        $this->lib_a->Protect_Playerpanel();
        $this->load->model('main/playerpanel_model', 'playerpanel');
        $this->load->database();
    }
    function index()
    {
        $data['title'] = 'Player Panel';

        $data['account'] = $this->playerpanel->ModulRead();

        $data['content'] = 'main/content/playerpanel/content_playerpanel';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
    function redeemcode()
    {
        $this->form_validation->set_rules(
            'code',
            'Code',
            'required'
        );
        if ($this->form_validation->run()) {
            $data = array(
                'code' => $this->input->post('code', true)
            );

            $this->db->trans_start();
            $this->db->select('*', TRUE);
            $this->db->from('web_redeemcode');
            $this->db->where('code', $data['code'], TRUE);

            $web_redeemcode = $this->db->get()->row_array();
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                if ($web_redeemcode != []) {
                    $this->db->trans_start();
                    $this->db->select('*', TRUE);
                    $this->db->from('web_redeemcode_log');
                    $this->db->where('player_id', $this->session->userdata('uid'), TRUE);
                    $this->db->where('code', $data['code'], TRUE);

                    $web_redeemcode_log = $this->db->get()->row_array();
                    $this->db->trans_complete();

                    if ($this->db->trans_status()) {
                        if ($web_redeemcode_log != []) {
                            $this->session->set_flashdata('false', 'You already use this code.');
                            redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                        } else {
                            $this->db->trans_start();
                            $this->db->select(
                                'web_redeemcode.id AS redeemcode_id,
                                 web_redeemcode.item_id AS redeemcode_item_id,
                                 web_redeemcode.duration AS redeemcode_duration,
                                 web_redeecomde.total_used AS redeemcode_total_used,
                                 shop.item_id AS shop_item_id,
                                 shop.item_name AS shop_item_name',
                                TRUE
                            );
                            $this->db->from('web_redeemcode');
                            $this->db->join('shop', 'web_redeemcode.item_id=shop.item_id', 'LEFT', TRUE);

                            $redeemcode = $this->db->get()->row_array();
                            $this->db->trans_complete();

                            if ($this->db->trans_status()) {
                                $this->db->trans_start();
                                $this->db->select('*', TRUE);
                                $this->db->from('player_items');
                                $this->db->where('owner_id', $this->session->userdata('uid'), TRUE);
                                $this->db->where('item_id', $redeemcode['shop_item_id'], TRUE);

                                $player_items = $this->db->get()->row_array();
                                $this->db->trans_complete();

                                if ($this->db->trans_status()) {
                                    if ($player_items != []) {
                                        switch ($player_items['equip']) {
                                            case '1': {
                                                    $current_count = $player_items['count'];
                                                    $new_count = $current_count + $redeemcode['duration'];

                                                    $current_count_total_used = $web_redeemcode['total_used'];
                                                    $new_count_total_used = $current_count_total_used + 1;

                                                    $this->db->trans_start();
                                                    $this->db->where('object_id', $player_items['object_id'], TRUE);
                                                    $this->db->update('player_items', array('count' => $new_count));
                                                    $this->db->trans_complete();

                                                    $this->db->trans_start();
                                                    $this->db->where('id', $web_redeemcode['id'], TRUE);
                                                    $this->db->update('web_redeemcode', array('total_used' => $new_count_total_used));
                                                    $this->db->trans_complete();

                                                    $this->db->trans_start();
                                                    $this->db->insert('web_redeemcode_log', array(
                                                        'player_id' => $this->session->userdata('uid'),
                                                        'code' => $web_redeemcode['code'],
                                                        'created_at' => date('Y-m-d H:i:s')
                                                    ), TRUE);
                                                    $this->db->trans_complete();

                                                    if ($this->db->trans_status()) {
                                                        $this->session->set_flashdata('true', 'Congratulations, you received ' . $redeemcode['shop_item_name'] . '.');
                                                        redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                                                    } else {
                                                        $this->session->set_flashdata('false', 'Error: ' . $this->db->error()['message'] . '.');
                                                        redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                                                    }
                                                    break;
                                                }
                                            case '2':
                                            case '3':

                                            default: {
                                                    $this->session->set_flashdata('false', 'You already have this item with equipped state or permanent state.');
                                                    redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                                                    break;
                                                }
                                        }
                                    } else {
                                        $this->db->trans_start();
                                        $this->db->insert('player_items', array(
                                            'owner_id' => $this->session->userdata('uid'),
                                            'item_id' => $web_redeemcode['item_id'],
                                            'item_name' => $redeemcode['shop_item_name'],
                                            'count' => $web_redeemcode['duration'],
                                            'category' => $this->lib_a->GetItemCategory($web_redeemcode['item_id']),
                                            'equip' => '1'
                                        ), TRUE);
                                        $this->db->trans_complete();

                                        $this->db->trans_start();
                                        $this->db->where('id', $web_redeemcode['id'], TRUE);
                                        $this->db->update('web_redeemcode', array('total_used' => $new_count_total_used));
                                        $this->db->trans_complete();

                                        $this->db->trans_start();
                                        $this->db->insert('web_redeemcode_log', array(
                                            'player_id' => $this->session->userdata('uid'),
                                            'code' => $web_redeemcode['code'],
                                            'created_at' => date('Y-m-d H:i:s')
                                        ), TRUE);
                                        $this->db->trans_complete();

                                        if ($this->db->trans_status()) {
                                            $this->session->set_flashdata('true', 'Congratulations, you received ' . $redeemcode['shop_item_name'] . '.');
                                            redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                                        } else {
                                            $this->session->set_flashdata('false', 'Error: ' . $this->db->error()['message'] . '.');
                                            redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                                        }
                                    }
                                }
                            } else {
                                $this->session->set_flashdata('false', 'Error: ' . $this->db->error()['message']);
                                redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Error: ' . $this->db->error()['message']);
                        redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('false', 'Invalid redeem code.');
                    redirect(base_url() . index_page() . '/playerpanel/redeemcode', 'refresh');
                }
            }
        } else {
            $data['title'] = 'Redeem Code';
            $data['content'] = 'main/content/playerpanel/content_redeemcode';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Redeem Code';
            $data['content'] = 'main/content/playerpanel/content_redeemcode';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        } else {
            $this->playerpanel->redeemcode();
        }
    }
    function changepassword()
    {
        $this->form_validation->set_rules(
            'old_password',
            'Old Password',
            'min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Use 4 Characters Or More',
                'max_length' => '%s Can Only Use 16 Characters',
                'alpha_numeric' => '%s Can only use a combination of letters and numbers',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            'new_password',
            'New Password',
            'min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Use 4 Characters Or More',
                'max_length' => '%s Can Only Use 16 Characters',
                'alpha_numeric' => '%s Can only use a combination of letters and numbers',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            're_new_password',
            'Re New Password',
            'min_length[4]|max_length[16]|alpha_numeric|required',
            array(
                'min_length' => '%s Must Use 4 Characters Or More',
                'max_length' => '%s Can Only Use 16 Characters',
                'alpha_numeric' => '%s Can only use a combination of letters and numbers',
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            'hint_question',
            'Hint Question',
            'required',
            array(
                'required' => '%s Cannot Be Empty'
            )
        );
        $this->form_validation->set_rules(
            'hint_answer',
            'Hint Answer',
            'required',
            array(
                'required' => '%s Cannot Be Empty'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Change Password';
            $data['content'] = 'main/content/playerpanel/content_changepassword';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        } else {
            $this->playerpanel->changepassword();
        }
    }
    function changeemail()
    {
        $this->form_validation->set_rules(
            'old_email',
            'Old Email',
            'valid_email|required',
            array('valid_email' => '%s Invalid', 'required' => '%s Cannot Be Empty')
        );
        $this->form_validation->set_rules(
            'new_email',
            'New Email',
            'valid_email|required',
            array('valid_email' => '%s Invalid', 'required' => '%s Cannot Be Empty')
        );
        $this->form_validation->set_rules(
            'hint_question',
            'Hint Question',
            'required',
            array('required' => '%s Cannot Be Empty')
        );
        $this->form_validation->set_rules(
            'hint_answer',
            'Hint Answer',
            'required',
            array('required' => '%s Cannot Be Empty')
        );
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Change Email';
            $data['content'] = 'main/content/playerpanel/content_changeemail';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        } else {
            $this->playerpanel->changeemail();
        }
    }
    function resetequipment()
    {
        if (empty($_GET['token'])) {
            echo json_encode('<div class="alert alert-danger alert-dismissible fade show" role="alert">Token Null. Please Contact DEV / GM For Detail Information.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        if (!empty($_GET['token'])) {
            $hash_id = $this->lib_a->pass_encrypt($_SESSION['uid']);
            if ($_GET['token'] != $hash_id) {
                echo json_encode('<div class="alert alert-danger alert-dismissible fade show" role="alert">Token Not Matches.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            if ($_GET['token'] == $hash_id) {
                $data = array(
                    'primary' => '100003004', // K-2
                    'secondary' => '601002003', // K-5
                    'melee' => '702001001', // M-7
                    'explosive' => '803007001', // K-400
                    'special' => '904007002', // Smoke
                    'chara_red' => '1001001005', // Acid Pol
                    'chara_blue' => '1001002006', // Red Bulls
                    'chara_helmet' => '1102003001', // Normal Helmet
                    'chara_dino' => '1006003041', // Sting
                    'chara_beret' => '0' // Null
                );
                $update = $this->db->where('player_id', $_SESSION['uid'])->update('accounts', array(
                    'weapon_primary' => $data['primary'],
                    'weapon_secondary' => $data['secondary'],
                    'weapon_melee' => $data['melee'],
                    'weapon_thrown_normal' => $data['explosive'],
                    'weapon_thrown_special' => $data['special'],
                    'char_red' => $data['chara_red'],
                    'char_blue' => $data['chara_blue'],
                    'char_helmet' => $data['chara_helmet'],
                    'char_dino' => $data['chara_dino'],
                    'char_beret' => $data['chara_beret']
                ));
                if ($update) {
                    echo json_encode('<div class="alert alert-success alert-dismissible fade show" role="alert">Successfully Reset Equipment<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    echo json_encode('<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed Reset Equipment<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            }
        }
    }
    function exchangecash()
    {
        $this->form_validation->set_rules(
            'cash_value',
            'Cash Amount',
            'required|in_list[1,2,3,4,5,6,7,8,9,10]',
            array(
                'required' => '%s Cannot Be Empty',
                'in_list' => 'Ga Usah Diedit Dari Inspect Element Juga Ngontol'
            )
        );
        $this->form_validation->set_rules(
            'player_id_receiver',
            'Player ID Receiver',
            'required|numeric|is_natural_no_zero',
            array(
                'required' => '%s Cannot Be Empty',
                'numeric' => '%s Must Be Number',
                'is_natural_no_zero' => '%s Invalid'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Exchange Cash';

            $data['details'] = $this->playerpanel->get_playerdetails2();

            $data['content'] = 'main/content/playerpanel/content_exchange';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        } else {
            $this->playerpanel->exchangecash();
        }
    }
    function show_hint()
    {
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b) {
            if ($b->hint_question != null && $b->hint_answer != null) {
                echo json_encode($b->hint_answer);
            }
        } else {
            echo json_encode('Major Error, Please Contact DEV / GM For Detail Information');
        }
    }
    function create_hint()
    {
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b) {
            if ($b->hint_question == null || $b->hint_answer == null) {
                $this->form_validation->set_rules(
                    'hint_question',
                    'Hint Question',
                    'required',
                    array('required' => '%s Cannot Be Empty')
                );
                $this->form_validation->set_rules(
                    'hint_answer',
                    'Hint Answer',
                    'required',
                    array('required' => '%s Cannot Be Empty')
                );
                if ($this->form_validation->run() === FALSE) {
                    $data['title'] = 'Create Hint';
                    $data['content'] = 'main/content/playerpanel/content_createhint.php';
                    $this->load->view('main/layout/wrapper', $data, FALSE);
                } else {
                    $this->playerpanel->create_hint();
                }
            }
            if ($b->hint_question != null || $b->hint_answer != null) {
                $this->session->set_flashdata('false', 'You Already Create Hint');
                redirect(base_url('playerpanel'), 'refresh');
            }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
