<?php
	$host         = "localhost"; // "prosoft.belgaumonline.in"; "localhost";
	$username     = "root"; // "belgaumo_prosoft"; "root";
	$password     = "123"; // "Prosoft123$$"; "123";
	$dbname       = "test1"; // "belgaumo_prosoft"; "test1";
	
	$conn=mysqli_connect($host,$username,$password, $dbname);
	if(!$conn){
		die('Could not Connect My Sql:' .mysqli_error());
	}
	
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = true;
	
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		if($c) 
		{ $c = false; continue; } 

		$sql = "INSERT INTO `tbl_quarantine`(`date_of_arrival`, `date_until_quarantined`, `country_of_origin_of_journey`, `port_of_origin_of_journey`, 
		`port_of_final_destination`, `country_of_final_destination`, `address`, `district_city`, `state_ut_province`, `pin`, `country`, 
		`final_district_city`, `latitude`, `longitude`, `traveller_patient_name`, `mobile_no`, `imei`, 
		`device_id`, `last_latitude`, `last_longitude`, `gender`) 
		VALUES 
		('". $filesop[1] ."', '". $filesop[2] ."', '". $filesop[3] ."', '". $filesop[4] ."', '". $filesop[5] ."', '". $filesop[6] ."', '". $filesop[7] ."', '". $filesop[8] ."', '". $filesop[9] ."',
		'". $filesop[10] ."', '". $filesop[11] ."', '". $filesop[12] ."', '". $filesop[13] ."', '". $filesop[14] ."', '". $filesop[15] ."', '". $filesop[16] ."', '". $filesop[17] ."',
		'". $filesop[18] ."', '". $filesop[19] ."', '". $filesop[20] ."', '". $filesop[21] ."')";

		$stmt = mysqli_prepare($conn,$sql);
		mysqli_stmt_execute($stmt);

		//$c = $c + 1;
	}

	header('Content-type: application/json');	
	if($sql){
		//echo "data successfully updated<br><Br><Br><Br>";
		echo json_encode(1);
	} 
	else
	{
		//echo "Sorry! Unable to import";
		echo json_encode(0);
	}
?>