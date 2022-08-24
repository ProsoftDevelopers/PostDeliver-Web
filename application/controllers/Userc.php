<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userc extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 	
	public function login()
	{
		$this->load->view('login');
	}	

	public function validate_user()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('userid', 'Username','callback_login_check');
    	    // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->login();
		}
		else
		{		
			$this->index();
		}
		
	}
	
	function login_check($username)
	{
		$password = $this->input->post("password");	
		$this->load->model('User');
		if(!$this->User->validate_user($username, $password))
		{
			$this->form_validation->set_message('login_check', 'Invalid username and password.');
			return false;
		}
		return true;		
	}
	
	//API validate user 	
	public function api_validate_user()
    {
        
        //check if user is allready logged in
        if($this->input->post('user_name')=="" || $this->input->post('user_key')=="")
        {
            echo "Invalide username or key";
        }
        else if($this->input->post('user_name')=="prosoft" || $this->input->post('user_key')=="prosoft321")
        {        
            $username = $this->input->post('userid');
            $password = $this->input->post('password');
            $this->load->model('user');
            $valid = $this->user->api_validate_user($username,$password);
            //echo "lidb = ".$this->session->userdata('level_id');
            if($valid!=0)
            {
                echo json_encode($valid);
            }
            else
            {
                return 0;
            }    
        
        }
    }	
	//API END
	
	public function index()
	{		
		if(!isset($_SESSION["site_lang"])){ 
			$this->session->set_userdata('site_lang',  "english");
		} 
		
		if($this->session->userdata('user_id')!="" || $this->session->userdata('user_id')!=null)
		{
			$this->load->view('dashboard_header');
			$this->load->view('sidebar');
			$this->load->view('dashboard_body');    
			$this->load->view('footer');
		}
		else
		{
			$this->login();
		}
	}
	
	public function switchLang($language = "") 
	{
		$this->session->set_userdata('site_lang', $language);
		header('Location: http://sebi.prosoftesolutions.com/index.php/');
		//$this->login();
	}
   
	public function signout()
	{
		$s_lang = $this->session->userdata('site_lang');		
		
		$this->session->sess_destroy(); 
		//$this->login();	
		
		$this->switchLang($s_lang);
	}
	
	function get_travelling_history()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->login();
		}
		else
		{
			//$mobile_no = $this->input->post('mobile_no');
			$this->load->model('Dashboard');
			$data['q_data'] = $this->Dashboard->get_travelling_history();
			
			//if ($data['q_data'] != 0)
			//{
				$arr = array();
				foreach ($data['q_data']->result() as $row1)
				{
					array_push($arr, $row1);
					/*
					$arr[] = array($row1->case_id, $row1->case_name, $row1->case_lat, $row1->case_long, $row1->case_desc, 
									$row1->created_by_id, $row1->date_inserted, $row1->case_date, $row1->level_id, $row1->case_category, 
									$row1->caseno, $row1->place, $row1->city, $row1->state, $row1->country, $row1->device, $row1->imei, 
									$row1->ipv4address, $row1->ipv6address, $row1->macaddress, $row1->uploadeddt, $row1->case_status, $row1->case_remarks);	
					*/
				}
			
				echo json_encode($arr);
			//}
			//else
			//{
				//echo json_encode(110);
			//}
		}
	}
	
	public function get_users()
	{
			if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
			{
				$this->login();
			}
			else
			{			
				$this->load->model('user');
				echo $this->user->get_users();
			}		
	}
	
	//sadananda
	
	function manage()
	{
			if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
			{
				$this->login();
			}
			else
			{		
			
			if($this->session->userdata('is_admin')==1) 
				
			{	
			  $this->load->view('header');
			  $this->load->view('sidebar');
			  $this->load->view('manageusers');
			  $this->load->view('footer');
			}	

		}		
	}
	
	
	function manageusers()
	{
		
			if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
			{
				$this->login();
			}
			else
			{		
				
				if($this->session->userdata('is_admin')==1) 
				
				{	
				$this->load->library('datatables');
				$this->datatables
					->select("user_id, username, first_name, last_name, user_role.user_role, level.level_name")
					->from("user")
					->join('user_role', 'user_role.user_role_id=user.user_role_id ', 'left')
					->join('level', 'level.level_id=user.level_id', 'left')
					->add_column("Actions", 
					"<center>
						<div class='btn-group'>
							<a class=\"tip btn btn-primary btn-xs\" title='RESEND SETTINGS' href='".base_url()."index.php/userc/resend_settings/$1' onClick=\"return alert('Settings sent successfully.')\">
								<i class=\"fa fa-retweet\"></i>
							</a>
							<a class=\"tip btn btn-primary btn-xs\" title='EDIT PROFILE' href='".base_url()."index.php/userc/edituser/$1' return false;\">
								<i class=\"fa fa-edit\"></i>
							</a>  
							<a class=\"tip btn btn-danger btn-xs\" title='DELETE USER' href='".base_url()."index.php/userc/delete/$1' onClick=\"return confirm('Are you sure you want to delete the user?')\">
								<i class=\"fa fa-trash-o\"></i>
							</a> 
						</div>
					</center>", "user_id")
					->unset_column('user_id');
				
				
			   echo $this->datatables->generate();
			   }
			}
	}
	//end
	
	
} ?>
