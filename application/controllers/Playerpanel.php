<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Playerpanel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->lib_a->Protect_Playerpanel();
        $this->load->model('main/playerpanel_model', 'playerpanel');
        $this->load->library('lib_a');
        $this->load->database();
    }
    function index()
    {
        $data['title'] = 'XBAN Origin || Player Panel';

        $data['account'] = $this->playerpanel->get_playerdetails();

        $data['content'] = 'main/content/playerpanel/content_playerpanel';
        $this->load->view('main/layout/wrapper', $data, FALSE);
    }
    function redeemcode()
    {
        $this->form_validation->set_rules(
            'code',
            'Code',
            'required',
            array('required' => '%s Cannot Be Empty')
        );
        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'XBAN Origin || Redeem Code';
            $data['content'] = 'main/content/playerpanel/content_redeemcode';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else 
        {
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
        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'XBAN Origin || Change Password';
            $data['content'] = 'main/content/playerpanel/content_changepassword';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else
        {
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
        if ($this->form_validation->run() === FALSE) 
        {
            $data['title'] = 'XBAN Origin || Change Email';
            $data['content'] = 'main/content/playerpanel/content_changeemail';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else 
        {
            $this->playerpanel->changeemail();
        }
    }
    function resetequipment()
    {
        if (empty($_GET['token']))
        {
            echo json_encode('<div class="alert alert-danger alert-dismissible fade show" role="alert">Token Null. Please Contact DEV / GM For Detail Information.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        if (!empty($_GET['token']))
        {
            $hash_id = $this->lib_a->pass_encrypt($_SESSION['uid']);
            if ($_GET['token'] != $hash_id)
            {
                echo json_encode('<div class="alert alert-danger alert-dismissible fade show" role="alert">Token Not Matches.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            if ($_GET['token'] == $hash_id)
            {
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
                if ($update)
                {
                    echo json_encode('<div class="alert alert-success alert-dismissible fade show" role="alert">Successfully Reset Equipment<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
                else 
                {
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
        if ($this->form_validation->run() === FALSE) 
        {
            $data['title'] = 'XBAN Origin || Exchange Cash';

            $data['details'] = $this->playerpanel->get_playerdetails2();
    
            $data['content'] = 'main/content/playerpanel/content_exchange';
            $this->load->view('main/layout/wrapper', $data, FALSE);
        }
        else 
        {
            $this->playerpanel->exchangecash();
        }
    }
    function show_hint()
    {
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b)
        {
            if ($b->hint_question != null && $b->hint_answer != null)
            {
                echo json_encode($b->hint_answer);
            }
        }
        else 
        {
            echo json_encode('Major Error, Please Contact DEV / GM For Detail Information');
        }
    }
    function create_hint()
    {
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b)
        {
            if ($b->hint_question == null || $b->hint_answer == null)
            {
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
                if ($this->form_validation->run() === FALSE)
                {
                    $data['title'] = 'XBAN Origin || Create Hint';
                    $data['content'] = 'main/content/playerpanel/content_createhint.php';
                    $this->load->view('main/layout/wrapper', $data, FALSE);
                }
                else 
                {
                    $this->playerpanel->create_hint();
                }
            }
            if ($b->hint_question != null || $b->hint_answer != null)
            {
                $this->session->set_flashdata('false', 'You Already Create Hint');
                redirect(base_url('playerpanel'), 'refresh');
            }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>