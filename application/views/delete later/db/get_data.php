<?php 
	$host         = "prosoft.belgaumonline.in"; // "prosoft.belgaumonline.in"; "localhost";
	$username     = "belgaumo_prosoft"; // "belgaumo_prosoft"; "root";
	$password     = "Prosoft123$$"; // "Prosoft123$$"; "123";
	$dbname       = "belgaumo_prosoft"; // "belgaumo_prosoft"; "test1";

	$result_array = array();
	/* Create connection */
	$conn = new mysqli($host, $username, $password, $dbname);
	/* Check connection  */
	if ($conn->connect_error) {
		 die("Connection to database failed: " . $conn->connect_error);
	}
	/* SQL query to get results from database */
	$sql = "SELECT t2.`id`, Cast(t2.`date_of_arrival` as Date) as date_of_arrival, Cast(t2.`date_until_quarantined` as Date) as date_until_quarantined, t2.`country_of_origin_of_journey`, t2.`port_of_origin_of_journey`, 
			t2.`port_of_final_destination`, t2.`country_of_final_destination`, t2.`address`, t2.`district_city`, t2.`state_ut_province`, t2.`pin`, 
			t2.`country`, t2.`final_district_city`, t2.`latitude`, t2.`longitude`, t2.`traveller_patient_name`, t2.`mobile_no`, t2.`imei`, t2.`device_id`, 
			t2.`last_latitude`, t2.`last_longitude`, t2.`gender` 
			FROM `tbl_quarantine` t2
			";
			
	$result = $conn->query($sql);
	/* If there are results from database push to result array */
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($result_array, $row);
		}
	}
	/* send a JSON encded array to client */
	header('Content-type: application/json');
	echo json_encode($result_array);
	$conn->close();
?>