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

function as_required($data){
	$data = trim($data);
	if (empty($data) === true) {
		 return false;
	}else{
		return true;
	}
}

function as_match($regex, $str) {
    return (preg_match($regex,$str))? true: false;
}



?>