<?php 
	$host         = "localhost"; // "prosoft.belgaumonline.in"; "localhost";
	$username     = "root"; // "belgaumo_prosoft"; "root";
	$password     = "123"; // "Prosoft123$$"; "123";
	$dbname       = "test1"; // "belgaumo_prosoft"; "test1";
	
	$result_array = array();

	/* Create connection */
	$conn = new mysqli($host, $username, $password, $dbname);
	/* Check connection  */
	if ($conn->connect_error) {
		 die("Connection to database failed: " . $conn->connect_error);
	}

	/* SQL query to get results from database */		
	$sql = "Select DISTINCT(Cast(date_of_arrival as Date)) as MDate, 
				SUM(CASE WHEN gender = 'M' THEN 1 ELSE 0 END) as Male, 
				SUM(CASE WHEN gender = 'F' THEN 1 ELSE 0 END) as Female
			from tbl_quarantine
			GROUP BY date_of_arrival" ;
	
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