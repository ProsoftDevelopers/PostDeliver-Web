<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UploadDatac extends CI_Controller {

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
	 
	public function set_upload_data()
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
				$this->load->view('data_import_body',$data);
				$this->load->view('footer');
			//}
			//else
			//{
			//	$this->load->view('header');
			//	$this->load->view('sidebar');
			//	$this->load->view('404');				
			//}
		}		
	}
	
	function save_cdr_import_data()
	{
		$host         = "prosoft.belgaumonline.in"; // "prosoft.belgaumonline.in"; "localhost";
		$username     = "belgaumo_prosoft"; // "belgaumo_prosoft"; "root";
		$password     = "Prosoft123$$"; // "Prosoft123$$"; "123";
		$dbname       = "belgaumo_prosoft"; // "belgaumo_prosoft"; "test1";
		
		$conn=mysqli_connect($host,$username,$password, $dbname);
		
		if(!$conn){
			die('Could not Connect My Sql:' .mysqli_error());
		}
	
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = true;
		$counter = 0;
		
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			if($c) 
			{ 
				$c = false; continue; 
			} 
			/*
			$sql = "INSERT INTO `tbl_cdrmovements`(`CDRProfileID`, `CaseProfileID`, `CDRPhoneNo`, `CalledPhoneNo`, `ChargedParty`, `CallDate`, `CallTime`, 
					`TypeofCall`, `Duration`, `CellSite`, `LastCellSite_A`, `FirstCellSite_B`, `LastCellSite_B`, `IMEI`, `IMEI_B`, `IMSI_A`, `IMSI_B`, `Category`, 
					`OriginalCDRPhoneNo`, `OriginalCalledPhoneNo`, `SSICode_ColA`, `SSIDesc_ColA`, `SSICode_ColB`, `SSIDesc_ColB`, `TypeOfCall_R`, `PP_PO`, `SMSCenter`, 
					`RoamerDetails`, `Cnumber`, `RowNumber`, `UserID`, `ServiceProviderState_TowerState_A`, `ServiceProviderMasterID_A`, `CellIdAddress`, 
					`ServiceProviderMasterID_B`, `ServiceProviderState_TowerState_B`, `SubName_A`, `SubAddress_A`, `DOA_A`, `TOA_A`, `SubName_B`, `SubAddress_B`, 
					`DOA_B`, `TOA_B`, `TowerName_A`, `TowerAddress_A`, `Latitude_A`, `Longitude_A`, `TowerName_B`, `TowerAddress_B`, `Latitude_B`, `Longitude_B`, 
					`SPName_A`, `SPCircle_State_A`, `SPCountry_A`, `SPName_B`, `SPCircle_State_B`, `SPCountry_B`, `SPPlace_A`, `SPPlace_B`, `SPMID_A`, `SPMID_B`, 
					`GMID`, `GMNAME`, `Azimuth_A`, `Azimuth_B`, `Category_A`, `Category_B`, `AsOn_Date_A`, `AsOn_Date_B`) 
					VALUES 
					('". $filesop[1] ."', '". $filesop[2] ."', '". $filesop[3] ."', '". $filesop[4] ."', '". $filesop[5] ."', '". $filesop[6] ."', '". $filesop[7] ."', '". $filesop[8] ."', '". $filesop[9] ."', '". $filesop[10] ."', '". $filesop[11] ."', '". $filesop[12] ."', '". $filesop[13] ."', '". $filesop[14] ."',
					'". $filesop[15] ."', '". $filesop[16] ."', '". $filesop[17] ."', '". $filesop[18] ."', '". $filesop[19] ."', '". $filesop[20] ."', '". $filesop[21] ."', '". $filesop[22] ."', '". $filesop[23] ."', '". $filesop[24] ."', '". $filesop[25] ."', '". $filesop[26] ."', '". $filesop[27] ."',
					'". $filesop[28] ."', '". $filesop[29] ."', '". $filesop[30] ."', '". $filesop[31] ."', '". $filesop[32] ."', '". $filesop[33] ."', '". $filesop[34] ."', '". $filesop[35] ."', '". $filesop[36] ."', '". $filesop[37] ."', '". $filesop[38] ."', '". $filesop[39] ."', '". $filesop[40] ."',
					'". $filesop[41] ."', '". $filesop[42] ."', '". $filesop[43] ."', '". $filesop[44] ."', '". $filesop[45] ."', '". $filesop[46] ."', '". $filesop[47] ."', '". $filesop[48] ."', '". $filesop[49] ."', '". $filesop[50] ."', '". $filesop[51] ."', '". $filesop[52] ."', '". $filesop[53] ."',
					'". $filesop[54] ."', '". $filesop[55] ."', '". $filesop[56] ."', '". $filesop[57] ."', '". $filesop[58] ."', '". $filesop[59] ."', '". $filesop[60] ."', '". $filesop[61] ."', '". $filesop[62] ."', '". $filesop[63] ."', '". $filesop[64] ."', '". $filesop[65] ."', '". $filesop[66] ."',
					'". $filesop[67] ."', '". $filesop[68] ."', '". $filesop[69] ."', '". $filesop[70] ."');";
			*/
			
			$sql = "INSERT INTO `cdrhistory`(`cdrprofileid`, `caseprofileid`, `cdrphoneno`, `calledphoneno`, `chargedparty`, 
					`calldate`, `calltime`, `typeofcall`, `duration`, `cellsite`, `lastcellsite_a`, `firstcellsite_b`, `lastcellsite_b`, 
					`imei`, `imei_b`, `imsi_a`, `imsi_b`, `category`, `originalcdrphoneno`, `originalcalledphoneno`, `ssicode_cola`, 
					`ssidesc_cola`, `ssicode_colb`, `ssidesc_colb`, `typeofcall_r`, `pp_po`, `smscenter`, `roamerdetails`, `cnumber`, 
					`rownumber`, `serviceproviderstate_towerstate_a`, `serviceprovidermasterid_a`, `cellidaddress`, 
					`serviceprovidermasterid_b`, `serviceproviderstate_towerstate_b`, `subname_a`, `subaddress_a`, 
					`doa_a`, `toa_a`, `subname_b`, `subaddress_b`, `doa_b`, `toa_b`, `towername_a`, `toweraddress_a`, 
					`latitude_a`, `longitude_a`, `towername_b`, `toweraddress_b`, `latitude_b`, `longitude_b`, `spname_a`, 
					`spcircle_state_a`, `spcountry_a`, `spname_b`, `spcircle_state_b`, `spcountry_b`, `spplace_a`, `spplace_b`, 
					`spmid_a`, `spmid_b`, `gmid`, `gmname`, `azimuth_a`, `azimuth_b`, `category_a`, `category_b`, `ason_date_a`, `ason_date_b`, 
					`userid`, `datecreated`, `zone`) 
					VALUES
					('". $filesop[1] ."', '". $filesop[2] ."', '". $filesop[3] ."', '". $filesop[4] ."', '". $filesop[5] ."', '". $filesop[6] ."', '". $filesop[7] ."', '". $filesop[8] ."', '". $filesop[9] ."', '". $filesop[10] ."', '". $filesop[11] ."', '". $filesop[12] ."', '". $filesop[13] ."', '". $filesop[14] ."',
					'". $filesop[15] ."', '". $filesop[16] ."', '". $filesop[17] ."', '". $filesop[18] ."', '". $filesop[19] ."', '". $filesop[20] ."', '". $filesop[21] ."', '". $filesop[22] ."', '". $filesop[23] ."', '". $filesop[24] ."', '". $filesop[25] ."', '". $filesop[26] ."', '". $filesop[27] ."',
					'". $filesop[28] ."', '". $filesop[29] ."', '". $filesop[30] ."', '". $filesop[32] ."', '". $filesop[33] ."', '". $filesop[34] ."', '". $filesop[35] ."', '". $filesop[36] ."', '". $filesop[37] ."', '". $filesop[38] ."', '". $filesop[39] ."', '". $filesop[40] ."', '". $filesop[41] ."',
					'". $filesop[42] ."', '". $filesop[43] ."', '". $filesop[44] ."', '". $filesop[45] ."', '". $filesop[46] ."', '". $filesop[47] ."', '". $filesop[48] ."', '". $filesop[49] ."', '". $filesop[50] ."', '". $filesop[51] ."', '". $filesop[52] ."', '". $filesop[53] ."', '". $filesop[54] ."',
					'". $filesop[55] ."', '". $filesop[56] ."', '". $filesop[57] ."', '". $filesop[58] ."', '". $filesop[59] ."', '". $filesop[60] ."', '". $filesop[61] ."', '". $filesop[62] ."', '". $filesop[63] ."', '". $filesop[64] ."', '". $filesop[65] ."', '". $filesop[66] ."', '". $filesop[67] ."',
					'". $filesop[68] ."', '". $filesop[69] ."', '". $filesop[70] ."', '". $filesop[31] ."', '', '');";
					
			/* echo json_encode($sql);
			break; */
			$stmt = mysqli_prepare($conn,$sql);
			mysqli_stmt_execute($stmt);
			
			$counter = $counter + 1;
		}

		
		header('Content-type: application/json');	
		if($counter > 0)
		{
			echo json_encode(1);
		} 
		else
		{
			//echo "Sorry! Unable to import";
			echo json_encode(0);
		}
	}
	
	function save_quarantine_import_data()
	{
		$host         = "prosoft.belgaumonline.in"; // "prosoft.belgaumonline.in"; "localhost";
		$username     = "belgaumo_prosoft"; // "belgaumo_prosoft"; "root";
		$password     = "Prosoft123$$"; // "Prosoft123$$"; "123";
		$dbname       = "belgaumo_prosoft"; // "belgaumo_prosoft"; "test1";
		
		$conn=mysqli_connect($host,$username,$password, $dbname);
		if(!$conn){
			die('Could not Connect My Sql:' .mysqli_error());
		}
		
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = true;
		$counter = 0;
		
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			if($c) 
			{ $c = false; continue; } 

			$sql = "INSERT INTO `patient_master`(`patient_id`, `person_name`, `mobile_number`, `pimage_path`, `age`, `gender`, 
			`house_no`, `street_locality`, `place_tehsil`, `district_city`, `pin_code`, `state_ut_province`, `country`, 
			`latitude`, `longitude`, `quarantined_type`, `maritial_status`, `occupation`, `aadharcardnumber`, 
			`symptom`, `police_station`, `isforeignreturn_foreigner`, `dateofarrival`, `datetillquarantined`, 
			`port_of_originofjourney`, `port_of_finaldestination`, `finaldistrict_city`, `country_of_originofjourney`, `country_of_finaldestination`, 
			`last_latitude`, `last_longitude`, `reasonforquarantine`, `incontactsuspecttype`, 
			`status`, `category`, `parentid`, `imei`, `device_id`, `userid`, `createddate`) 
			VALUES 
			('', '". $filesop[17] ."', '". $filesop[18] ."', '', 0, '". $filesop[23] ."', '". $filesop[7] ."', '". $filesop[8] ."', '". $filesop[9] ."',
			'". $filesop[10] ."', '". $filesop[12] ."', '". $filesop[11] ."', '". $filesop[13] ."', '". $filesop[15] ."', '". $filesop[16] ."', '', '',
			'', '', '', '', '', '". $filesop[1] ."', '". $filesop[2] ."', '". $filesop[4] ."', '". $filesop[5] ."', '". $filesop[14] ."', '". $filesop[3] ."', 
			'". $filesop[6] ."', '". $filesop[21] ."', '". $filesop[22] ."', '', '', '', '', '". $filesop[24] ."', '". $filesop[19] ."', '". $filesop[20] ."',
			'', '')";

			$stmt = mysqli_prepare($conn,$sql);
			mysqli_stmt_execute($stmt);

			//$c = $c + 1;
			$counter = $counter + 1;
		}

		header('Content-type: application/json');	
		if($counter > 0){
			//echo "data successfully updated<br><Br><Br><Br>";
			echo json_encode(1);
		} 
		else
		{
			//echo "Sorry! Unable to import";
			echo json_encode(0);
		}
	}
	
	function save_import_data_with_mapping()
	{
		$query = $this->input->post('mquery');	
		$response = 0;
		
		try {
			$this->load->model('UploadData');
			$response = $this->UploadData->save_import_data_with_mapping($query);
		}
		catch(Exception $e) { 
            echo "\n Exception Caught", $e->getMessage();
			return;
        }
		
		if($response > 0)
		{
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
