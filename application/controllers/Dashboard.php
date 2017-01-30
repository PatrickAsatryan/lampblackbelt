<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Dash");
	}
	public function index()		
	{
		$this->load->view('dashboard_index');
	}
	public function signin()
	{

		$this->load->view("signin");
	}
	public function process_signin()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$user = $this->Dash->get_user_by_email($email);
		$testpass = md5($password. "ayylmao" .$user["salt"]);
		if($testpass == $user["password"])
		{
			$current_user = array(
								"current_user_id" => $user["id"],
								"current_user_email" => $user["email"],
								"current_user_first_name" => $user["first_name"],
								"current_user_last_name" => $user["last_name"],
								"current_user_user_level" => $user["user_level"],
								"is_logged_in" => TRUE
				);
			$this->session->set_userdata($current_user);
			redirect("users");
		}
		else
		{
			$this->session->set_flashdata("errors", "Invalid email or password!");
			redirect("signin");
		}

	}
	public function process_register()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|is_unique[users.email]|valid_email");		
		$this->form_validation->set_rules("first_name", "First Name", "required");
		$this->form_validation->set_rules("last_name", "Last Name", "required");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "Password Confirmation", "required|matches[password]");

		if($this->form_validation->run() === TRUE)
		{
			$this->Dash->register($this->input->post());
			redirect("signin");
		}
		else
		{
			$this->session->set_flashdata("errors", validation_errors());
			redirect("register");
		}

	}
	public function register()
	{
		$this->load->view("register");
	}
}