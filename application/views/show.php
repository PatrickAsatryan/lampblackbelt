<!DOCTYPE html>
<html>
<head>
	<title>Name Profile</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/show.css">
</head>
<body>
	<?php $this->load->view("partials/dashHeader") ?>
	<div id="container">
		<div id="wrapper">
			<div id="userInfoDiv">
				<h1><?= $info["first_name"]. " " .$info["last_name"] ?></h1>
				<div id="fields">
					<p>Member Since: </p>
					<p>User Id: </p>
					<p>Email Address:</p>
					<p>Description: </p>
				</div>
				<div id="variables">
					<p><?= $info["created_at"] ?></p>
					<p><?= $info["id"] ?></p>
					<p><?= $info["email"] ?></p>
					<p><?= $info["description"] ?></p>
				</div>
			</div>
			<div id="postMessage">
				<h3>Leave a Message For <?= $info["first_name"] ?>!</h3>
				<form action="/users/post_message" method="post">
					<input type="hidden" name="profile_id" value="<?= $info['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $this->session->userdata["current_user_id"] ?>">
					<textarea id="messageText" name="message"></textarea><br>
					<input type="submit" value="POST">
				</form>
			</div>
			<div id="messageInfo">
<?php 
				if($messages != null)
				{
					foreach ($messages as $message) {
?>
					<p><a href="/users/show/<?= $message["id"] ?>"><?= $message["first_name"] ?></a> wrote a message:</p>
					<small><?= $message["created_at"] ?></small>
					<h4 class="message"><?= $message["message"] ?></h4>
<?php  
						foreach ($message["comments"] as $key => $value) {
						{
?>
								<p class="pComment"><a href="/users/show/<?= $value["user_id"] ?>"><?= $value["first_name"] ?></a> posted a comment:</p>
								<small><?= $value["created_at"] ?></small>
								<h4 class="comment"><?= $value["comment"] ?></h4>
<?php				
						}
					}
?>
					<form action="/users/post_comment" method="post">
						<input type="hidden" name="message_id" value="<?= $message["msgid"] ?>">
						<input type="hidden" name="user_id" value="<?= $this->session->userdata("current_user_id") ?>">
						<textarea name="comment" id="commentText" placeholder="Leave a comment..."></textarea><br>
						<input class="float" type="submit" value="POST">
					</form>
<?php						
					}
				}
?>
			</div>
		</div>
	</div>
</body>
</html>