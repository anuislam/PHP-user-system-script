<?php
require_once(root_path.'inc/pdo.php');

/**
* Form validation
*/
class Form 
{
	protected $db;
	function __construct()
	{
		$this->db = new as_database();
	}

}

?>