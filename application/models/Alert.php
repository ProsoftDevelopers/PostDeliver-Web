<?php
class Alert extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function get_last_generated_alert_details()
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$sql = "SELECT Top (1) alertid, count(*) as NoOfVoilaters, reported_date from tbl_quarantinevoilation_alertlog
				group by reported_date, alertid
				order by reported_date desc";
			
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
	
	function generate_alert()
	{
		$m_guid_id = uniqid();		
			
		// Get the current date time (as last violations traced date time) before executing violations query. 
		// This current date time will be used for updating tbl_lastqvdate table.
		// By doing this there will be very less chances of records missing.
		$m_date = date('Y-m-d H:i:s',strtotime('+5 hours +30 minutes',strtotime(date('Y-m-d H:i:s'))));
		
		$result = $this->check_violation_records();
		//return $result;
		
		if ($result->num_rows() > 0)
		{
			try 
			{
				$this->copy_records_into_quarantinevoilation_alertlog_2($m_guid_id, $m_date);
				$this->update_last_qv_date($m_date);	
			}
			catch(Exception $e_001) 
			{
				return -1;
			}
			
			$records_with_id = array($m_guid_id, $result);					
			return $records_with_id;		
		}
		else
		{
			return 0;
		}
	}
	
	function check_violation_records()
	{
		//$result_array = array();

		// Query if its there any violation
		$sql_outside_movs = "SELECT * FROM
								(
									SELECT h.p_time_stamp, h.latitude, h.longitude, h.mobile_no
									, (6371 * acos(cos(radians(q.latitude)) * cos(radians(h.latitude)) * cos(radians(h.longitude) - 											radians(q.longitude)) + sin(radians(q.latitude)) * sin(radians(h.latitude)))) AS distance
									FROM tbl_quarantine q
									LEFT JOIN tbl_history h ON q.mobile_no = h.mobile_no
									INNER JOIN tbl_lastqvdate lqv ON h.p_time_stamp > lqv.qvdate
								)X
								WHERE distance > 0.100
								ORDER BY distance";
						
		$outside_movs = $this->db->query($sql_outside_movs);
		/*
		if ($outside_movs->num_rows > 0) 
		{
			while($outside_movs_row = $outside_movs->fetch_assoc()) {
				$o_p_time_stamp = $outside_movs_row["p_time_stamp"];
				$o_latitude = $outside_movs_row["latitude"];
				$o_longitude = $outside_movs_row["longitude"];
				$o_mobile_no = $outside_movs_row["mobile_no"];
				
				$result_array[] = array('p_time_stamp' => $o_p_time_stamp, 'latitude' => $o_latitude,
										'longitude' => $o_longitude, 'mobile_no' => $o_mobile_no);				
			}
		}
		*/
		return $outside_movs;
	}
	
	// Move alerted records from tbl_quarantinevoilation table to tbl_quarantinevoilation_alertlog
	function copy_records_into_quarantinevoilation_alertlog_2($m_guid_id, $m_date)
	{
		/*
		$sql_v_insert = "INSERT INTO tbl_quarantinevoilation_alertlog
						(p_time_stamp,latitude,longitude,distance,mobile_no,alertid,reported_date,userid,zone)
						SELECT  h.p_time_stamp, h.latitude, h.longitude,
												(
													6371 * acos (
														cos(radians(q.latitude))
														* cos( radians (h.latitude))
														* cos(radians(h.longitude) - radians(q.longitude))
														+ sin(radians(q.latitude))
														* sin(radians(h.latitude))
														)
													) AS distance, h.mobile_no,
													'". $m_guid_id ."', '". $m_date ."', 'null', 'null'
											FROM tbl_quarantine q
											LEFT JOIN tbl_history h on q.mobile_no = h.mobile_no
											INNER JOIN tbl_lastqvdate lqv on h.p_time_stamp > lqv.qvdate
											HAVING distance > 0.100
											ORDER BY distance";
		*/
		
		$sql_v_insert = "INSERT INTO tbl_quarantinevoilation_alertlog 
							(p_time_stamp, latitude, longitude, distance, mobile_no, alertid, reported_date, userid, zone)
							SELECT p_time_stamp, latitude, longitude, distance, mobile_no, alertid, reported_date, userid, zone
							FROM (
    							SELECT h.p_time_stamp, h.latitude, h.longitude, (6371 * acos(cos(radians(q.latitude)) * 														cos(radians(h.latitude)) * cos(radians(h.longitude) - radians(q.longitude)) + sin(radians(q.latitude)) * 									sin(radians(h.latitude)))) AS distance, h.mobile_no, 
									'". $m_guid_id ."' as alertid, '". $m_date ."' as reported_date, 
									'null' AS userid, 'null' AS zone
								FROM tbl_quarantine q
								LEFT JOIN tbl_history h ON q.mobile_no = h.mobile_no
								INNER JOIN tbl_lastqvdate lqv ON h.p_time_stamp > lqv.qvdate
								) X
							WHERE distance > 0.100";

		if ($this->db->query($sql_v_insert) === TRUE) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Update already collected date time into tbl_lastqvdate table	
	function update_last_qv_date($m_date)
	{
		// echo "<br>Updating records into tbl_lastqvdate table ...<br>";
		
		$sql_update = "UPDATE tbl_lastqvdate SET qvdate='". $m_date ."'";		
		if ($this->db->query($sql_update) === TRUE) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_sms_users()
	{
		$sql = "SELECT contact_no FROM tbl_alert_users WHERE is_send_sms = 1";
						
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
	
	function get_email_users()
	{
		$sql = "SELECT email_id FROM tbl_alert_users WHERE is_send_email = 1";
						
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
	
	function get_violators_id_wise($alertid)
	{
		$sql = "SELECT p_time_stamp, latitude, longitude, distance, mobile_no, alertid, reported_date, userid, zone 
							 FROM tbl_quarantinevoilation_alertlog
							 WHERE alertid = '". $alertid ."'";
						
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
		
		/*
		$result_array = array();
		
		// Query if its there any violation
		$alert_log_sql = "SELECT p_time_stamp, latitude, longitude, distance, mobile_no, alertid, reported_date, userid, zone 
							 FROM tbl_quarantinevoilation_alertlog
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
		*/
	}
	
	function get_list_of_already_generated_alert_report()
	{
		$sql = "Select distinct(reported_date) as rDate, count(alertid) as vCount, alertid
				FROM tbl_quarantinevoilation_alertlog
				Group By reported_date, alertid";
						
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
}	
?>