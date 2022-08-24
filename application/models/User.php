<?php
class User extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function validate_user($username,$password)
    {
		//returns 0 if invalid user and returns userid if valid user
		
		$this->db->select('tbl_users.user_id, tbl_users.user_name, tbl_users.password, tbl_users.contact_no, tbl_roles.role_id, tbl_roles.role_name');
	    $this->db->from('tbl_users');
		$this->db->join('tbl_roles', 'tbl_users.role_id = tbl_roles.role_id', 'left');
		$this->db->where('tbl_users.user_name',$username);
		$this->db->where('tbl_users.password', base64_encode($password));
		$query = $this->db->get();
		if ($query->num_rows() ==1)
		{
			foreach ($query->result() as $row)
			{
				$user_id = $row->user_id;
				$this->session->set_userdata('user_id', $user_id);				
				$this->session->set_userdata('user_name', $row->user_name);
				$this->session->set_userdata('password', $row->password);
				$this->session->set_userdata('contact_no', $row->contact_no);
				$this->session->set_userdata('role_id', $row->role_id);
				$this->session->set_userdata('role_name', $row->role_name);
			}
			
			$rememberme = $this->input->post('remember_me');
			if( (isset($rememberme)) ) 
			{
				if($rememberme=="on")
				{
				$this->session->sess_expiration = time() + 3600 * 24 * 2; // 3 hours
				$this->session->sess_expire_on_close = FALSE;
				//$this->session->sess_update(); //Force an update to the session data
				}
				else
				{
					
					$this->session->sess_expire_on_close = TRUE;
					//$this->session->sess_update(); 
				}
			}
			
			return true;
		}			
		
		return false;
    }

	//API VALIDATE User
	function api_validate_user($username,$password)
    {
        //returns 0 if invalid user and returns userid if valid user
        
        $query = $this->db->get_where('user', array('username' => $username,'password' => base64_encode($password)));
        $valid = 0;    
        $userid="";
        $levelid="";
            foreach ($query->result() as $row)
            {
                $userid = $row->user_id;
				$levelid = $row->level_id;
                //$this->session->set_userdata('user_id', $userid);
                //$this->session->set_userdata('first_name', $row->first_name);
                //$this->session->set_userdata('last_name', $row->last_name);
                //$this->session->set_userdata('username', $row->username);
                //$this->session->set_userdata('level_id', $row->level_id);
                //echo "lidx = ".$row->level_id;
                $valid=1;
            }
            
            if(!$valid)
            {
                return 0;
            }
            else
            {
                //get current level and all child levels of the assigned user level and put it into session for further use.
                $this->load->model('level');
                $child_level_ids = $this->level->get_subordinate_levels($this->session->userdata('level_id'));
                $this->session->set_userdata('parent_plus_child_level_ids', array_push($child_level_ids,$this->session->userdata('lead_id')));
                $details['userid'] = $userid;
                $details['child_level_ids'] = $child_level_ids;
                $details['my_level_id'] = $levelid;
                return $details;
            }
      
    }
	
	//API VALIDATE END
	
	
    function saveuser($username,$password,$first_name,$last_name,$user_role_id,$level_id,$is_admin,$email,$phone,$file_path)
    {
        $this->username   = $username; // please read the below note
        $this->password = base64_encode($password);
        $this->first_name  = $first_name;
		$this->last_name   = $last_name; // please read the below note
		$this->user_role_id   = $user_role_id;
		$this->level_id   = $level_id;

		//permission id will be basically set of preset permission setup in Database , 1 = full permission
		//$this->user_permission_id   = $user_permission_id;
		$this->is_admin   = $is_admin;
		$this->email   = $email;
		$this->phone   = $phone;
		$this->file_path   = $file_path;
		$this->db->insert('user', $this);
		$user_id =  $this->db->insert_id();
				
		return $user_id;  
    }
	
	function create_user_for_new_donor($donor_code, $donor_name, $donor_address, $donor_contact_no)
	{
		// Create login user
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$pass = substr(str_shuffle($permitted_chars), 0, 5);
		$this->user_name = $donor_code;
		$this->password = base64_encode($pass);
		$this->address = $donor_address;
		$this->contact_no = $donor_contact_no;	
		$this->role_id = 2;			
        $this->db->insert('tbl_users', $this);
		$user_id = $this->db->insert_id();
		
		if ($user_id > 0)
			return $pass;
		else
			return "-1";
	}
	
	function get_user($user_id)
	{
		$user = $this->db->get_where('user', array('user_id' => $user_id));
		return $user;
	}
	
	function get_all_users()
	{
		//$sub_data =  $this->db->get('tbl_users');
		$sub_data =  $this->db->get_where('tbl_users', array('user_id' => 1));
		return $sub_data;			
	}
	
	function get_users()
	{
		$this->load->helper("datatables");
		$this->datatables->from('user');
		return $this->datatables->generate();
	}

	function edituser($user_id)
	{
		$user = $this->db->get_where('user', array('user_id' => $user_id));
		return $user;
	}
	
	function updateuser($file_path)
	{  
			 $data = array(
					//'username'=>$this->input->post('username'),
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
				    'level_id'=>$this->input->post('level_id'),
					'user_role_id'=>$this->input->post('user_role_id'),
				    //'user_permission_id'=>$this->input->post('user_permission_id'),
					'Low'=>$this->input->post('low'),
					'Medium'=>$this->input->post('medium'),
					'High'=>$this->input->post('high'),
					'Extreme'=>$this->input->post('extreme'),
					'mail'=>$this->input->post('mail'),
					'sms'=>$this->input->post('sms'),
				    'file_path'=>$file_path,
				    //'is_admin'=>$is_admin,
						);
		  $this->db->where('user_id',$this->input->post('user_id'));
		  $update = $this->db->update('user',$data);  
				
				return $update;
	}
	
	
	
	function updateuserpassword()
	{
			 $data = array(
					'password'=>base64_encode($this->input->post('password')),
						);
		  $this->db->where('user_id',$this->input->post('user_id'));
		  $update = $this->db->update('user',$data);  	
				return $update;
	}
	
	public function deleteuser($id) 
	{
		if($this->db->delete('user', array('user_id' => $id))) {
			return true;
		}
	return FALSE;
	}
	
	
	
}
?>