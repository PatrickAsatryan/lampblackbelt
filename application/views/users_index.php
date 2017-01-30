<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/users_index.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader") ?>
	<div id="container">
		<div id="userDiv">
			<h1>All Users</h1>
			<table>
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>User Level</th>
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