<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Model {

	public function get_user_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
	}
	public function admin_check()
	{
		$admin_check = $this->db->query("SELECT * FROM users")->row_array();
		if($admin_check)
		{
			return "normal";
		}
		else
		{
			return "admin";
		}
	}
	public function register($post)
	{
		$user_level = $this->Dash->admin_check();
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encpass = md5($post["password"]. "ayylmao" .$salt);
		$description = "This user has not set their description yet!";
		$query = "INSERT INTO users (first_name, last_name, email, salt, password, user_level, description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, CURDATE(), CURDATE())";
		$values = array($post["first_name"], $post["last_name"], $post["email"], $salt, $encpass, $user_level, $description);
		return $this->db->query($query, $values);
	}
}