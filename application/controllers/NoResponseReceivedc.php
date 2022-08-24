<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NoResponseReceivedc extends CI_Controller {

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
	 
	public function set_no_response_received()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			//if($this->session->userdata('is_admin')==1)				
			//{	
				//$this->load->model('NoResponseReceived');
				$data['query'] = ""; // $this->NoResponseReceived->get_no_response_received_report(1);
				
				$this->load->view('header');
				$this->load->view('sidebar');
				$this->load->view('no_response_received_body',$data);
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
	
	function get_no_response_received()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$no_of_hours = $this->input->post('no_of_hours');
			
			$this->load->model('NoResponseReceived');
			$generated_data = $this->NoResponseReceived->get_no_response_received_report($no_of_hours);
			
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
} 
?>
