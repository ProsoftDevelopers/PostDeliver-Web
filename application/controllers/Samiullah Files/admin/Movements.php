<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Movements extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('admin/login');
}

public function index(){
$this->load->model('Movements_Model');

$this->load->helper('url');
//$user=$this->Movements_Model->getdata();
//$this->load->view('admin/movements',['userdetails'=>$user]);

     $users = $this->Movements_Model->getdata();
     $getusers = $this->Movements_Model->getusermovements();
    // $users = $this->Movements_Model->getUserDetails();
    $data['users'] = $users;

    // $response=$this->load->view('admin/Movements',$users, TRUE);
   $this->load->view('admin/Movements',$users);
	
	    // echo json_encode($users);
	  //$this->set_output($data); 
	  //echo $users;
	//  die();
}


// For particular Record
public function getuserdetail($uid)
{
$this->load->model('Movements_Model');
//$udetail=$this->Movements_Model->getuserdetail($uid);
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

public function test()
{
 $postData = $this->input->post();
//$this->load->model('ManageUsers_Model');
$data = $this->Movements_Model->getdata($postData);
//$users = $this->Movements_Model->getdata();

//$data = $this->Main_model->getUserDetails($postData);
$this->load->view('admin/Movements',$data);
 echo json_encode($data);
 
//redirect('admin/manage_users');
}


public function userDetails(){
    // POST data
      $this->load->model('Movements_Model');
   // $postData = $this->input->post();

    // get data
    // $data = $this->Movements_Model->getUserDetails($postData);
   $data = $this->Movements_Model->getUserDetails();

   
    echo json_encode($data);
  }
  
  public function usermovements()
{
$this->load->model('Movements_Model');
 $postData = $this->input->post();
//$udetail=$this->Movements_Model->getuserdetail($uid);
$udetail=$this->Movements_Model->getusermovements($postData);
//$this->load->view('admin/movements',['ud'=>$udetail]);
 echo json_encode($udetail);
}

}