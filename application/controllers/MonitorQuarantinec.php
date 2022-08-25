<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MonitorQuarantinec extends CI_Controller {

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
	 
	public function set_monitor_quarantine()
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
				$this->load->view('monitor_quarantine_body2',$data);
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
	
	function get_quarantine_data()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//$case_id = $this->input->post('case_id');
			$this->load->model('MonitorQuarantine');
			$data['q_data'] = $this->MonitorQuarantine->get_quarantine_data();
			
			//if ($data['q_data'] != 0)
			//{
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
			//}
			//else
			//{
				//echo json_encode(110);
			//}
		}
	}
	
	function get_quarantine_data_dashboard()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//$case_id = $this->input->post('case_id');
			$this->load->model('MonitorQuarantine');
			$data['q_data'] = $this->MonitorQuarantine->get_quarantine_data_dashboard();
						
			//if ($data['q_data'] != 0)
			//{
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
			//}
			//else
			//{
				//echo json_encode(110);
			//}
			
		}
	}
	
	function get_inplace_outplace_dashboard()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//$case_id = $this->input->post('case_id');
			$this->load->model('MonitorQuarantine');
			$data['q_data'] = $this->MonitorQuarantine->get_inplace_outplace_dashboard();
						
			//if ($data['q_data'] != 0)
			//{
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
			//}
			//else
			//{
				//echo json_encode(110);
			//}
		}
	}
	
	function get_movements_data()
	{	
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$mobile_no = $this->input->post('mobile_no');
			$this->load->model('MonitorQuarantine');
			$data = $this->MonitorQuarantine->get_movements_data($mobile_no);
			
			if($data != 0){
				echo json_encode($data);
			}
			else {
				echo json_encode(110);
			}
			
			
			// if ($data['q_data'] != 0)
			// {
			// 	$arr = array();
			// 	foreach ($data['q_data']->result() as $row1)
			// 	{
			// 		array_push($arr, $row1);
			// 		/*
			// 		$arr[] = array($row1->case_id, $row1->case_name, $row1->case_lat, $row1->case_long, $row1->case_desc, 
			// 						$row1->created_by_id, $row1->date_inserted, $row1->case_date, $row1->level_id, $row1->case_category, 
			// 						$row1->caseno, $row1->place, $row1->city, $row1->state, $row1->country, $row1->device, $row1->imei, 
			// 						$row1->ipv4address, $row1->ipv6address, $row1->macaddress, $row1->uploadeddt, $row1->case_status, $row1->case_remarks);	
			// 		*/
			// 	}			
			// 	echo json_encode($arr);
			// }
			// else
			// {
			// 	echo json_encode(110);
			// }
		}
	}

	function get_history_images(){
			
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$mobile_no = $this->input->post('mobile_no');
			$this->load->model('MonitorQuarantine');
			$data = $this->MonitorQuarantine->get_history_images($mobile_no);
			
			if($data != 0){
				echo json_encode($data);
			}
			else {
				echo json_encode(110);
			}
			
		}
	}
} 
?>
