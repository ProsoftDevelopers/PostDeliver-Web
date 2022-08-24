<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertc extends CI_Controller {

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
	 
	public function set_alert()
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
				$this->load->view('alert_body',$data);
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
	
	function get_last_generated_alert_details()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//$mobile_no = $this->input->post('mobile_no');
			$this->load->model('Alert');
			$data['q_data'] = $this->Alert->get_last_generated_alert_details();
			
			if (!is_int($data['q_data']))
			{
				$arr = array();
				foreach ($data['q_data']->result() as $row1)
				{
					array_push($arr, $row1);
					/*
					$arr[] = array($row1->case_id, $row1->case_name, $row1->case_lat, $row1->case_long, $row1->case_desc, 
									$row1->created_by_id, $row1->date_inserted, $row1->case_date, $row1->level_id, $row1->case_category, 
									$row1->caseno, $row1->place, $row1->city, $row1->state, $row1->country, $row1->device, $row1->imei, 
									$row1->ipv4address, $row1->ipv6address, $row1->macaddress, $row1->uploadeddt, $row1->case_status, $row1->case_remarks);	
					*/
				}
			
				echo json_encode($arr);
			}
			else
			{
				echo json_encode(110);
			}
		}
	}
	
	function generate_alert()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$this->load->model('Alert');
			$generated_data = $this->Alert->generate_alert();
			
			if (!is_int($generated_data))
			{
				//echo json_encode(count($generated_data));
				if (count($generated_data) == 2)
				{
					$m_guid_id = $generated_data[0];
					$arr = array();
					
					foreach ($generated_data[1]->result() as $row1)
					{
						array_push($arr, $row1);						
					}
				
					echo json_encode(array($m_guid_id, $arr));
				}				
			}
			else
			{
				echo json_encode($generated_data);
			}
		}
	}
	
	function get_list_of_already_generated_alert_report()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$this->load->model('Alert');
			$generated_data = $this->Alert->get_list_of_already_generated_alert_report();
			
			if (!is_int($generated_data))
			{
				$arr = array();					
				foreach ($generated_data->result() as $row1)
				{
					array_push($arr, $row1);						
				}
			
				echo json_encode($arr);			
			}
			else
			{
				echo json_encode($generated_data);
			}
		}
	}
	
	function get_details_of_already_generated_alert_report()
	{
		$alertid = $this->input->post('alertid');
		
		$this->load->model('Alert');
		$generated_data = $this->Alert->get_violators_id_wise($alertid);
		
		if (!is_int($generated_data))
		{
			$arr = array();
			foreach ($generated_data->result() as $row1)
			{
				array_push($arr, $row1);
			}
			
			echo json_encode($arr);
		}
		else
		{
			echo json_encode($generated_data);
		}
	}
	
	function send_sms_email()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$alertid = $this->input->post('alertid');			
			
			$this->send_sms($alertid);
			$this->send_email($alertid);
			
			echo json_encode(001);
		}
	}
	
	// Send Email
	function send_email($alertid)
	{
		$m_email_message = "C5 QUATS - We have noticed a few quarantine violators. More info on https://prosoft.belgaumonline.in/c5quats/violator_list.php?alertid=". $alertid ."";;
		$email_counter = 0;
		
		$this->load->model('Alert');
		$users_list = $this->Alert->get_email_users();
		
		if (!is_int($users_list))
		{
			foreach ($users_list->result() as $row1)
			{		
				$email_id = $row1->email_id;				
								
				if ($email_id != "")
				{
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
				$email_counter = $email_counter + 1;				
			}
		}
	}
	
	// Send SMS
	function send_sms($alertid)
	{		
		$sms_counter = 0;
		
		$this->load->model('Alert');
		$users_list = $this->Alert->get_sms_users();
		
		if (!is_int($users_list))
		{
			foreach ($users_list->result() as $row1)
			{		
				$contact_no = $row1->contact_no;
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
				
				$sms_counter = $sms_counter + 1;				
			}
		}
	}
	
	function g_violators()
	{
		$alertid = $this->input->get('alertid');
		
		$this->load->model('Alert');
		$generated_data = $this->Alert->get_violators_id_wise($alertid);
		
		if (!is_int($generated_data))
		{
			$arr = array();
			foreach ($generated_data->result() as $row1)
			{
				array_push($arr, $row1);
			}
			
			$data['violators_details'] = $arr; // $this->level->get_countries();
			
			$this->load->view('header');
			$this->load->view('sidebar_violators');
			$this->load->view('violator_list_body', $data);
			$this->load->view('footer');
		}
		else
		{
			echo json_encode("No data found.");
		}
	}
} 
?>
