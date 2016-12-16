<?php
ob_start();
session_start();
require_once(__DIR__.'/header.php');
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
if (empty($_GET) === false) {
	if ($_GET['register'] == 'successfully') {
?>
<div class="container">
	<div class="row">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Oh snap!</strong> Register Successfully. 
		</div>
	</div>
</div>
<?php
	}
}

?>

<div class="container main_content">
	<div class="row">
	</div>
</div>


<?php require_once(__DIR__.'/footer.php'); ?>