<?php
class RegisterCase extends CI_Model {

	private $country_code = '91';
	
    function __construct()
    {
        //parent::__construct();
    }
	
	function save_register_case($patient_id, $person_name, $mobile_number, $pimage_path, $age, $gender, 
						$house_no, $street_locality, $place_tehsil, $district_city, $pin_code, $state_ut_province, $country, $latitude, $longitude, 
						$quarantined_type, $maritial_status, $occupation, $aadharcardnumber, $symptom, $police_station, 
						$isforeignreturn_foreigner, $dateofarrival, $datetillquarantined, $port_of_originofjourney, $port_of_finaldestination, 
						$finaldistrict_city, $country_of_originofjourney, $country_of_finaldestination, $last_latitude, $last_longitude, 
						$reasonforquarantine, $incontactsuspecttype, $status, $category, $parentid, $imei, $device_id, $userid, $createddate)
	{
		$this->patient_id = $patient_id;
		$this->person_name = $person_name;
		$this->mobile_number = $this->country_code . $mobile_number;
		$this->pimage_path = $pimage_path;
		$this->age = $age;
		$this->gender = $gender;
		$this->house_no = $house_no;
		$this->street_locality = $street_locality;
		$this->place_tehsil = $place_tehsil;
		$this->district_city = $district_city;
		$this->pin_code = $pin_code;
		$this->state_ut_province = $state_ut_province;
		$this->country = $country;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->quarantined_type = $quarantined_type;
		$this->maritial_status = $maritial_status;
		$this->occupation = $occupation;
		$this->aadharcardnumber = $aadharcardnumber;
		$this->symptom = $symptom;
		$this->police_station = $police_station;
		$this->isforeignreturn_foreigner = $isforeignreturn_foreigner;
		$this->dateofarrival = $dateofarrival;
		$this->datetillquarantined = $datetillquarantined;
		$this->port_of_originofjourney = $port_of_originofjourney;
		$this->port_of_finaldestination = $port_of_finaldestination;
		$this->finaldistrict_city = $finaldistrict_city;
		$this->country_of_originofjourney = $country_of_originofjourney;
		$this->country_of_finaldestination = $country_of_finaldestination;
		$this->last_latitude = $last_latitude;
		$this->last_longitude = $last_longitude;
		$this->reasonforquarantine = $reasonforquarantine;
		$this->incontactsuspecttype = $incontactsuspecttype;
		$this->status = $status;
		$this->category = $category;
		$this->parentid = $parentid;
		$this->imei = $imei;
		$this->device_id = $device_id;
		$this->userid = $userid;
		$this->createddate = $createddate;
		
		$this->db->insert('patient_master', $this);
		$record_id =  $this->db->insert_id();		
				
		return $record_id;
	}
	
	function save_family_details($person_name, $fmobile_number, $pimage_path, 
									$age, $gender, $occupation, $relationship, $house_no, $street_locality, $place_tehsil, 
									$district_city, $pin_code, $state_ut_province, $country, 
									$mobile_number, $userid, $createddate, $zone)
	{		
		$this->person_name	= $person_name;
		$this->fmobile_number	= $this->country_code . $fmobile_number;
		$this->pimage_path	= $pimage_path;
		$this->age	= $age;
		$this->gender	= $gender;
		$this->occupation	= $occupation;
		$this->relationship	= $relationship;
		$this->house_no	= $house_no;
		$this->street_locality	= $street_locality;
		$this->place_tehsil	= $place_tehsil;
		$this->district_city	= $district_city;
		$this->pin_code	= $pin_code;
		$this->state_ut_province	= $state_ut_province;
		$this->country	= $country;
		
		$this->mobile_number = $this->country_code . $mobile_number;
		
		$this->userid	= $userid;
		$this->createddate	= $createddate;
		$this->zone	= $zone;
		
		$this->db->insert('family_info', $this);
		$record_id =  $this->db->insert_id();		
				
		return $record_id;
	}
	
	function save_medical_history($symptoms, $clinic, $doctorconsulted, $visit_date, 
								$doctor_remark, $mobile_number, $userid, $createddate, $zone)
	{
		$this->symptoms  = $symptoms;
		$this->clinic  = $clinic;
		$this->doctorconsulted  = $doctorconsulted;
		$this->visit_date  = $visit_date;
		$this->doctor_remark  = $doctor_remark;
		
		$this->mobile_number  = $this->country_code . $mobile_number;
		
		$this->userid  = $userid;
		$this->createddate  = $createddate;
		$this->zone  = $zone; 
		
		$this->db->insert('medical_history', $this);
		$record_id =  $this->db->insert_id();		
				
		return $record_id;
	}
}	
?>