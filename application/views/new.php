<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/new.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader") ?>
	<div id="container">
		<div id="newDiv">
			<h1>Add A New User</h1>
			<form id="dashForm" action="/users" method="post">
				<input id="dashInput" type="submit" value="Back to Dashboard">
			</form>
			<form action="/users/admin_add" method="post">
				Email Address: <input type="text" name="email"><br>
				First Name: <input type="text" name="first_name"><br>
				Last Name: <input type="text" name="last_name"><br>
				Password: <input type="password" name="password"><br>
				Confirm Password: <input type="password" name="confirm_password"><br>
				<input type="submit" value="Create">
			</form>
		</div>
	</div>
</body>
</html>