<?php

class Logincontroller extends CI_Controller {

    function __construct(){
      
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('send_email_m');
     
    }
    
    function index(){
        
        
        
        
        if($this->session->userdata('username')!="")
      {
          redirect('customerhomecontroller');
      }
      $this->load->view('loginview');
    }
   
    
    public function user_data_submit() {
        
        
        $this->db->select('password');
        $this->db->from($this->input->post('table'));
        $this->db->where('username',$this->input->post('uname'));
         $query1 = $this->db->get();
         
         if ($query1->num_rows() == 1)
            {
               $row = $query1->row(); 

               if(base64_decode($row->password) == $this->input->post('upass'))
                {
                    $x='true';
                    
                    $newdata = array(
                   'username'  => $this->input->post('uname'),
                   'logged_in' => TRUE,
                   'usertype'=> $this->input->post('table'),
               );
                  
                  
                    $this->load->library('session');
                  
                   $this->session->set_userdata($newdata);
                  
                }
                 else  $x='false';
        
            }
            else  $x='false';
         
        
        
        
               $rrr= "{$x}";
            $data = array(
        'text' => $rrr,
);
            
            echo json_encode($data);
    }
    
    
   
    
    public function forget()
	{
        $data=array();
		if (isset($_GET['info'])) {
               $data['info'] = $_GET['info'];
              }
		if (isset($_GET['error'])) {
              $data['error'] = $_GET['error'];
              }
		
		$this->load->view('login-forgot',$data);
	} 
    
    
    public function doforget()
	{
        $this->form_validation->set_rules('email', 'Registered Email id:-', 'required|valid_email|max_length[50]');
        
//        if ($this->form_validation->run() == FALSE ) // validation hasn't been passed
//		{
//                    
//			$this->load->view('login-forgot');
//		}
//		else // passed validation proceed to post success logic
		{
		
		$email= $this->input->post('email');
                $table=$this->input->post('table');
		$query1 = $this->db->query("select * from $table where username='$email' ");
        if ($query1->num_rows() >0 ) {
             $row = $query1->row(); 
            $user=$row;
                       
			$this->resetpassword($user,$table);
                         
			$info= "Password has been reset and has been sent to email id: ". $email;
			
                       redirect("logincontroller/forget?info=$info", 'refresh');
        }
		$error= "The email id you entered not found on our database ";
		redirect("logincontroller/forget?error=$error", 'refresh');
		
        } }
    
    private function resetpassword($user,$table)
	{
		//date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password= random_string('alnum', 16);
		$this->db->where('username', $user->username);
		$this->db->update($table,array('password'=>base64_encode($password)));
                
                if($table =='customer')
                {
                    $name=$user->firstname." ".$user->lastname;
                }
                else if ($table =='vendor')
                    
                {
                    $name=$user->vendorname;
                }
		
                $sms="You have requested the new password, Here is you new password:'. $password";
                $table=strtoupper($table);
                   $sub=$table.' Password Reset Request (Expense Manager Web Application Team)';     
			$form_data = array(
					       	'registered_email_id' => $user->username,
                                                'message' => $sms,
                                                'firstname' => $name,
                                                 'subject'=>$sub
						);
		
			$this->send_email_m->SaveForm($form_data);
	} 
    
      
}