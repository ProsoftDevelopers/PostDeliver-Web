<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterCasec extends CI_Controller {

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
	 
	public function set_register_case()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//if($this->session->userdata('is_admin')==1)				
			//{	
				//$this->load->model('level');
				$data['query'] = ""; // $this->level->get_countries();
				$this->load->view('header');
				$this->load->view('sidebar');
				$this->load->view('register_case_body',$data);
				$this->load->view('footer_register_case');
			//}
			//else
			//{
			//	$this->load->view('header');
			//	$this->load->view('sidebar');
			//	$this->load->view('404');				
			//}
		}		
	}
	
	public function save_register_case()
	{
		$patient_id	= $this->input->post('patient_id');
		$person_name = $this->input->post('person_name');
		$mobile_number = $this->input->post('mobile_number');
		$pimage_path = $this->input->post('pimage_path');
		$age = $this->input->post('age');
		$gender = $this->input->post('gender');
		$house_no = $this->input->post('house_no');
		$street_locality = $this->input->post('street_locality');
		$place_tehsil = $this->input->post('place_tehsil');
		$district_city = $this->input->post('district_city');
		$pin_code = $this->input->post('pin_code');
		$state_ut_province = $this->input->post('state_ut_province');
		$country = $this->input->post('country');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$quarantined_type = $this->input->post('quarantined_type');
		$maritial_status = $this->input->post('maritial_status');
		$occupation = $this->input->post('occupation');
		$aadharcardnumber = $this->input->post('aadharcardnumber');
		$symptom = $this->input->post('symptom');
		$police_station = $this->input->post('police_station');
		$isforeignreturn_foreigner = $this->input->post('isforeignreturn_foreigner');
		$dateofarrival = $this->input->post('dateofarrival');
		$datetillquarantined = $this->input->post('datetillquarantined');
		$port_of_originofjourney = $this->input->post('port_of_originofjourney');
		$port_of_finaldestination = $this->input->post('port_of_finaldestination');
		$finaldistrict_city = $this->input->post('finaldistrict_city');
		$country_of_originofjourney = $this->input->post('country_of_originofjourney');
		$country_of_finaldestination = $this->input->post('country_of_finaldestination');
		$last_latitude = $this->input->post('last_latitude');
		$last_longitude = $this->input->post('last_longitude');
		$reasonforquarantine = $this->input->post('reasonforquarantine');
		$incontactsuspecttype = $this->input->post('incontactsuspecttype');
		$status = $this->input->post('status');
		$category = $this->input->post('category');
		$parentid = $this->input->post('parentid');
		$imei = $this->input->post('imei');
		$device_id = $this->input->post('device_id');
		$userid = $this->input->post('userid');
		$createddate = $this->input->post('createddate');
		
		$this->load->model('RegisterCase');
		$response = $this->RegisterCase->save_register_case($patient_id, $person_name, $mobile_number, $pimage_path, $age, $gender, 
						$house_no, $street_locality, $place_tehsil, $district_city, $pin_code, $state_ut_province, $country, $latitude, $longitude, 
						$quarantined_type, $maritial_status, $occupation, $aadharcardnumber, $symptom, $police_station, 
						$isforeignreturn_foreigner, $dateofarrival, $datetillquarantined, $port_of_originofjourney, $port_of_finaldestination, 
						$finaldistrict_city, $country_of_originofjourney, $country_of_finaldestination, $last_latitude, $last_longitude, 
						$reasonforquarantine, $incontactsuspecttype, $status, $category, $parentid, $imei, $device_id, $userid, $createddate);
						
		if($response > 0)
		{
			//success
			echo $response;
		}
		else
		{
			echo "0";
			log_message('error', 'Error creating case casec.php : '.$response);
		}
	}
	
	public function save_family_details()
	{		
		$person_name	= $this->input->post('person_name');
		$fmobile_number	= $this->input->post('fmobile_number');
		$pimage_path	= $this->input->post('pimage_path');
		$age	= $this->input->post('age');
		$gender	= $this->input->post('gender');
		$occupation	= $this->input->post('occupation');
		$relationship	= $this->input->post('relationship');
		$house_no	= $this->input->post('house_no');
		$street_locality	= $this->input->post('street_locality');
		$place_tehsil	= $this->input->post('place_tehsil');
		$district_city	= $this->input->post('district_city');
		$pin_code	= $this->input->post('pin_code');
		$state_ut_province	= $this->input->post('state_ut_province');
		$country	= $this->input->post('country');
		
		$mobile_number	= $this->input->post('mobile_number');
		
		$userid	= $this->input->post('userid');
		$createddate	= $this->input->post('createddate');
		$zone	= $this->input->post('zone');
		
		$this->load->model('RegisterCase');
		$response = $this->RegisterCase->save_family_details($person_name, $fmobile_number, $pimage_path, 
									$age, $gender, $occupation, $relationship, $house_no, $street_locality, $place_tehsil, 
									$district_city, $pin_code, $state_ut_province, $country, 
									$mobile_number, $userid, $createddate, $zone);
						
		if($response > 0)
		{
			//success
			echo $response;
		}
		else
		{
			echo "0";
			log_message('error', 'Error creating case casec.php : '.$response);
		}
	}
	
	public function save_medical_history()
	{
		$symptoms = $this->input->post('symptoms');
		$clinic = $this->input->post('clinic');
		$doctorconsulted = $this->input->post('doctorconsulted');
		$visit_date = $this->input->post('visit_date');
		$doctor_remark = $this->input->post('doctor_remark');
		
		$mobile_number = $this->input->post('mobile_number');
		
		$userid = $this->input->post('userid');
		$createddate = $this->input->post('createddate');
		$zone = $this->input->post('zone'); 
		
		$this->load->model('RegisterCase');
		$response = $this->RegisterCase->save_medical_history($symptoms, $clinic, $doctorconsulted, $visit_date, 
															$doctor_remark, $mobile_number, $userid, $createddate, $zone);
						
		if($response > 0)
		{
			//success
			echo $response;
		}
		else
		{
			echo "0";
			log_message('error', 'Error creating case casec.php : '.$response);
		}
	}
} 
?>
