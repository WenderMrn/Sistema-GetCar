<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('validate_user')){
    
    function validate_user($post)
    {
        echo $this->input->post('cpf'); exit;
    }

}