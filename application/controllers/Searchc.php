<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchc extends CI_Controller {

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
	 
	public function set_search()
	{
		if($this->session->userdata('user_id')=="" || $this->session->userdata('user_id')==null)
		{
			$this->load->view('login');
		}
		else
		{
			$s_text = $this->input->post('s_text');
			$searchitem=str_replace(" ", "%", $s_text);
			
			$this->load->model('Search');
			$search['patient'] = $this->Search->patient_search($s_text);
			$search['cdr'] = $this->Search->cdr_search($s_text);
						
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('search', $search);
			$this->load->view('footer');
		}		
	}
} 
?>
