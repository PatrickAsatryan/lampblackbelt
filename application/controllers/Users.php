<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User");
		$this->load->model("Dash");
	}
	public function index()
	{
		if($this->session->userdata("current_user_user_level") == "admin")
		{
			$userinfo = $this->User->get_all_users();
			$this->load->view("users_index_admin", ["userinfo" => $userinfo]);
		}
		elseif($this->session->userdata("is_logged_in"))
		{
			$userinfo = $this->User->get_all_users();
			$this->load->view('users_index', ["userinfo" => $userinfo]);
		}
		else
		{
			$this->session->set_flashdata("errors", "Please sign in!");
			redirect("signin");
		}
	}
	public function edit()
	{
		$this->load->view("edit");
	}
	public function editadmin($id)
	{		
		$info = $this->User->get_user_by_id($id);
		$this->load->view("edit_admin", ["info" => $info]);
	}
	public function admin_editinfo_form()
	{
		$this->User->admin_update_info($this->input->post());
		redirect("/users");
	}
	public function new()
	{
		$this->load->view("new");
	}
	public function admin_add()
	{
		$this->User->admin_adduser($this->input->post());
		redirect("/users");
	}
	public function admin_editpw()
	{
		$this->User->admin_editpass($this->input->post());
		redirect("/users");
	}
	public function removeadmin($id)
	{
		$this->User->admin_remove($id);
		redirect("/users");
	}
	public function show($id)
	{
		$info = $this->User->get_user_by_id($id);
		$messages = $this->User->display_message_with_comments($id);		
		$this->load->view("show", ["info" => $info, "messages" => $messages]);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	public function edit_my_profile()
	{
		$this->User->update_info($this->input->post());
		redirect("/users/edit");
	}
	public function edit_my_password()
	{
		$this->User->update_password($this->input->post());
		redirect("/users/edit");
	}
	public function edit_my_description()
	{
		$this->User->update_description($this->input->post());
		redirect("/users/edit");
	}
	public function post_message()
	{
		$this->User->post_message_data($this->input->post());
		redirect("/users");
	}
	public function post_comment()
	{
		$this->User->post_comment_data($this->input->post());
		redirect("/users");
	}
}