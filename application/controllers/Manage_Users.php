<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Users extends CI_Controller {
	
	//function __construct(){
		//parent::__construct();
		//if(! $this->session->userdata('adid'))
		//redirect('admin/login');
	//}

	public function index(){
		$this->load->model('ManageUsers_Model');
		$user=$this->ManageUsers_Model->getusersdetails();
		//$this->load->view('manage_users',['userdetails'=>$user]);
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('manage_users',['userdetails'=>$user]);
		$this->load->view('footer');
	}

	// For particular Record
	public function getuserdetail($uid)
	{
		$this->load->model('ManageUsers_Model');
		$udetail=$this->ManageUsers_Model->getuserdetail($uid);
		//$this->load->view('getuserdetails',['ud'=>$udetail]);

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('getuserdetails',['ud'=>$udetail]);
		$this->load->view('footer');
	}

	public function deleteuser($uid)
	{
		$this->load->model('ManageUsers_Model');
		$this->ManageUsers_Model->deleteuser($uid);
		
		//$this->session->set_flashdata('success', 'User data deleted');
		//redirect('Manage_Users');
		redirect("index.php/Manage_Users/index");
		
		//$this->index();
	}

	public function add_new_user(){
		//$this->load->model('ManageUsers_Model');
		
		$this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');

		$this->form_validation->set_rules('designation','Designation','required|alpha');
		$this->form_validation->set_rules('department','Department','required|alpha');
		$this->form_validation->set_rules('policestation','Police Station','required|alpha');
		$this->form_validation->set_rules('city_place','City Place','required|alpha');

		$this->form_validation->set_rules('emailid','Email id','required|valid_email|is_unique[users.emailid]');
		$this->form_validation->set_rules('mobile_number','Mobile Number','required|numeric|exact_length[10]');

		if($this->form_validation->run()){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$emailid=$this->input->post('emailid');
			$mobile_number=$this->input->post('mobile_number');
			$designation=$this->input->post('designation');
			$policestation=$this->input->post('policestation');
			$department=$this->input->post('department');
			$zone=$this->input->post('zone');
			$city_place=$this->input->post('city_place');
			$date1='12-12-2020';
			$status=1;
			
			$is_alert_user = $this->input->post('is_alert_user');

			$this->load->model('ManageUsers_Model');
			$this->ManageUsers_Model->insert('test123',$username,$password,$designation,$department,$policestation,$city_place,$mobile_number,$emailid,'User','','','',$date1,$zone, $is_alert_user);
			$this->index();
		} else {
			//$this->load->view('signup');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('signup');
			$this->load->view('footer');
		}
	}
}