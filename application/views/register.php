<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/register.css">
</head>
<body>
	<?php $this->load->view("partials/header") ?>
	<div id="container">
		<div id="regDiv">
			<h1>Register</h1>
			<form action="dashboard/process_register" method="post">
				Email Address: <input type="text" name="email"><br>
				First Name: <input type="text" name="first_name"><br>
				Last Name: <input type="text" name="last_name"><br>
				Password: <input type="password" name="password"><br>
				Confirm Password: <input type="password" name="confirm_password"><br>
				<input type="submit" value="Register">
			</form>
			<a href="signin">Already have an account? Sign in!</a><br><br>
<?php 
		if($this->session->flashdata("errors"))
		{
			echo $this->session->flashdata("errors");
		}	
?>			
		</div>
	</div>
</body>
</html>