<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/signin.css">
</head>
<body>
	<?php $this->load->view("partials/header") ?>
	<div id="container">
		<div id="signinDiv">
			<h1>Sign In</h1>
			<form action="dashboard/process_signin" method="post">
				Email Address: <input type="text" name="email"><br>
				Password: <input type="password" name="password"><br>
				<input type="submit" value="Sign In">
			</form>
			<a href="register">Don't have an account? Click here to register!</a>
<?php 
			if($this->session->flashdata("errors"))
			{
?>
 				<h3 class="errors"><?= $this->session->flashdata("errors") ?></h3>
<?php 			
			}
 ?>
		</div>
	</div>
</body>
</html>