<?php
	$latitude = "15.7535639"; // $_POST["latitude"];
	$longitude = "75.1102521"; // $_POST["longitude"];
	$mobile_no = "9912345678"; // $_POST["mobile_no"];
	
	if ($latitude != "" && $longitude != "" && $mobile_no != "")
	{	
		$host         = "localhost:3306"; // "localhost:3306"; "localhost";
		$username     = "prosoftesol"; // "prosoftesol"; "root";
		$password     = "Pro123$$"; // "Pro123$$"; "123";
		$dbname       = "prosoft"; // "prosoft"; "test1"; 

		// Create connection
		$conn = new mysqli($host, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$date = date('Y-m-d H:i:s');
		$sql_insert = "INSERT INTO `tbl_history`(`p_time_stamp`, `latitude`, `longitude`, `mobile_no`) 
				VALUES ('". $date ."', ". $latitude .", ". $longitude .", '". $mobile_no ."')";

		if ($conn->query($sql_insert) === TRUE) {
			//echo "New record created successfully";

			$sql_get_perm_loc = "Select `latitude`, `longitude`, `traveller_patient_name`, `mobile_no` FROM `tbl_quarantine` Where `mobile_no`='". $mobile_no ."'";
			$perm_locs = $conn->query($sql_get_perm_loc);
			
			$curr_latitude = "";
			$curr_longitude = "";

			if ($perm_locs->num_rows > 0) {
				// output data of each row
				while($perm_locs_row = $perm_locs->fetch_assoc()) {
					$curr_latitude = $perm_locs_row["latitude"];
					$curr_longitude = $perm_locs_row["longitude"];
				}
			}
			
			if ($curr_latitude != "" && $curr_longitude != "") {
				/*
				$sql_outside_movs = "SELECT h.`id`, ( 6371 * acos( cos( radians(". $curr_latitude .") ) * cos( radians( h.`latitude` ) ) 
							* cos( radians( h.`longitude` ) - radians(". $curr_longitude .") ) + sin( radians(". $curr_latitude .") ) * sin(radians(h.`latitude`)) ) ) AS distance 
							FROM `tbl_quarantine` q
							LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
							HAVING distance > 0.100
							ORDER BY distance";
				*/

				$sql_outside_movs = "SELECT h.`id`, h.`p_time_stamp`, ( 
													6371 * acos ( 
														cos(radians(q.`latitude`)) 
														* cos( radians (h.`latitude`)) 
														* cos(radians(h.`longitude`) - radians(q.`longitude`)) 
														+ sin(radians(q.`latitude`)) 
														* sin(radians(h.`latitude`)) 
														) 
													) AS distance, 
									h.`latitude`, h.`longitude` 
									FROM `tbl_quarantine` q
									LEFT JOIN `tbl_history` h on q.`mobile_no` = h.`mobile_no`
									Where q.`mobile_no`='". $mobile_no ."'
									HAVING distance > 0.100
									ORDER BY distance";
							
				$outside_movs = $conn->query($sql_outside_movs);			

				if ($outside_movs->num_rows > 0) {		

					$sql = "SELECT `id`, `user_name`, `address`, `designation`, `department`, `contact_no`, `email_id`, `is_send_sms`, `is_send_email` FROM `tbl_users`";
					$user_details = $conn->query($sql);

					if ($user_details->num_rows > 0) {
						// output data of each row
						while($row = $user_details->fetch_assoc()) {
							$is_send_sms = $row["is_send_sms"];
							$is_send_email = $row["is_send_email"];
										
							//$message = "Test123";
							
							if ($is_send_sms == 1)
							{
								$contact_no = $row["contact_no"];
								if ($contact_no != "")
								{					
									$message = "Changes%20in%20location%20were%20detected%20for%20the%20quarantined%20person%20who%20is%20having%20mobile%20no%20:%20". $mobile_no ."";
									$sms_url = "http://sms.belgaumit.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=e6dd47891c2f8e5144dfc0288d38d62&message=". $message ."&senderId=OOOCDR&routeId=7&mobileNos=". $contact_no ."&smsContentType=english";
									
									//SEND SMS
									try 
									{
										$ch = curl_init($sms_url);
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										$result = curl_exec($ch); 
										curl_close($ch);		
										//echo $result ; // For Report or Code Check										
										//echo "Message sent successfully.";
										//redirect("userc/manage", 'refresh');
									}
									catch(Exception $e) 
									{
										echo 'Message: ' .$e->getMessage();
									}
								}
							}
							
							if ($is_send_email == 1)
							{
								$message = "Changes in location were detected for the quarantined person who is having mobile no : ". $mobile_no .", and the movement details are as follows,";
								$message .= "<br>";
								
								$message .= "<table width='100%' style='border: 1px solid #ddd;'>";
								$message .= "<tr>
												<th>Sl No</th>
												<th>Time Stamp</th>
												<th>Latitude</th>
												<th>Longitude</th>
												<th>Distance (KM)</th>												
											</tr>";
								
								$counter = 0;
								
								while($outside_movs_row = $outside_movs->fetch_assoc()) {
									$p_time_stamp = $outside_movs_row["p_time_stamp"];
									$distance = $outside_movs_row["distance"];
									$latitude = $outside_movs_row["latitude"];
									$longitude = $outside_movs_row["longitude"];
									
									$counter = $counter + 1;
									
									$message .= "<tr>
													<td>". $counter ."</td>	
													<td>". $p_time_stamp ."</td>								
													<td>". $latitude ."</td>
													<td>". $longitude ."</td>
													<td>". $distance ."</td>
												</tr>";									
								}
								
								$message .= "</table>";
								
								$email_id = $row["email_id"];
								$email_id = htmlspecialchars($email_id);
								$email_id = strip_tags($email_id);
								$email_id = filter_var($email_id, FILTER_SANITIZE_EMAIL);
								$email_id = filter_var($email_id, FILTER_VALIDATE_EMAIL);
					
								if ($email_id != "")
								{					
									$headers = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html\r\n";
									
									// Create email headers
									//$headers .= 'From: '.$e_email."\r\n";
									$subject = "C5 QUATS Alert System";
									
									mail($email_id, $subject, $message, $headers);
								}
							}
						}
					} else {
						echo "0 results";
					}
				}
			}
			
			$conn->close();	
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
?>