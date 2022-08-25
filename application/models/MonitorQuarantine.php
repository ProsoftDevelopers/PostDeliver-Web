<?php
class MonitorQuarantine extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function get_quarantine_data()
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "SELECT t2.id, Cast(t2.date_of_arrival as Date) as date_of_arrival, Cast(t2.date_until_quarantined as Date) as date_until_quarantined, t2.country_of_origin_of_journey, t2.port_of_origin_of_journey, 
			t2.port_of_final_destination, t2.country_of_final_destination, t2.address, t2.district_city, t2.state_ut_province, t2.pin, 
			t2.country, t2.final_district_city, t2.latitude, t2.longitude, t2.traveller_patient_name, t2.mobile_no, t2.imei, t2.device_id, 
			t2.last_latitude, t2.last_longitude, t2.gender 
			FROM tbl_quarantine t2
			";
			
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
	
	function get_quarantine_data_dashboard()
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "Select DISTINCT(Cast(date_of_arrival as Date)) as MDate, 
				SUM(CASE WHEN gender = 'M' THEN 1 ELSE 0 END) as Male, 
				SUM(CASE WHEN gender = 'F' THEN 1 ELSE 0 END) as Female
			from tbl_quarantine
			GROUP BY date_of_arrival" ;
			
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
	
	function get_inplace_outplace_dashboard()
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "SELECT Count(h.id) as MovementCount, 'Out Place' as Location
			FROM tbl_quarantine q
			LEFT JOIN tbl_history h on q.mobile_no = h.mobile_no
			Where ( 
					6371 * acos ( 
						cos(radians(q.latitude)) 
						* cos(radians(h.latitude)) 
						* cos(radians(h.longitude) - radians(q.longitude)) 
						+ sin(radians(q.latitude)) 
						* sin(radians(h.latitude)) 
						) 
					) > 0.100
			union
			SELECT Count(h.id) as MovementCount, 'In Place' as Location
			FROM tbl_quarantine q
			LEFT JOIN tbl_history h on q.mobile_no = h.mobile_no
			Where ( 
					6371 * acos ( 
						cos(radians(q.latitude)) 
						* cos(radians(h.latitude)) 
						* cos(radians(h.longitude) - radians(q.longitude)) 
						+ sin(radians(q.latitude)) 
						* sin(radians(h.latitude)) 
						) 
					) <= 0.100" ;
			
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
		
		// $qry = "SELECT date_of_arrival AS p_time_stamp, latitude, longitude, mobile_no, 'BASE' AS movement_source1
		// 		FROM tbl_quarantine
		// 		WHERE mobile_no = '". $mobile_no ."' 
		// 		UNION
		// 		SELECT p_time_stamp, latitude, longitude, mobile_no, 'MOB' AS movement_source2
		// 		FROM tbl_history_image
		// 		WHERE mobile_no = '". $mobile_no ."'";

		
		$qry="SELECT distinct
		e.entity_name,
		e.address,
		e.district_city,
		e.state_ut_province,
		e.pin,
		p_time_stamp, h.latitude as h_latitude, h.longitude as h_longitude,
		h.mobile_no
		FROM entity e
		INNER JOIN
		[dbo].[tbl_history_image] h
		on e.id = h.entity_id WHERE 1=1";



		//if user want to search by mobile No
		if($mobile_no)
		{
			$qry.="AND h.mobile_no='".$mobile_no."'";
		}



		$query = $this->db->query($qry);

		

		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		}
		else
		{
			return 0;
		}
	}


	//get history images
	function get_history_images($mobile_no){

		$qry="SELECT url,filename from tbl_history_image where  1=1";


		//if user want to search by mobile No
		if($mobile_no !="")
		{
			$qry.="AND mobile_no='".$mobile_no."'";
		}

		$query = $this->db->query($qry);

		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
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