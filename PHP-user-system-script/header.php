<?php
require_once(__DIR__.'/inc/config/config.php');
require_once(root_path.'inc/functions.php');
require_once(root_path.'inc/pdo.php');
$asdb = new as_database();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Php User System using pdo</title>

		<!-- Bootstrap -->
		<link href="<?php echo site_url; ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo site_url; ?>style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>