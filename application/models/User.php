<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}
	public function get_user_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	public function update_info($post)
	{
		$query = "UPDATE users SET email=?, first_name=?, last_name=? WHERE id=?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $this->session->userdata['current_user_id']);
		$this->session->set_userdata("current_user_email", $post["email"]);
		$this->session->set_userdata("current_user_first_name", $post["first_name"]);
		$this->session->set_userdata("current_user_last_name", $post["last_name"]);
		return $this->db->query($query, $values);
	}
	public function update_password($post)
	{
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encpass = md5($post["password"]. "ayylmao" .$salt);
		$query = "UPDATE users SET password=?, salt =? WHERE id=?";
		$values = array($encpass, $salt, $this->session->userdata["current_user_id"]);
		return $this->db->query($query, $values);
	}
	public function update_description($post)
	{
		$query = "UPDATE users SET description =? WHERE id=?";
		$values = array($post["description"], $this->session->userdata["current_user_id"]);
		return $this->db->query($query, $values);
	}
	public function admin_update_info($post)
	{
		$query = "UPDATE users SET email =?, first_name=?, last_name=?, user_level=? WHERE id=?";
		$values = array($post["email"], $post["first_name"], $post["last_name"], $post["user_level"], $post["id"]);
		return $this->db->query($query, $values);
	}
	public function admin_editpass($post)
	{
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encpass = md5($post["password"]. "ayylmao" .$salt);
		$query = "UPDATE users SET password=?, salt=? WHERE id=?";
		$values = array($encpass, $salt, $post["id"]);
		return $this->db->query($query, $values);
	}
	public function admin_adduser($post)
	{
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encpass = md5($post["password"]. "ayylmao" .$salt);
		$description = "This user has not set their description yet!";
		$query = "INSERT INTO users (first_name, last_name, email, salt, password, user_level, description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, 'normal', ?, CURDATE(), CURDATE())";
		$values = array($post["first_name"], $post["last_name"], $post["email"], $salt, $encpass, $description);
		return $this->db->query($query, $values);
	}
	public function admin_remove($id)
	{
		$query = "DELETE FROM users WHERE id=?";
		$values = array($id);
		return $this->db->query($query, $values);
	}
	public function post_message_data($post)
	{
		$query = "INSERT INTO messages (user_id, message, profile_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($post["user_id"], $post["message"], $post["profile_id"]);
		return $this->db->query($query, $values);
	}
	public function display_message_data($id)
	{
		$query = "SELECT profile_id, messages.id AS 'msgid',messages.message , users.id, users.first_name, users.last_name, messages.created_at FROM messages JOIN users ON users.id = messages.user_id WHERE profile_id=?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
	public function display_message_with_comments($id)
	{
		$query = "SELECT profile_id, messages.id AS 'msgid',messages.message , users.id, users.first_name, users.last_name, messages.created_at FROM messages JOIN users ON users.id = messages.user_id WHERE profile_id=?";
		$values = array($id);
		$messages = $this->db->query($query, $values)->result_array();

		for($i = 0; $i < count($messages); $i++) 
		{
			$comment_query = "SELECT users.first_name, users.id as user_id, users.last_name, comments.comment, comments.created_at FROM comments JOIN users ON comments.user_id = users.id WHERE comments.message_id = ?";
			$value = array($messages[$i]["msgid"]);
			$messages[$i]["comments"] = $this->db->query($comment_query, $value)->result_array();

		}
		return $messages;
	}	
	public function post_comment_data($post)
	{
		$query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($post["message_id"], $post["user_id"], $post["comment"]);
		return $this->db->query($query, $values);
	}
	public function display_comment_data()
	{
		$query = "SELECT users.id AS 'POSTERid', users.first_name, users.last_name, comments.comment, comments.created_at, comments.message_id, messages.id FROM comments JOIN users on users.id = comments.user_id JOIN MESSAGES on messages.id = comments.message_id";
		// $values = array();
		// return $this->db->query($query, $values)->result_array(); 
		return $this->db->query($query)->result_array(); 
	}































}