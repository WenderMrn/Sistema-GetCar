<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('validate_user')){
    
    function validate_user($post)
    {
        echo $this->input->post('cpf'); exit;
    }

}

if (!function_exists('validaCPF')){
    
	function validaCPF($cpf) {
	 
	    // Extrai somente os números
	    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
	     
	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($cpf) != 11) {
	        return false;
	    }

	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if (preg_match('/(\d)\1{10}/', $cpf)) {
	        return false;
	    }

	    // Faz o calculo para validar o CPF
	    for ($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $cpf{$c} * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($cpf{$c} != $d) {
	            return false;
	        }
	    }
	    return true;

	}

}

if (!function_exists('validaNome')){
    
	function validaNome($nome) {
	 
	    if (!preg_match('/^[a-zA-Z\s]+$/', $nome)) {
	        return false;
	    }


	    if(!stristr($nome, " ")){
	    	return false;
	    }

	    if(strlen(explode(" ", $nome)[0]) < 3){
	    	return false;
	    }

	    return true;

	}

}