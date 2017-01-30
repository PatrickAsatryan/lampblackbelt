<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/edit_admin.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader") ?>
	<div id="container">
		<div id="topDiv">	
			<h1>Edit Profile <?= $info['id'] ?></h1>				
			<div id="leftDiv">
				<p>Edit Information</p><hr>
				<form action="/users/admin_editinfo_form/" method="post">
					<input type="hidden" name="id" value="<?= $info['id'] ?>">
					Email Address: <input type="text" name="email" value="<?= $info['email'] ?>"><br>
					First Name: <input type="text" name="first_name" value="<?= $info['first_name'] ?>"><br>
					Last Name: <input type="text" name="last_name" value="<?= $info['last_name'] ?>"><br>
					User Level: <select name="user_level">
								<option value="normal">Normal</option>
								<option value="admin">Admin</option>
								</select><br>
					<input type="submit" value="Save">
				</form>
			</div>
			<div id="rightDiv">
				<p>Change Password</p><hr>
				<form action="/users/admin_editpw" method="post">
					<input type="hidden" name="id" value="<?= $info['id'] ?>">					
					Password: <input type="password" name="password"><br>
					Confirm Password: <input type="password" name="confirmpassword"><br><br>
					<input type="submit" value="Update Password">
				</form>
			</div>
		</div>
	</div>
</body>
</html>