<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/users_index_admin.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader");
	if(!$this->session->userdata("current_user_user_level") == "admin")
	{
		redirect("/users");
	}?>
	<div id="container">
		<div id="usersDiv">
			<h1>Manage Users</h1>
			<form id="formNew" action="/users/new" method="post">
				<input id="addNew" type="submit" value="Add New">
			</form>
			<table>
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>User Level</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<tr>
<?php 
						foreach ($userinfo as $userinfo) {
 ?>
 							<td><?= $userinfo["id"] ?></td>
 							<td><a href="users/show/<?= $userinfo['id'] ?>"><?= $userinfo["first_name"]. " " .$userinfo["last_name"] ?></a></td>
 							<td><?= $userinfo["email"] ?></td>
 							<td><?= $userinfo["created_at"] ?></td>
 							<td><?= $userinfo["user_level"] ?></td>
 							<td><a href="users/editadmin/<?= $userinfo['id'] ?>">edit</a> | <a href="users/removeadmin/<?= $userinfo['id'] ?>">remove</a></td>
 							</tr>
<?php							
						}
?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>