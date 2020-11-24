<?php

class Send_email_c extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('send_email_m');
	}	
	function index()
	{			
		$this->form_validation->set_rules('registered_email_id', 'Registered Email id:-', 'required|valid_email|max_length[50]');
		
		//$this->form_validation->set_rules('message', 'Message:-', 'required|max_length[300]');
                
		//$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('send_email_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'registered_email_id' => set_value('registered_email_id'),
                                                'message' => set_value('message')
						);
		
			$this->send_email_m->SaveForm($form_data);
			
		}
	}
}
?>