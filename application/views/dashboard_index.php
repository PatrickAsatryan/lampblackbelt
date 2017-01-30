<!DOCTYPE html>
<html>
<head>
	<title>Welcome to The Test App!</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/dashboard_index.css">
</head>
<body>
	<?php $this->load->view("partials/header") ?>
	<div id="container">
		<div id="welcomeBox">
			<h1>Welcome to The Test App</h1>
			<h3>This cool application was built using MVC Framework at the Coding Dojo!</h3>
			<form action="/signin" method="post">
				<button id="start" type="submit">START</button>
			</form>
		</div>
		<div id="bottomInfo">
			<div class="infoBox">
				<h3>Manage Users</h3><hr>
				<p>Using this application, you can add, remove, and edit users for the website!</p>
			</div>
			<div class="infoBox">
				<h3>Leave Messages</h3><hr>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class="infoBox">
				<h3>Edit User Info</h3><hr>
				<p>Admins will be able to edit another user's information (email address, first name, last name, etc)</p>
			</div>
		</div>
	</div>
</body>
</html>