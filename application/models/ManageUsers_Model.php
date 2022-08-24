<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ManageUsers_Model extends CI_Model
{
	public function getusersdetails()
	{
		$query = $this->db->select('username,designation,emailid,department,mobile_number,id')
			->get('users');
		return $query->result();
	}
	//Getting particular user deatials on the basis of id	
	public function getuserdetail($uid)
	{
		$ret = $this->db->select('userid,username,designation,emailid,department,mobile_number,id')
			->where('id', $uid)
			->get('users');
		return $ret->row();
	}

	// Function for use deletion
	public function deleteuser($uid)
	{
		$u_details = $this->getuserdetail($uid);
		$userid = $u_details->userid;
		
		$sql_query = $this->db->where('id', $uid)
			->delete('users');
			
		$sql_query1 = $this->db->where('userid', $userid)
			->delete('tbl_alert_users');
	}


	public function insert($userid, $username, $password, $designation, $department, $policestation, $city_place, $mobile_number, $emailid, $role, $smsalert, $emailalert, $reportsto, $date1, $zone, $is_alert_user)
	{
		$uniqueuserid = uniqid();//get unique id for each user
		$mark_alert_user = 0;
		
		if ($is_alert_user){
			$mark_alert_user = '1';
		}

		$data = array(
			'userid' => $uniqueuserid, //'test123',
			'username' => $username,
			'password' => base64_encode($password),
			'designation' => $designation,
			'department' => $department,
			'policestation' => $policestation,
			'city_place' => $city_place,
			'mobile_number' => $mobile_number,
			'emailid' => $emailid,
			'role' => '2',
			'smsalert' => $mark_alert_user,
			'emailalert' => $mark_alert_user,
			'reportsto' => '',
			'createddate' => $date1,
			'zone' => $zone

		);
		$sql_query = $this->db->insert('users', $data);
		
		if ($sql_query && $is_alert_user){
			$mark_alert_user = '1';		
			$data2 = array(
				'userid' => $uniqueuserid,
				'contact_no' => $mobile_number, //'test123',
				'email_id' => $emailid,			
				'is_send_sms' => $mark_alert_user,
				'is_send_email' => $mark_alert_user
			);
			$sql_query2 = $this->db->insert('tbl_alert_users', $data2);
		}
		
		return $sql_query; 
		/* if ($sql_query) {
			$this->session->set_flashdata('success', 'Registration successfull');
			redirect('Manage_Users');
		} else {
			$this->session->set_flashdata('error', 'Somthing went worng. Error!!');
			redirect('Manage_Users/add_new_user');
		} */
	}
}
