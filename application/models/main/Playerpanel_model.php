<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

class Playerpanel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lib_a');
        $this->load->library('encryption');
    }

    function ModulRead()
    {
        $this->db->trans_start();
        $this->db->select('*', TRUE);
        $this->db->from('accounts');
        $this->db->where('player_id', $this->session->userdata('uid'), TRUE);

        $result = $this->db->get()->row_array();
        $this->db->trans_complete();

        if ($this->db->trans_status()) return $result;
        else {
            $this->session->sess_destroy();
            redirect(base_url() . index_page() . '/login', 'refresh');
        }
    }

    function get_playerdetails()
    {
        return $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']))->result_array();
    }

    function get_playerdetails2()
    {
        $check = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $check2 = $check->row();
        if ($check2) {
            return $check2;
        }
    }

    function redeemcode()
    {
        $data = array(
            'code' => $this->encryption->encrypt($this->input->post('code'))
        );

        // Checking Code
        $a = $this->db->get_where('item_code', array('item_code' => $this->encryption->decrypt($data['code'])));
        $b = $a->row();
        if ($b) {
            // Checking Log
            $c = $this->db->get_where('check_user_itemcode', array('uid' => $_SESSION['uid'], 'item_code' => $b->item_code));
            $d = $c->row();
            if ($d) {
                $this->session->set_flashdata('false', 'This Code Already Used');
                redirect(base_url('playerpanel/redeemcode'), 'refresh');
            } else {
                // Checking Inventory
                $e = $this->db->get_where('player_items', array('owner_id' => $_SESSION['uid'], 'item_id' => $b->item_id));
                $f = $e->row();
                if ($f) {
                    $shop = $this->db->get_where('shop', array('item_id' => $b->item_id))->row();
                    // Checking Item Equip
                    if ($f->equip == 1) {
                        // Update Duration
                        $total = $f->count + $b->item_count;
                        $g = $this->db->where(array('owner_id' => $_SESSION['uid'], 'item_id' => $f->item_id))->update('player_items', array('count' => $total));
                        $g2 = $this->db->insert('check_user_itemcode', array('uid' => $_SESSION['uid'], 'item_code' => $b->item_code, 'username' => $_SESSION['username']));
                        if ($g && $g2) {
                            $this->session->set_flashdata('true', 'Congratulations. You Received ' . $shop->item_name . ' For ' . ($b->item_count / 24 / 60 / 60) . ' Days.');
                            redirect(base_url('playerpanel/redeemcode'), 'refresh');
                        } else {
                            $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                            redirect(base_url('playerpanel/redemcode'), 'refresh');
                        }
                    }
                    if ($f->equip != 1) {
                        // Fetch Account
                        $g = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
                        $h = $g->row();
                        if ($h) {
                            // Exchange Item To Cash
                            $cash = $h->money + 5000;
                            $i = $this->db->where('player_id', $h->player_id)->update('accounts', array('money' => $cash));
                            if ($i) {
                                $this->session->set_flashdata('true', 'You Already Have ' . $shop->item_name . '. Reward Exchanged To 5000 Cash.');
                                redirect(base_url('playerpanel/redeemcode'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/redemcode'), 'refresh');
                            }
                        }
                    }
                } else {
                    $shop2 = $this->db->get_where('shop', array('item_id' => $b->item_id))->row();
                    // Insert New Item
                    if ($b->item_id >= 100003001 && $b->item_id <= 904007069) {
                        $j = $this->db->insert('player_items', array('owner_id' => $_SESSION['uid'], 'item_id' => $b->item_id, 'item_name' => $shop2->item_name, 'count' => $b->item_count, 'category' => '1', 'equip' => '1'));
                        $j2 = $this->db->insert('check_user_itemcode', array('uid' => $_SESSION['uid'], 'item_code' => $b->item_code, 'username' => $_SESSION['username']));
                        if ($j && $j2) {
                            $this->session->set_flashdata('true', 'Congratulations, You Received ' . $shop2->item_name . ' For ' . ($b->item_count / 24 / 60 / 60) . ' Days.');
                            redirect(base_url('playerpanel/redeemcode'), 'refresh');
                        } else {
                            $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                            redirect(base_url('playerpanel/redemcode'), 'refresh');
                        }
                    }
                    if ($b->item_id >= 1001001003 && $b->item_id <= 1105003032) {
                        $j = $this->db->insert('player_items', array('owner_id' => $_SESSION['uid'], 'item_id' => $b->item_id, 'item_name' => $shop2->item_name, 'count' => $b->item_count, 'category' => '2', 'equip' => '1'));
                        $j2 = $this->db->insert('check_user_itemcode', array('uid' => $_SESSION['uid'], 'item_code' => $b->item_code, 'username' => $_SESSION['username']));
                        if ($j && $j2) {
                            $this->session->set_flashdata('true', 'Congratulations, You Received ' . $shop2->item_name . ' For ' . ($b->item_count / 24 / 60 / 60) . ' Days.');
                            redirect(base_url('playerpanel/redeemcode'), 'refresh');
                        } else {
                            $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                            redirect(base_url('playerpanel/redemcode'), 'refresh');
                        }
                    }
                    if ($b->item_id >= 1300002003 && $b->item_id <= 1302379000) {
                        $j = $this->db->insert('player_items', array('owner_id' => $_SESSION['uid'], 'item_id' => $b->item_id, 'item_name' => $shop2->item_name, 'count' => $b->item_count, 'category' => '3', 'equip' => '1'));
                        $j2 = $this->db->insert('check_user_itemcode', array('uid' => $_SESSION['uid'], 'item_code' => $b->item_code, 'username' => $_SESSION['username']));
                        if ($j && $j2) {
                            $this->session->set_flashdata('true', 'Congratulations, You Received ' . $shop2->item_name . ' For ' . ($b->item_count / 24 / 60 / 60) . ' Days.');
                            redirect(base_url('playerpanel/redeemcode'), 'refresh');
                        } else {
                            $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Detail Information');
                            redirect(base_url('playerpanel/redemcode'), 'refresh');
                        }
                    }
                }
            }
        } else {
            $this->session->set_flashdata('false', 'Code Not Found');
            redirect(base_url('playerpanel/redeemcode'), 'refresh');
        }
    }

    function changepassword()
    {
        $data = array(
            'old_password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('old_password'))),
            'new_password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('new_password'))),
            're_new_password' => $this->encryption->encrypt($this->lib_a->pass_encrypt($this->input->post('re_new_password'))),
            'hint_question' => $this->encryption->encrypt($this->input->post('hint_question')),
            'hint_answer' => $this->encryption->encrypt($this->input->post('hint_answer')),
        );

        // validation
        $check = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid'], 'password' => $this->encryption->decrypt($data['old_password'])));
        $check2 = $check->row();
        if ($check2) {
            if ($data['hint_question'] == $check2->hint_question && $data['hint_answer'] == $check2->hint_answer) {
                $update = $this->db->where('player_id', $check2->player_id)->update('accounts', array('password' => $this->encryption->decrypt($data['new_password'])));
                if ($update) {
                    $this->session->set_flashdata('true', 'Password Updated Successfully');
                    redirect(base_url('home/logout'), 'refresh');
                } else {
                    $this->session->set_flashdata('false', 'Major Error, Please Contact GM / DEV For Detail Information');
                    redirect(base_url('playerpanel/changepassword'), 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('false', 'Old Password Wrong');
            redirect(base_url('playerpanel/changepassword'), 'refresh');
        }
    }
    function changeemail()
    {
        $data = array(
            'old_email' => $this->encryption->encrypt($this->input->post('old_email')),
            'new_email' => $this->encryption->encrypt($this->input->post('new_email')),
            'hint_question' => $this->encryption->encrypt($this->input->post('hint_question')),
            'hint_answer' => $this->encryption->encrypt($this->input->post('hint_answer'))
        );

        $mail_valid = $this->db->get_where('accounts', array('email' => $this->encryption->decrypt($data['new_email'])))->num_rows();

        $check = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid'], 'email' => $this->encryption->decrypt($data['old_email']), 'hint_question' => $this->encryption->decrypt($data['hint_question']), 'hint_answer' => $this->encryption->decrypt($data['hint_answer'])));
        $check2 = $check->row();
        if ($check2) {
            if ($this->encryption->decrypt($data['new_email']) == $this->encryption->decrypt($data['old_email'])) {
                $this->session->set_flashdata('false', 'New Email Cannot Be Same As Old Email');
                redirect(base_url('playerpanel/changeemail'), 'refresh');
            }
            if ($mail_valid >= 3) {
                $this->session->set_flashdata('false', 'Please Use Another Email');
                redirect(base_url('playerpanel/changeemail'), 'refresh');
            }

            $update = $this->db->where('player_id', $check2->player_id)->update('accounts', array('email' => $this->ecnryption->decrypt($data['new_email'])));
            if ($update) {
                $this->session->set_flashdata('true', 'Successfully Updated Email');
                redirect(base_url('playerpanel/changeemail'), 'refresh');
            } else {
                $this->session->set_flashdata('false', 'Major Error, Please Contact GM / DEV For Detail Information');
                redirect(base_url('playerpanel/changepassword'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('false', 'Old Email / Hint Question / Hint Answer Wrong.');
            redirect(base_url('playerpanel/changeemail'), 'refresh');
        }
    }
    function exchangecash()
    {
        $data = array(
            'cash_amount' => $this->encryption->encrypt($this->input->post('cash_value')),
            'player_id_receiver' => $this->encryption->encrypt($this->input->post('player_id_receiver')),
            'hint_question' => $this->encryption->encrypt($this->input->post('hint_question')),
            'hint_answer' => $this->encryption->encrypt($this->input->post('hint_answer'))
        );

        $op_1 = 250000;
        $op_2 = 500000;
        $op_3 = 1000000;
        $op_4 = 2000000;
        $op_5 = 4000000;
        $op_6 = 8000000;
        $op_7 = 16000000;
        $op_8 = 32000000;
        $op_9 = 64000000;
        $op_10 = 128000000;

        $tax_1 = ($op_1 * 10) / 100;
        $tax_2 = ($op_2 * 15) / 100;
        $tax_3 = ($op_3 * 20) / 100;
        $tax_4 = ($op_4 * 25) / 100;
        $tax_5 = ($op_5 * 30) / 100;
        $tax_6 = ($op_6 * 35) / 100;
        $tax_7 = ($op_7 * 40) / 100;
        $tax_8 = ($op_8 * 45) / 100;
        $tax_9 = ($op_9 * 50) / 100;
        $tax_10 = ($op_10 * 55) / 100;

        // Checking History
        $a = $this->db->get_where('web_exchangecash_history', array('player_id' => $_SESSION['uid']));
        $b = $a->num_rows();
        if ($b >= 2) {
            $this->session->set_flashdata('false', 'You Already Exchange Cash For 2 Times. Next Exchange Will Be Disabled');
            redirect(base_url('playerpanel/exchangecash'), 'refresh');
        } else {
            // Fetch Owner Account
            $c = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid'], 'hint_question' => $this->encryption->decrypt($data['hint_question']), 'hint_answer' => $this->encryption->decrypt($data['hint_answer'])));
            $d = $c->row();
            if ($d) {
                if ($this->encryption->decrypt($data['cash_amount']) == 1) {
                    if ($d->money < ($op_1 + $tax_1)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_1 + $tax_1)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_1;
                            $remaincash = $d->money - $op_1 - $tax_1;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_1, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_1, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 2) {
                    if ($d->money < ($op_2 + $tax_2)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_2 + $tax_2)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_2;
                            $remaincash = $d->money - $op_2 - $tax_2;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_2, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_2, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 3) {
                    if ($d->money < ($op_3 + $tax_3)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_3 + $tax_3)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_3;
                            $remaincash = $d->money - $op_3 - $tax_3;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_3, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_3, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 4) {
                    if ($d->money < ($op_4 + $tax_4)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_4 + $tax_4)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_4;
                            $remaincash = $d->money - $op_4 - $tax_4;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_4, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_4, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 5) {
                    if ($d->money < ($op_5 + $tax_5)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_5 + $tax_5)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_5;
                            $remaincash = $d->money - $op_5 - $tax_5;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_5, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_5, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 6) {
                    if ($d->money < ($op_6 + $tax_6)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_6 + $tax_6)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_6;
                            $remaincash = $d->money - $op_6 - $tax_6;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_6, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_6, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 7) {
                    if ($d->money < ($op_7 + $tax_7)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_7 + $tax_7)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_7;
                            $remaincash = $d->money - $op_7 - $tax_7;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_7, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_7, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 8) {
                    if ($d->money < ($op_8 + $tax_8)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_8 + $tax_8)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_8;
                            $remaincash = $d->money - $op_8 - $tax_8;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_8, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_8, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 9) {
                    if ($d->money < ($op_9 + $tax_9)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_9 + $tax_9)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_9;
                            $remaincash = $d->money - $op_9 - $tax_9;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_9, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_9, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
                if ($this->encryption->decrypt($data['cash_amount']) == 10) {
                    if ($d->money < ($op_10 + $tax_10)) {
                        $this->session->set_flashdata('false', 'Your Cash Not Enough For Exchange');
                        redirect(base_url('playerpanel/exchangecash'), 'refresh');
                    }
                    if ($d->money >= ($op_10 + $tax_10)) {
                        // Transaction Scene
                        $e = $this->db->get_where('accounts', array('player_id' => $this->encryption->decrypt($data['player_id_receiver'])));
                        $f = $e->row();
                        if ($f) {
                            $totalcash = $f->money + $op_10;
                            $remaincash = $d->money - $op_10 - $tax_10;

                            $g = $this->db->where('player_id', $f->player_id)->update('accounts', array('money' => $totalcash));
                            $h = $this->db->where('player_id', $d->player_id)->update('accounts', array('money' => $remaincash));
                            $i = $this->db->insert('web_exchangecash_history', array('player_id' => $d->player_id, 'receiver' => $f->player_id, 'cash_amount' => $op_10, 'date' => date('d-m-Y h:i:s')));
                            if ($g && $h && $i) {

                                $this->session->set_flashdata('true', 'Successfully Exchange ' . number_format($op_10, '0', ',', '.') . ' Cash To ' . $f->player_name . '');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            } else {
                                $this->session->set_flashdata('false', 'Failed To Exchange Cash, Please Contact DEV / GM For Detail Information');
                                redirect(base_url('playerpanel/exchangecash'), 'refresh');
                            }
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('false', 'Hint Question / Answer Wrong');
                redirect(base_url('playerpanel/exchangecash'), 'refresh');
            }
        }
    }
    function create_hint()
    {
        $data = array(
            'hint_question' => $this->encryption->encrypt($this->input->post('hint_question')),
            'hint_answer' => $this->encryption->encrypt($this->input->post('hint_answer'))
        );

        // Fetch Account
        $a = $this->db->get_where('accounts', array('player_id' => $_SESSION['uid']));
        $b = $a->row();
        if ($b) {
            if ($b->hint_question != null && $b->hint_answer != null) {
                $this->session->set_flashdata('false', 'You Already Create Hint');
                redirect(base_url('playerpanel/create_hint'), 'refresh');
            }
            if ($b->hint_question == null && $b->hint_answer == null) {
                // Update Hint
                $c = $this->db->where('player_id', $b->player_id)->update('accounts', array('hint_question' => $this->encryption->decrypt($data['hint_question']), 'hint_answer' => $this->encryption->decrypt($data['hint_answer'])));
                if ($c) {
                    $this->session->set_flashdata('true', 'Successfully Create Hint');
                    redirect(base_url('playerpanel'), 'refresh');
                } else {
                    $this->session->set_flashdata('false', 'Failed Create Hint');
                    redirect(base_url('playerpanel/create_hint'), 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('false', 'Major Error, Please Contact DEV / GM For Details Information');
            redirect(base_url('playerpanel/create_hint'), 'refresh');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //
