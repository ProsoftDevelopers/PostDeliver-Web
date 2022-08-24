<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Movements_Model extends CI_Model{
	public function getdata(){ //getusersdetails(){
		$this->db->limit(5);
		$query=$this->db->select('id, date_of_arrival, date_until_quarantined, country_of_origin_of_journey, port_of_origin_of_journey, port_of_final_destination, country_of_final_destination, address, district_city, state_ut_province, pin, country, final_district_city, latitude, longitude, traveller_patient_name, mobile_no, imei, device_id, last_latitude, last_longitude, gender ')
		              ->get('tbl_quarantine');
					  
					  // echo $query[0]->result(); 
					 //  die();
					 	$this->db->limit(5);
		        return $query->result();      
	}
//Getting particular user deatials on the basis of id	
 public function getuserdetail($uid){
 	$ret=$this->db->select('firstName,lastName,emailId,regDate,id,mobileNumber,lastUpdationDate')
 	              ->where('id',$uid)
 	              ->get('tblusers');
 	                return $ret->row();
 }

 // Function for use deletion
 public function deleteuser($uid){
$sql_query=$this->db->where('id', $uid)
                ->delete('tblusers');
            }
        
        
        
    function getUserDetails($postData=array()){
 
    $response = array();
 
     
 
      // Select record
      //$this->db->select('*');
      	$this->db->limit(10);
      $this->db->select('id, date_of_arrival, date_until_quarantined, country_of_origin_of_journey, port_of_origin_of_journey, port_of_final_destination, country_of_final_destination, address, district_city, state_ut_province, pin, country, final_district_city, latitude, longitude, traveller_patient_name, mobile_no, imei, device_id, last_latitude, last_longitude, gender ')
		              ->get('tbl_quarantine');
     // $this->db->where('username', $postData['username']);
     	$this->db->limit(10);
      $records = $this->db->get('tbl_quarantine');
      
      $response = $records->result_array();
 
     //return $records->result(); 
 
       return $response;
  }
  
   
   
    function getusermovements($postData=array()){
    
    // function getusermovements(){
 
    $response = array();
    //echo $postData['mobile_no'];
   // die();
 
       if(isset($postData['mobile_no']) ){
 
      // Select record
      //$this->db->select('*');
      	$this->db->limit(10);
    ///  $this->db->select('id, date_of_arrival, date_until_quarantined, country_of_origin_of_journey, port_of_origin_of_journey, port_of_final_destination, country_of_final_destination, address, district_city, state_ut_province, pin, country, final_district_city, latitude, longitude, traveller_patient_name, mobile_no, imei, device_id, last_latitude, last_longitude, gender ')
		           //   ->get('tbl_quarantine');
     //  $this->db->where('mobile_no', $postData['mobile_no']);
      //	$this->db->limit(10);
      //$records = $this->db->get('tbl_quarantine');
      
      
     $this->db->query('SELECT p_time_stamp, 	latitude, longitude, mobile_no FROM tbl_history ');
     
      $this->db->where('mobile_no', $postData['mobile_no']);
      $records = $this->db->get('tbl_history');
      $response = $records->result_array();
     
       $query1=$this->db->where('mobile_no', $postData['mobile_no']);
    // $this->db->get_where('mobile_no', array('mobile_no' => '>' . $postData['mobile_no']));
    //  $response = $query1->result_array();
 
 
      
      
      $query2= $this->db->select(" CONCAT(Date_Format('CallDate','%Y-%m-%d'))");
      
   //   echo $query2;
   //   die();
     // , '\'' '', Date_Format(CallTime,\''%H:%i:%s\''))   AS p_time_stamp, 
				//	Latitude_A,Longitude_A,CDRPhoneNo FROM tbl_cdrmovements');
				
//	$this->db->select("CONCAT_WS(' ', users.first_name, users.last_name) AS name");
   // $this->db->select(DATE_FORMAT(pm.date_sent, '%M %D, %Y'));
  //  $this->db->select('pm.message_read');
  //  $this->db->from('users_personal_messages AS pm');
     //return $records->result(); 
     }
     // echo $response->result();;
    //  die();
       return $response;
  }
  
  function getUserDetails123($postData=array()){
 
    $response = array();
 
    if(isset($postData['username']) ){
 
      // Select record
      $this->db->select('*');
      $this->db->where('username', $postData['username']);
      $records = $this->db->get('users');
      $response = $records->result_array();
 
    }
 
    return $response;
  }


}