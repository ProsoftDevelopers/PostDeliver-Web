<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Users extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('admin/login');
}

public function index(){
$this->load->model('Movements_model');
$this->load->helper('url');
//$user=$this->Movements_Model->getdata();
//$this->load->view('admin/movements',['userdetails'=>$user]);

	$users = $this->Movements_model->getdata();

    $data['users'] = $users;

    $this->load->view('admin/movements',$data);
	
	//echo json_encode($data);
	//die();
}


// For particular Record
public function getuserdetail($uid)
{
$this->load->model('Movements');
$udetail=$this->Movements_Model->getuserdetail($uid);
$this->load->view('admin/movements',['ud'=>$udetail]);
}

public function deleteuser($uid)
{
$this->load->model('ManageUsers_Model');
$this->ManageUsers_Model->deleteuser($uid);
$this->session->set_flashdata('success', 'User data deleted');
redirect('admin/manage_users');
}


}