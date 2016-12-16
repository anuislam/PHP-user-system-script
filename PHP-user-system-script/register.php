<?php 
ob_start();
session_start();
require_once(__DIR__.'/header.php');
	if (empty($_POST) === false) {
		$req_field = array('fname', 'lname', 'email', 'as_username', 'as_password', 're_password');
		foreach ($_POST as $key => $value) {
			$value = trim($value);
			if (empty($value) && in_array($key, $req_field) === true) {
				$error[] = "All field are required";
				break 1;
			}
		}

		if (empty($error) === true) {
			$fname 		= $_POST['fname'];
			$lname 		= $_POST['lname'];
			$email 		= $_POST['email'];
			$username 	= $_POST['as_username'];
			$password 	= $_POST['as_password'];
			if(as_match( '/^[A-Za-z ]+$/i', $fname) === false){
				$error[] = 'Invalid first name.';
			}
			if(as_match( '/^[A-Za-z ]+$/i', $lname) === false){
				$error[] = 'Invalid last name.';
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$email = htmlentities($email);
				$error[] = "\"$email\" is not a valid email address";
			}			
			if(as_match( '/\\s/', $username) === true){
				$error[] = 'Your username must not contain spaces.';
			}
			if(as_match( '/^[A-Za-z0-9 ]+$/i', $username) === false){
				$error[] = 'Invalid username.';
			}
			if (as_match( '/\\s/', $password) === true) {
				$error[] = 'Your Password must not contain spaces.';
			}
			if ($asdb->as_get_return_val('user', 'email', array('email' => $email)) !== false) {
				$email = htmlentities($email);
				$error[] = '"'.$email.'" Email address already exist.';
			}
			if ($asdb->as_get_return_val('user', 'username', array('username' => $username)) !== false) {
				$username = htmlentities($username);
				$error[] = '"'.$username.'" Username address already exist.';
			}
			if ($password !== $_POST['re_password']) {
				$error[] = 'Your Password not match.';
			}
			if (strlen($password) < 6) {
				$error[] = 'Your password must be at least 6 characters long.';
			}
	}

	if (empty($error) === true) {
		$asdb->as_insert('user', array(
				'username' 	=> filter_var($username, FILTER_SANITIZE_STRING),
				'password' 	=> md5($password),
				'email' 	=> $email,
				'fname' 	=> filter_var($fname, FILTER_SANITIZE_STRING),
				'lname' 	=> filter_var($lname, FILTER_SANITIZE_STRING)
			));
		header('location: '.site_url.'index.php?register=successfully');
	}

	}
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#user_menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="user_menu">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
        <li><a href="#">Registration</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?php

if (empty($error) === false) {
	foreach ($error as $key => $value) {
?>
<div class="container">
	<div class="row">
		<div class="alert alert-danger" role="alert"> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Oh snap!</strong> <?php echo $value; ?>
		</div>
	</div>
</div>
<?php
	}
}


?>





<div class="container main_content">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form action="<?php echo  site_url.'register.php'; ?>" method="post">
			  <div class="form-group">
			    <label for="fname">First name</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'text',
			    			'name' 			=>  'fname',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  'fname',
			    			'placeholder' 	=>  'First name',
			    			'value' 		=>  as_set_valut('fname')
			    		));
			    ?>
			  </div>
			  <div class="form-group">
			    <label for="lname">Last name</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'text',
			    			'name' 			=>  'lname',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  'lname',
			    			'placeholder' 	=>  'Last name',
			    			'value' 		=>  as_set_valut('lname')
			    		));
			    ?>
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'email',
			    			'name' 			=>  'email',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  'email',
			    			'placeholder' 	=>  'Last name',
			    			'value' 		=>  as_set_valut('email')
			    		));
			    ?>
			  </div>
			  <div class="form-group">
			    <label for="asusername">Username</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'text',
			    			'name' 			=>  'as_username',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  'asusername',
			    			'placeholder' 	=>  'Username',
			    			'value' 		=>  as_set_valut('as_username')
			    		));
			    ?>
			  </div>
			  <div class="form-group">
			    <label for="aspassword">Password</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'password',
			    			'name' 			=>  'as_password',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  'aspassword',
			    			'placeholder' 	=>  'Password'
			    		));
			    ?>
			  </div>
			  <div class="form-group">
			    <label for="re_password">ReType Password</label>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'password',
			    			'name' 			=>  're_password',
			    			'class' 		=>  'form-control',
			    			'id' 			=>  're_password',
			    			'placeholder' 	=>  'ReType Password'
			    		));
			    ?>
			  </div>
			    <?php
			    	echo as_input(array(
			    			'type' 			=>  'submit',
			    			'class' 		=>  'btn btn-default',
			    			'value' 	=>  'Login'
			    		));
			    ?>
			</form>	
		</div>
	</div>
</div>


<?php require_once(__DIR__.'/footer.php'); ?>