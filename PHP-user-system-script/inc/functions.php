<?php
function as_input($data){
	if (is_array($data)) {
		$input = "<input ";
		foreach ($data as $key => $value) {
			$input .= "$key = '$value' ";
		}
		$input .= ">";
		return $input;
	}
}
function as_set_valut($name){
	if (isset($_REQUEST[$name]) === true && empty($_REQUEST[$name]) === false) {
		return trim($_REQUEST[$name]);
	}else{
		return false;
	}
}

function as_match($regex, $str) {
    return (preg_match($regex,$str))? true: false;
}

function is_logged_in (){
	if (isset($_COOKIE['login_id']) || isset($_COOKIE['login_name'])) {
		return true;
	}else if (isset($_SESSION['login_id']) || isset($_SESSION['login_name'])) {
		return true;
	}else{
		return false;
	}
}



?>