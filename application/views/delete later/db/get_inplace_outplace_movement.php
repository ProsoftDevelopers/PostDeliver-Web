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
	$sql = "SELECT Count(h.`id`) as MovementCount, 'Out Place' as Location
			FROM `tbl_quarantine` q
			LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
			Where ( 
					6371 * acos ( 
						cos(radians(q.`latitude`)) 
						* cos(radians(h.`latitude`)) 
						* cos(radians(h.`longitude`) - radians(q.`longitude`)) 
						+ sin(radians(q.`latitude`)) 
						* sin(radians(h.`latitude`)) 
						) 
					) > 0.100
			union
			SELECT Count(h.`id`) as MovementCount, 'In Place' as Location
			FROM `tbl_quarantine` q
			LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
			Where ( 
					6371 * acos ( 
						cos(radians(q.`latitude`)) 
						* cos(radians(h.`latitude`)) 
						* cos(radians(h.`longitude`) - radians(q.`longitude`)) 
						+ sin(radians(q.`latitude`)) 
						* sin(radians(h.`latitude`)) 
						) 
					) <= 0.100" ;
	
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