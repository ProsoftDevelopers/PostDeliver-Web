<?php
class Dashboard extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function get_travelling_history()
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "Select distinct(country_of_origin_of_journey) MCountry, 
				SUM(CASE WHEN gender = 'M' THEN 1 ELSE 0 END) as Male, 
				SUM(CASE WHEN gender = 'F' THEN 1 ELSE 0 END) as Female
			from tbl_quarantine
			GROUP BY country_of_origin_of_journey" ;
			
		$query = $this->db->query($qry);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
	
	function get_movements_data($mobile_no)
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "	SELECT date_of_arrival as p_time_stamp, latitude, longitude, mobile_no, 'BASE' as movement_source1
					FROM tbl_quarantine 
					WHERE mobile_no ='". $mobile_no ."' 
						UNION 
					SELECT p_time_stamp, 
						latitude, longitude, mobile_no, 'MOB' as movement_source2
					FROM tbl_history 
					WHERE mobile_no ='". $mobile_no ."' 
						UNION 
					SELECT CONCAT(Date_Format(CallDate,'%Y-%m-%d'), ' ', Date_Format(CallTime,'%H:%i:%s'))   AS p_time_stamp, 
						Latitude_A,Longitude_A,CDRPhoneNo, 'CDR' as movement_source3
					FROM tbl_cdrmovements
					WHERE CDRPhoneNo ='91". $mobile_no ."'" ;
			
		$query = $this->db->query($qry);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
	
	/*
	function save_levels($level_name,$level_description,$parent_level_id,$country,$state,$district,$latitude,$longitude)
	{
		$domain_id = $this->session->userdata('domain_id');
			
		$this->level_name   = $level_name; // please read the below note
		$this->level_description   = $level_description	;
        $this->parent_level_id = $parent_level_id;
		$this->country_id  	= $country;
		$this->state_id   	= $state;
		$this->district_id   = $district;
		$this->latitude   = $latitude;
		$this->longitude   = $longitude;
		$this->domain_id = $domain_id;
	   
        $this->db->insert('level', $this);
		return $this->db->insert_id();
	}
	
	function save_jurisdiction($level_id, $lat_long, $geom_lat_long)
	{
		$CI =& get_instance();
		
		$this->level_id   = $level_id; 
		$domain_id = $this->session->userdata('domain_id');
				
		if($this->db->delete('level_jurisdiction', array('level_id' => $level_id, 'domain_id' => $domain_id))) 
		{
			$sql = "
				INSERT INTO level_jurisdiction(level_id, jurisdiction_geometry, lat_long, domain_id) 
				VALUES (". $level_id .",". $geom_lat_long .",'". $lat_long ."', ". $domain_id .")
			";	
			
			$query = $this->db->query($sql);
			$monitor_site_id =  $this->db->insert_id();
			return $monitor_site_id;
		}
		else
		{
			return 0;
		}		
	}
	
	function get_levels($level_id = 0)
	{
		$domain_id = $this->session->userdata('domain_id');
			
		if($level_id==0)
		{
			$this->db->where('domain_id', $domain_id);
			$query = $this->db->get('level');
		}
		else
		{
			$query = $this->db->get_where('level', array('level_id' => $level_id, 'domain_id' => $domain_id));
		}
		
		return $query;
	}
	*/
}	
?>