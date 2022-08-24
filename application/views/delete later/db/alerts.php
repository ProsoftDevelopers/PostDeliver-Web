<?php 
	$func_name = $_GET['function'];	
	
	if ($func_name == "get_last_generated_alert_details")
	{
		get_last_generated_alert_details();
	}
	else if ($func_name == "get_no_of_violators")
	{
		get_no_of_violators();
	}
	else if ($func_name == "generate_alert")
	{
		generate_alert();
	}
	else if ($func_name == "send_alerts")
	{
		$alertid = $_GET['alertid'];
		send_alerts($alertid);
	}
	else if ($func_name == "get_violators_unique_id_wise")
	{
		$alertid = $_GET['alertid'];
		get_violators_unique_id_wise($alertid);
	}
	
	function get_mysql_connection()
	{
		$host         = "prosoft.belgaumonline.in"; // "prosoft.belgaumonline.in"; "localhost";
		$username     = "belgaumo_prosoft"; // "belgaumo_prosoft"; "root";
		$password     = "Prosoft123$$"; // "Prosoft123$$"; "123";
		$dbname       = "belgaumo_prosoft"; // "belgaumo_prosoft"; "test1"; 

		// Create connection
		$conn = new mysqli($host, $username, $password, $dbname);
			
		// Check connection
		if ($conn->connect_error) {
			// echo "Failed to create MySQL connection ...<br>";
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
	
	function get_last_generated_alert_details()
	{
		$conn = get_mysql_connection();
		
		$result_array = array();
		/* SQL query to get results from database */
		$sql = "SELECT alertid, count(*) as NoOfVoilaters, reported_date from tbl_quarantinevoilation_alertlog
				group by alertid
				order by reported_date desc
				LIMIT 0,1;";
				
		//$last_gen_dt = "";
		$result = $conn->query($sql);
		/* If there are results from database push to result array */
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($result_array, $row);
			}
		}
		
		$conn->close();
		
		/* send a JSON encded array to client */
		header('Content-type: application/json');
		echo json_encode($result_array);		
	}
	
	function get_no_of_violators()
	{
		$conn = get_mysql_connection();
		
		/* SQL query to get results from database */
		$sql = "SELECT COUNT(*) AS NoOfViolators 
				FROM tbl_quarantinevoilation_alertlog
				WHERE alertid IN (
								SELECT alertid from tbl_quarantinevoilation_alertlog 
								Where id IN 
										(SELECT MAX(id) from tbl_quarantinevoilation_alertlog)
								);";
				
		$no_of_violators = "";
		$result = $conn->query($sql);
		/* If there are results from database push to result array */
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$no_of_violators = $row["NoOfViolators"];
			}
		}
		
		$conn->close();
		
		/* send a JSON encded array to client */
		header('Content-type: application/json');
		echo json_encode($no_of_violators);		
	}
	
	function generate_alert()
	{
		$conn = get_mysql_connection();
		
		// echo "MySQL connection created ...<br>";
		
		$m_guid_id = uniqid();		
		$result_array = array();
			
		// Get the current date time (as last violations traced date time) before executing violations query. 
		// This current date time will be used for updating tbl_lastqvdate table.
		// By doing this there will be very less chances of records missing.
		$m_date = date('Y-m-d H:i:s',strtotime('+5 hours +30 minutes',strtotime(date('Y-m-d H:i:s'))));
		$result_array = check_violation_records($conn);
		
		if (!empty($result_array))
		{					
			$temp_mobile_no = "";
			$email_message = "";
			$temp_email_message = "";
			$last_qv_id = 0;
			$counter = 0;	

			try 
			{
				copy_records_into_quarantinevoilation_alertlog_2($conn, $m_guid_id, $m_date);
				
				//send_sms($conn);
				//send_email($conn);
				
				/*
				$arr_length = count($result_array);
				for ($x = 0; $x < $arr_length; $x++) 
				{
					//$last_qv_id = $row["id"];
					$p_time_stamp = $result_array[$x]["p_time_stamp"];
					$latitude = $result_array[$x]["latitude"];
					$longitude = $result_array[$x]["longitude"];
					$mobile_no = $result_array[$x]["mobile_no"];	
					$distance = "";
					
					copy_records_into_quarantinevoilation_alertlog($conn, $p_time_stamp, $latitude, $longitude, $mobile_no, $m_guid_id, $m_date);					
					
					if ($mobile_no != $temp_mobile_no)
					{	
						send_sms($conn, $mobile_no);
						prepare_email($conn, $mobile_no);
						
						$temp_mobile_no = $mobile_no;
					}					
				}
				*/
				
				/*
				$sql = "SELECT `id`, `p_time_stamp`, `latitude`, `longitude`, `mobile_no` FROM `tbl_quarantinevoilation` ORDER BY `mobile_no`";
				$outside_movs_row = $conn->query($sql);

				if ($outside_movs_row->num_rows > 0) {				
					while($row = $outside_movs_row->fetch_assoc()) {
						$last_qv_id = $row["id"];
						$p_time_stamp = $row["p_time_stamp"];
						$latitude = $row["latitude"];
						$longitude = $row["longitude"];
						$mobile_no = $row["mobile_no"];	
						$distance = "";
						
						copy_records_into_quarantinevoilation_alertlog($conn, $p_time_stamp, $latitude, $longitude, $mobile_no, $m_guid_id, $m_date);
						
						if ($mobile_no != $temp_mobile_no)
						{	
							send_sms($conn, $mobile_no);
							prepare_email($conn, $mobile_no);
							
							$temp_mobile_no = $mobile_no;
						}	
					}			
				}
				*/
				
				//delete_q_violations($conn);

				update_last_qv_date($conn, $m_date);	
			}
			catch(Exception $e_001) 
			{
				$conn->close();
				header('Content-type: application/json');
				echo json_encode($e_001);
				die(1);
			}
		}
		
		$conn->close();
		
		$records_with_id = array($m_guid_id, $result_array);
		
		// echo "<br><br>END";			
		header('Content-type: application/json');
		echo json_encode($records_with_id);
	}
		
	function check_violation_records($conn)
	{
		$result_array = array();
		// Query if its there any violation
		$sql_outside_movs = "SELECT h.`p_time_stamp`, h.`latitude`, h.`longitude`, h.`mobile_no`, ( 
								6371 * acos ( 
									cos(radians(q.`latitude`)) 
									* cos( radians (h.`latitude`)) 
									* cos(radians(h.`longitude`) - radians(q.`longitude`)) 
									+ sin(radians(q.`latitude`)) 
									* sin(radians(h.`latitude`)) 
									) 
								) AS distance
						FROM `tbl_quarantine` q
						LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
						INNER JOIN `tbl_lastqvdate` lqv on h.`p_time_stamp` > lqv.`qvdate`
						HAVING distance > 0.100
						ORDER BY distance";
						
		$outside_movs = $conn->query($sql_outside_movs);

		if ($outside_movs->num_rows > 0) 
		{
			while($outside_movs_row = $outside_movs->fetch_assoc()) {
				//array_push($result_array, $outside_movs_row);
				$o_p_time_stamp = $outside_movs_row["p_time_stamp"];
				$o_latitude = $outside_movs_row["latitude"];
				$o_longitude = $outside_movs_row["longitude"];
				$o_mobile_no = $outside_movs_row["mobile_no"];
				
				$result_array[] = array('p_time_stamp' => $o_p_time_stamp, 'latitude' => $o_latitude,
										'longitude' => $o_longitude, 'mobile_no' => $o_mobile_no);
				
				// Insert all violations into tbl_quarantinevoilation tables
				//$v_date = date('Y-m-d H:i:s');
				/*
				$sql_v_insert = "INSERT INTO `tbl_quarantinevoilation`(`p_time_stamp`, `latitude`, `longitude`, `mobile_no`) 
						VALUES ('". $o_p_time_stamp ."', ". $o_latitude .", ". $o_longitude .", '". $o_mobile_no ."')";

				if ($conn->query($sql_v_insert) === TRUE) 
				{					
				}
				*/
			}
			
			// echo "Violation records copied to tbl_quarantinevoilation table ...<br>";
		}
		
		return $result_array;
	}
	
	//////////////////////////////////////////
	/////////// FIRST APPROACH ///////////////
	//////////////////////////////////////////
	// Move alerted records from tbl_quarantinevoilation table to tbl_quarantinevoilation_alertlog
	function copy_records_into_quarantinevoilation_alertlog_1($conn, $p_time_stamp, $latitude, $longitude, $mobile_no, $m_guid_id, $m_date)
	{			
		$sql_v_insert = "INSERT INTO `tbl_quarantinevoilation_alertlog` (`p_time_stamp`, `latitude`, `longitude`, `mobile_no`, `alertid`, 
						`reported_date`, `userid`, `zone`) 
						VALUES ('". $p_time_stamp ."', ". $latitude .", ". $longitude .", '". $mobile_no ."', '". $m_guid_id ."',
						'". $m_date ."', '', '')";

		if ($conn->query($sql_v_insert) === TRUE) 
		{
			// echo "Record inserted into tbl_quarantinevoilation_alertlog table ...<br>";
		}
		else
		{
			// echo "Failed to insert record into tbl_quarantinevoilation_alertlog. " . $conn->error . "<br>";
		}
	}
	
	///////////////////////////////////////////
	/////////// SECOND APPROACH ///////////////
	///////////////////////////////////////////
	// Move alerted records from tbl_quarantinevoilation table to tbl_quarantinevoilation_alertlog
	function copy_records_into_quarantinevoilation_alertlog_2($conn, $m_guid_id, $m_date)
	{
		$sql_v_insert = "INSERT INTO `tbl_quarantinevoilation_alertlog`
						(p_time_stamp,latitude,longitude,distance,mobile_no,alertid,reported_date,userid,zone)
						SELECT  h.`p_time_stamp`, h.`latitude`, h.`longitude`,
												(
													6371 * acos (
														cos(radians(q.`latitude`))
														* cos( radians (h.`latitude`))
														* cos(radians(h.`longitude`) - radians(q.`longitude`))
														+ sin(radians(q.`latitude`))
														* sin(radians(h.`latitude`))
														)
													) AS distance, h.`mobile_no`,
													'". $m_guid_id ."', '". $m_date ."', 'null', 'null'
											FROM `tbl_quarantine` q
											LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
											INNER JOIN `tbl_lastqvdate` lqv on h.`p_time_stamp` > lqv.`qvdate`
											HAVING distance > 0.100
											ORDER BY distance";

		if ($conn->query($sql_v_insert) === TRUE) 
		{
			// echo "Record inserted into tbl_quarantinevoilation_alertlog table ...<br>";
		}
		else
		{
			// echo "Failed to insert record into tbl_quarantinevoilation_alertlog. " . $conn->error . "<br>";
		}
	}
	
	// Prepare and send email of particular violator
	function prepare_email($conn, $mobile_no)
	{
		$m_email_message = "";
		$counter = 0;
		$sql = "SELECT `id`, `p_time_stamp`, `latitude`, `longitude`, `mobile_no` FROM `tbl_quarantinevoilation` Where `mobile_no` = '". $mobile_no ."'";
		$outside_movs_row = $conn->query($sql);

		if ($outside_movs_row->num_rows > 0) {				
			while($row = $outside_movs_row->fetch_assoc()) {
				$last_qv_id = $row["id"];
				$p_time_stamp = $row["p_time_stamp"];
				$latitude = $row["latitude"];
				$longitude = $row["longitude"];
				$mobile_no = $row["mobile_no"];	
				$distance = "";
				
				if ($m_email_message == "")
				{
					$m_email_message = "Changes in location were detected for the quarantined person who is having mobile no : ". $mobile_no .", and the movement details are as follows,";
					$m_email_message .= "<br><br>";
					
					$m_email_message .= "<table width='100%' style='border: 1px solid #ddd;'>";
					$m_email_message .= "<tr>
										<th>Sl No</th>
										<th>Time Stamp</th>
										<th>Latitude</th>
										<th>Longitude</th>
										<th>Mobile No</th>												
									</tr>";					
					
					$counter = $counter + 1;
					$m_email_message .= "<tr>
											<td>". $counter ."</td>	
											<td>". $p_time_stamp ."</td>								
											<td>". $latitude ."</td>
											<td>". $longitude ."</td>
											<td>". $mobile_no ."</td>
										</tr>";	
				}
				else
				{
					$counter = $counter + 1;					
					$m_email_message .= "<tr>
										<td>". $counter ."</td>	
										<td>". $p_time_stamp ."</td>								
										<td>". $latitude ."</td>
										<td>". $longitude ."</td>
										<td>". $mobile_no ."</td>
									</tr>";					
				}				
			}
			
			$m_email_message .= "</table>";
			$m_email_message .= "<br><br>More info on https://prosoft.belgaumonline.in/c5quats/monitor_quarantined.php";
		}
		
		if ($m_email_message != "")
		{
			send_email($conn, $m_email_message);
		}
	}
	
	// Send Email
	function send_email($conn, $alertid) //function send_email($conn, $m_email_message)
	{
		$m_email_message = "C5 QUATS - We have noticed a few quarantine violators. More info on https://prosoft.belgaumonline.in/c5quats/violator_list.php?alertid=". $alertid ."";;
		$has_email_sent = 0;
		$sql = "SELECT `email_id` FROM `tbl_alert_users` WHERE `is_send_email` = 1";
		$user_details = $conn->query($sql);
					
		if ($user_details->num_rows > 0) {
			while($user_details_row = $user_details->fetch_assoc()) {				
				$email_id = $user_details_row["email_id"];
				
				if ($email_id != "")
				{					
					// echo "EMAIL : " . $m_email_message . "<br><br>";
					
					$email_id = htmlspecialchars($email_id);
					$email_id = strip_tags($email_id);
					$email_id = filter_var($email_id, FILTER_SANITIZE_EMAIL);
					$email_id = filter_var($email_id, FILTER_VALIDATE_EMAIL);
					
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html\r\n";
					
					// Create email headers
					//$headers .= 'From: '.$e_email."\r\n";
					$subject = "C5 QUATS Alert System";
					
					mail($email_id, $subject, $m_email_message, $headers);													
				}
				$has_email_sent = 1;				
			}
		}
	}
	
	// Send SMS
	function send_sms($conn, $alertid) // function send_sms($conn, $v_mobile_no)
	{		
		$has_sms_sent = 0;
		
		$sql = "SELECT `contact_no` FROM `tbl_alert_users` WHERE `is_send_sms` = 1";
		$user_details = $conn->query($sql);
					
		if ($user_details->num_rows > 0) {
			while($user_details_row = $user_details->fetch_assoc()) {
				$contact_no = $user_details_row["contact_no"];
				if ($contact_no != "")
				{	
					//$sms_message = "Changes%20in%20location%20were%20detected%20for%20the%20quarantined%20person%20who%20is%20having%20mobile%20no%20:%20". $v_mobile_no .".%20More%20info%20on%20https://prosoft.belgaumonline.in/c5quats/monitor_quarantined.php";
					$sms_message = "C5%20QUATS%20-%20We%20have%20noticed%20a%20few%20quarantine%20violators.%20More%20info%20on%20https://prosoft.belgaumonline.in/c5quats/violator_list.php?alertid=". $alertid ."";
					// echo "SMS : " . $sms_message . "<br>";
					
					$sms_url = "http://sms.belgaumit.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=e6dd47891c2f8e5144dfc0288d38d62&message=". $sms_message ."&senderId=OOOCDR&routeId=7&mobileNos=";					
					$s_sms_url = $sms_url . $contact_no ."&smsContentType=english";					
					
					//SEND SMS
					try 
					{
						$ch = curl_init($s_sms_url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$result = curl_exec($ch); 
						curl_close($ch);		
												
						//echo $result ; // For Report or Code Check										
						//// echo "Message sent successfully.";
						//redirect("userc/manage", 'refresh');
					}
					catch(Exception $e) 
					{
						echo 'Message: ' .$e->getMessage();
					}
				}
				
				$has_sms_sent = 1;				
			}
		}
	}
	
	// Clear all tbl_quarantinevoilation records
	function delete_q_violations($conn)
	{
		// echo "<br>DELETING Records from tbl_quarantinevoilation table ...<br>";		
		
		$sql_delete = "DELETE FROM `tbl_quarantinevoilation`";

		if ($conn->query($sql_delete) === TRUE) {
			// echo "<br>Record successfully deleted from tbl_quarantinevoilation table.<br>";
		} else {
			// echo "<br>Error deleting record from tbl_quarantinevoilation table : " . $conn->error;
		}
	}

	// Update already collected date time into tbl_lastqvdate table	
	function update_last_qv_date($conn, $m_date)
	{
		// echo "<br>Updating records into tbl_lastqvdate table ...<br>";
		
		$sql_update = "UPDATE tbl_lastqvdate SET qvdate='". $m_date ."'";		
		if ($conn->query($sql_update) === TRUE) 
		{
			// echo "<br>Current datetime ". $m_date ." updated into tbl_lastqvdate table ...<br>";
		}
		else
		{
			// echo "<br>Error updating record into tbl_lastqvdate table : " . $conn->error;
		}
	}

	function send_alerts($alertid)
	{
		$conn = get_mysql_connection();
		send_sms($conn, $alertid);
		send_email($conn, $alertid);
		
		$conn->close();
		
		header('Content-type: application/json');
		echo json_encode("001");
	}
	
	function get_violators_unique_id_wise($alertid)
	{
		$conn = get_mysql_connection();
		$result_array = array();
		
		// Query if its there any violation
		$alert_log_sql = "SELECT p_time_stamp, latitude, longitude, distance, mobile_no, alertid, reported_date, userid, zone 
							 FROM `tbl_quarantinevoilation_alertlog`
							 WHERE alertid = '". $alertid ."'";
						
		$alert_log_records = $conn->query($alert_log_sql);

		if ($alert_log_records->num_rows > 0) 
		{
			while($alert_log_row = $alert_log_records->fetch_assoc()) {
				//array_push($result_array, $outside_movs_row);
				$o_p_time_stamp = $alert_log_row["p_time_stamp"];
				$o_latitude = $alert_log_row["latitude"];
				$o_longitude = $alert_log_row["longitude"];
				$o_mobile_no = $alert_log_row["mobile_no"];
				
				$result_array[] = array('p_time_stamp' => $o_p_time_stamp, 'latitude' => $o_latitude,
										'longitude' => $o_longitude, 'mobile_no' => $o_mobile_no);				
			}
			
			// echo "Violation records copied to tbl_quarantinevoilation table ...<br>";
		}
		
		$conn->close();
		
		if (!empty($result_array))
		{	
		}		
				
		header('Content-type: application/json');
		echo json_encode($result_array);
	}
?>