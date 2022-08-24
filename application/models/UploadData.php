<?php
class UploadData extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function save_cdr_import_data()
	{
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

			$sql = "INSERT INTO tbl_cdrmovements(CDRProfileID, CaseProfileID, CDRPhoneNo, CalledPhoneNo, ChargedParty, CallDate, CallTime, 
					TypeofCall, Duration, CellSite, LastCellSite_A, FirstCellSite_B, LastCellSite_B, IMEI, IMEI_B, IMSI_A, IMSI_B, Category, 
					OriginalCDRPhoneNo, OriginalCalledPhoneNo, SSICode_ColA, SSIDesc_ColA, SSICode_ColB, SSIDesc_ColB, TypeOfCall_R, PP_PO, SMSCenter, 
					RoamerDetails, Cnumber, RowNumber, UserID, ServiceProviderState_TowerState_A, ServiceProviderMasterID_A, CellIdAddress, 
					ServiceProviderMasterID_B, ServiceProviderState_TowerState_B, SubName_A, SubAddress_A, DOA_A, TOA_A, SubName_B, SubAddress_B, 
					DOA_B, TOA_B, TowerName_A, TowerAddress_A, Latitude_A, Longitude_A, TowerName_B, TowerAddress_B, Latitude_B, Longitude_B, 
					SPName_A, SPCircle_State_A, SPCountry_A, SPName_B, SPCircle_State_B, SPCountry_B, SPPlace_A, SPPlace_B, SPMID_A, SPMID_B, 
					GMID, GMNAME, Azimuth_A, Azimuth_B, Category_A, Category_B, AsOn_Date_A, AsOn_Date_B) 
					VALUES 
					('". $filesop[1] ."', '". $filesop[2] ."', '". $filesop[3] ."', '". $filesop[4] ."', '". $filesop[5] ."', '". $filesop[6] ."', '". $filesop[7] ."', '". $filesop[8] ."', '". $filesop[9] ."', '". $filesop[10] ."', '". $filesop[11] ."', '". $filesop[12] ."', '". $filesop[13] ."', '". $filesop[14] ."',
					'". $filesop[15] ."', '". $filesop[16] ."', '". $filesop[17] ."', '". $filesop[18] ."', '". $filesop[19] ."', '". $filesop[20] ."', '". $filesop[21] ."', '". $filesop[22] ."', '". $filesop[23] ."', '". $filesop[24] ."', '". $filesop[25] ."', '". $filesop[26] ."', '". $filesop[27] ."',
					'". $filesop[28] ."', '". $filesop[29] ."', '". $filesop[30] ."', '". $filesop[31] ."', '". $filesop[32] ."', '". $filesop[33] ."', '". $filesop[34] ."', '". $filesop[35] ."', '". $filesop[36] ."', '". $filesop[37] ."', '". $filesop[38] ."', '". $filesop[39] ."', '". $filesop[40] ."',
					'". $filesop[41] ."', '". $filesop[42] ."', '". $filesop[43] ."', '". $filesop[44] ."', '". $filesop[45] ."', '". $filesop[46] ."', '". $filesop[47] ."', '". $filesop[48] ."', '". $filesop[49] ."', '". $filesop[50] ."', '". $filesop[51] ."', '". $filesop[52] ."', '". $filesop[53] ."',
					'". $filesop[54] ."', '". $filesop[55] ."', '". $filesop[56] ."', '". $filesop[57] ."', '". $filesop[58] ."', '". $filesop[59] ."', '". $filesop[60] ."', '". $filesop[61] ."', '". $filesop[62] ."', '". $filesop[63] ."', '". $filesop[64] ."', '". $filesop[65] ."', '". $filesop[66] ."',
					'". $filesop[67] ."', '". $filesop[68] ."', '". $filesop[69] ."', '". $filesop[70] ."');";
			
			//echo $sql;
			$stmt = mysqli_prepare($conn,$sql);
			mysqli_stmt_execute($stmt);
			
			//$c = $c + 1;
			$counter = $counter + 1;
		}

		header('Content-type: application/json');	
		if($counter > 0)
		{
			//echo "data successfully updated<br><Br><Br><Br>";
			echo json_encode(1);
		} 
		else
		{
			//echo "Sorry! Unable to import";
			echo json_encode(0);
		}		
		/*	
		$query = $this->db->query($qry);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
		*/
	}
	
	function save_import_data_with_mapping($query)
	{			
		$query_result = $this->db->query($query);
		$record_id =  $this->db->insert_id();
		
		if ($record_id > 0) 
		{
			return $record_id;
		}
		else
		{
			return 0;
		}
	}
}	
?>