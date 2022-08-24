<?php 
	$host         = "prosoft.belgaumonline.in"; // "prosoft.belgaumonline.in"; "localhost";
	$username     = "belgaumo_prosoft"; // "belgaumo_prosoft"; "root";
	$password     = "Prosoft123$$"; // "Prosoft123$$"; "123";
	$dbname       = "belgaumo_prosoft"; // "belgaumo_prosoft"; "test1";
	
	$result_array = array();

	$mobile_no  = $_POST['mobile_no'];
	if(!$mobile_no){
	  $result = 101;
	  echo json_encode($result);
	}else {
		/* Create connection */
		$conn = new mysqli($host, $username, $password, $dbname);
		/* Check connection  */
		if ($conn->connect_error) {
			 die("Connection to database failed: " . $conn->connect_error);
		}

		/* SQL query to get results from database */
		$sql = "SELECT `id`, `p_time_stamp`, `latitude`, `longitude`, `mobile_no` FROM `tbl_history` WHERE `mobile_no` = '". $mobile_no ."'			
			";

		$sql = "	SELECT `date_of_arrival` as p_time_stamp, `latitude`, `longitude`, `mobile_no`, 'BASE' as movement_source1
					FROM `tbl_quarantine` 
					WHERE `mobile_no` ='". $mobile_no ."' 
						UNION 
					SELECT `p_time_stamp`, 
						`latitude`, `longitude`, `mobile_no`, 'MOB' as movement_source2
					FROM `tbl_history` 
					WHERE `mobile_no` ='". $mobile_no ."' 
						UNION 
					SELECT CONCAT(Date_Format(`CallDate`,'%Y-%m-%d'), ' ', Date_Format(`CallTime`,'%H:%i:%s'))   AS `p_time_stamp`, 
						`Latitude_A`,`Longitude_A`,`CDRPhoneNo`, 'CDR' as movement_source3
					FROM `tbl_cdrmovements`
					WHERE `CDRPhoneNo` ='91". $mobile_no ."'" ;


		
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
	}

/*

SELECT `p_time_stamp`, `latitude`, `longitude`, `mobile_no` 
FROM `tbl_history` 
WHERE `mobile_no` = '9912345678'

			UNION 
SELECT CONCAT(Date_Format(`CallDate`,"%Y-%m-%d"), " ", Date_Format(`CallTime`,"%H:%i:%s"))   AS `p_time_stamp`, `Latitude_A`,`Longitude_A`,`CDRPhoneNo`
FROM `cdrmovements`
WHERE `CDRPhoneNo` = '919912345678'
*/

?>
