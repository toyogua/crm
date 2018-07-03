<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 26/06/2018
 * Time: 23:21
 */

class Login_helper
{
    function is_logged_in() {
        // Get current CodeIgniter instance
        $CI =& get_instance();
        // We need to use $CI->session instead of $this->session
        $user = $CI->session->userdata('user_data');
        if (!isset($user)) { return false; } else { return true; }
    }
}