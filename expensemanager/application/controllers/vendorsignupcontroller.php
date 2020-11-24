<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vendorsignupcontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('send_email_m');
        $this->load->model('insert_vendor');
        $this->load->model('insert_branch');
    }
    
    
    function index(){
       
        $this->load->view('vendorsignup');
    }
    
    
    function tindex(){
       // echo 'hello2222222222222222222222222222222222222222';
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        echo '<h3 style="color:white">Email has Been Send to your email-id Please Verify before Login</h3>';
        $this->form_validation->set_rules('emailtxt', 'Email', 'required|valid_email');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('vendorsignup');         

            }
            
            else
            {
//                $data = array(
//                'vendorname' => $this->input->post('vendorname'),
//                'username' => $this->input->post('emailtxt'),
//                'date' => $this->input->post('dobtxt'),
//                'password' => base64_encode($this->input->post('passwordtxt')),
//                );
//                
//                $typebranch=1;
//                $databranch = array(
//                'contact' => $this->input->post('contacttxt'), 
//                'city' => $this->input->post('citytxt'),
//                'country' => $this->input->post('countrytxt'),
//                'state' => $this->input->post('statetxt'),
//                'username' => $this->input->post('emailtxt'),
//                'type' =>  $typebranch,
//                );
//                
//                
//                $this->insert_vendor->form_insert($data);
//                 $this->insert_branch->form_insert($databranch);
//                redirect('logincontroller'); 
                
                
                    $name=$this->input->post('vendorname');
            $querystring= base64_encode($this->input->post('vendorname').'&&'.$this->input->post('emailtxt').'&&'.$this->input->post('dobtxt').'&&'.$this->input->post('passwordtxt').'&&'.$this->input->post('contacttxt').'&&'.$this->input->post('citytxt').'&&'.$this->input->post('countrytxt').'&&'.$this->input->post('statetxt'));   
		
                $sms='Please verify your account by clicking this link:'.site_url().'/vendorsignupcontroller/emailverifer?stringq='.$querystring;
                     // echo $sms;  
                $sub='Vendor Account Verification (Expense Manager Web Application Team)';
                
			$form_data = array(
					       	'registered_email_id' => $this->input->post('emailtxt'),
                                                'message' => $sms,
                                                'firstname' => $name,
                                                'subject'=>$sub
						);
		
			$this->send_email_m->SaveForm($form_data);
                        $this->load->view('loginview');
//                
            }
        
        
        
        
        
        
        
       
    }
    
    function emailverifer() {
        $str=$this->input->get('stringq');
        $querystring=base64_decode($str);
        $itemarray=explode("&&",$querystring);
       // echo $querystring;
        $query = $this->db->query("select username from vendor where username='$itemarray[1]'");
         //echo $f+'=>11111111111111111111111111111111111';
         
          if ($query->num_rows() == 1)
            {
               echo '<h2 style="color:white">Already Verified Email ,Continue with Login</h2>';
          }
          else{
              
          
        $data = array(
                'vendorname' => $itemarray[0],
                'username' => $itemarray[1],
                'date' => $itemarray[2],
                'password' => base64_encode($itemarray[3]),
                );
                
                $typebranch=1;
                $databranch = array(
                'contact' => $itemarray[4], 
                'city' => $itemarray[5],
                'country' => $itemarray[6],
                'state' => $itemarray[7],
                'username' => $itemarray[1],
                'type' =>  $typebranch,
                );
                
                
                $this->insert_vendor->form_insert($data);
                 $this->insert_branch->form_insert($databranch);
                  echo '<h2 style="color:white">Your Email has Been Verified ,Continue with Login</h2>';
                }  
                  
               $this->load->view('loginview');   
    }
    
     function uniqueemail()
    {
        $this->db->select('password');
        $this->db->from('vendor');
        $this->db->where('username',$this->input->post('uname'));
        $f=$this->input->post('f_name');
         $query1 = $this->db->get();
         $this->load->database();
        $query2 = $this->db->query("select contact from branch where contact='$f'");
         //echo $f+'=>11111111111111111111111111111111111';
         
          if ($query1->num_rows() == 1)
            {
               $rrr= "true";
          }else
          {
              $rrr= "false";
          }
          if ($query2->num_rows() ==1)
            {
               $ff= "true";
          }else
          {
              $ff= "false";
          }
          
         
            $data = array(
        'text' => $rrr,
                'ftext'  => $ff,
                );
            
            echo json_encode($data);
    }
    
    

    /*
    
    function contactnochecker()
    {
        $x= $this->session->userdata('username');
        $this->db->select('contact');
        $this->db->from('branch');
        $this->db->where('contact',$this->input->post('cno'));
        
         $query1 = $this->db->get();
         
         if ($query1->num_rows() == 1)
            {
               $rrr=false;
        
            }
            else  $rrr=true;
         
        
        
        
              
            $data = array(
        'text' => $rrr,
);
            
            echo json_encode($data);
    }
    */
    
    
    
    
}  
