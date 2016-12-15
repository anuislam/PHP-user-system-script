<?php 
	ob_start();
	session_start();
require_once(__DIR__.'/header.php');
	if (empty($_POST) === false) {
		$username 	= trim($_POST['as_username']);
		$username 	= filter_var($username, FILTER_SANITIZE_STRING);
		$password 	= trim($_POST['as_password']);
		$checkbox 	= (isset($_POST['as_checkbox']) === true)? true : false;
		if (empty($username) === true) {
			$error = 'Username cannot be empty.';
		}else if(empty($password) === true){
			$error = 'Password cannot be empty.';
		}else if(as_match( '/^[A-Za-z0-9 ]+$/i', $username) == false){
			$error = 'Invalid username.';
		}else if(as_match( '/\\s/', $username) == true){
			$error = 'Your username must not contain spaces.';
		}else if (as_match( '/\\s/', $password) == true) {
			$error = 'Your Password must not contain spaces.';
		}else if (strlen($password) < 6) {
			$error = 'Your password must be at least 6 characters long.';
		}else if ($asdb->as_get_return_val('user', 'username', array('username' => $username, 'password' => md5($password))) === false) {
			$error = 'Username and Password does not exist.';
		}else{
			// set session
			$udata = $asdb->as_get_return_val('user', array('id', 'username'), array('username' => $username, 'password' => md5($password)));
			$_SESSION['login_id']   = $udata['id'];
			$_SESSION['login_name'] = $udata['username'];
			$_SESSION['key'] = 'ojdosjsodsd54sd5s45d45s4w8e88we8we78s4ds4d';
			if ($checkbox === true) {
				// set coocke


			}
			//redirect url
		}
	}
print_r($_SESSION['login_data']);
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

<div class="container">
<?php

if (empty($error) === false) {
?>

	<div class="row">
		<div class="alert alert-danger" role="alert"> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Oh snap!</strong> <?php echo $error; ?>
		</div>
	</div>

<?php
}

?>


	<!--<div class="row">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Oh snap!</strong> Change a few things up and try submitting again. 
		</div>
	</div>-->
</div>

<div class="container main_content">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form action="#" method="post">
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
			  <div class="checkbox">
			    <label>
				    <?php
				    	echo as_input(array(
				    			'type' 			=>  'checkbox',
				    			'name' 			=>  'as_checkbox'
				    		));
				    ?> Remember Me
			    </label>
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