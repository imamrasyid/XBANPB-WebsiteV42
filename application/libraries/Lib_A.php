<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_A
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function pass_encrypt($param)
    {
        $ingredient = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
		$encrypt_result = hash_hmac('md5', $param, $ingredient);
		return $encrypt_result;
    }

    public function Protect_Register()
    {
        if (!empty($_SESSION['uid']))
            return redirect(base_url('home'), 'refresh');
    }

    public function Protect_Login()
    {
        if (!empty($_SESSION['uid']))
            return redirect(base_url('home'), 'refresh');
    }

    public function Protect_playerpanel()
    {
        if (empty($_SESSION['uid']))
            return redirect(base_url('home'), 'refresh');
    }

    public function Protect_moderatorpanel()
    {
        if (empty($_SESSION['uid']))
            return redirect('http://111.90.150.182/', 'refresh');
        if (!empty($_SESSION['uid']))
        {
            if ($_SESSION['access_level'] < 3)
                return redirect('http://111.90.150.182/', 'refresh');
        }
    }

    public function Protect_moderatorpanel2()
    {
        if (!empty($_SESSION['admin_id']))
            return redirect(base_url('404/home'), 'refresh');
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>