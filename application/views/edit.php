<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/edit.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader") ?>
	<div id="container">
		<div id="topDiv">	
			<h1>Edit Profile</h1>				
			<div id="leftDiv">
				<p>Edit Information</p><hr>
				<form action="/users/edit_my_profile" method="post">
					Email Address: <input type="text" name="email" value="<?= $this->session->userdata['current_user_email'] ?>"><br>
					First Name: <input type="text" name="first_name" value="<?= $this->session->userdata['current_user_first_name'] ?>"><br>
					Last Name: <input type="text" name="last_name" value="<?= $this->session->userdata['current_user_last_name'] ?>"><br>
					<input type="submit" value="Save">
				</form>
			</div>
			<div id="rightDiv">
				<p>Change Password</p><hr>
				<form action="/users/edit_my_password" method="post">
					Password: <input type="password" name="password"><br>
					Confirm Password: <input type="password" name="confirmpassword"><br><br>
					<input type="submit" value="Update Password">
				</form>
			</div>
		</div>
		<div id="bottomDiv">
			<p>Edit Description</p>
			<form action="/users/edit_my_description" method="post">
				<textarea name="description"></textarea><br>
				<input type="submit" value="Save">
			</form>
		</div>
	</div>
</body>
</html>