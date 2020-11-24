<?php

class Customersignupcontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    $this->load->model('send_email_m');
        $this->load->model('insert_customer');
    }
    
    function index(){
        
       
        $this->load->database();
        $query1 = $this->db->query('SELECT distinct(family_name) from family
order by family_name asc');
        
       $fdata=$query1->result_array();
     
        
             
        $this->load->view('customersignup',array(
                   
                   'fdata'=>$fdata,
               )
                );    
        
        
        
       //$this->load->view('customersignup');
        
       
    }
    function emailverifer()
    {
        $str=$this->input->get('stringq');
        $querystring=base64_decode($str);
        $itemarray=explode("&&",$querystring);
        
         $query = $this->db->query("select username from customer where username='$itemarray[2]'");
         //echo $f+'=>11111111111111111111111111111111111';
         
          if ($query->num_rows() == 1)
            {
               echo '<h2 style="color:white">Already Verified Email ,Continue with Login</h2>';
          }
          else{
               if($itemarray[8] ==1)
        {
            
                $budget=array(
            
            'maxbudget'=>0,
        );
            
                   $this->db->insert('budget',$budget); 
                   $thedate_id=$this->db->insert_id();
                   
                   $familydata= array(                
                'family_name' => $itemarray[9],
                       'bgid'=>$thedate_id,
                    );
             $this->db->insert('family', $familydata);
             
             
          }
         
          // $fname=$itemarray[9];   
             
            $data = array(
'firstname' => $itemarray[0],
'lastname' => $itemarray[1],
'username' => $itemarray[2],
 'dob' => $itemarray[3],
'password' => base64_encode ($itemarray[4]),
'country' => $itemarray[5],   
'state' => $itemarray[6],
'location' => $itemarray[7],
 'customertype' => $itemarray[8],
'family_name' => $itemarray[9], 

);
        
        $this->insert_customer->form_insert($data);
//       
         echo '<h2 style="color:white">Your Email has Been Verified ,Continue with Login</h2>';
          }
        
       
         $this->load->view('loginview');   
     
      //  echo 'thisis '.$itemarray[9];
    }
    
    function submitcustomerdata()
    {
         $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        echo '<h3 style="color:white">Email has Been Send to your email-id Please Verify before Login</h3>';
       // echo this->input['familynamenew'];
    //    firstnametxt=das&lastnametxt=asda&emailtxt=sd&dobtxt=2015-03-31&passwordtxt=adasd&passwordtxt=asdasd&
    //    country=India&state=Goa&location=Corgao&CustomerType=1&familynamenew=dadadad&familynameeold=
        // Validating Email Field
            $this->form_validation->set_rules('emailtxt', 'Email', 'required|valid_email');
            if ($this->form_validation->run() == FALSE)
{
          $query1 = $this->db->query('SELECT distinct(family_name) from family
order by family_name asc');
        
       $fdata=$query1->result_array();
     
        
             
        $this->load->view('customersignup',array(
                   
                   'fdata'=>$fdata,
               )
                );         

}
else
{
        if($this->input->post('CustomerType') ==1)
        {
            $fname=$this->input->post('familynamenew');
            
            
        
//        $budget=array(
//            
//            'maxbudget'=>0,
//        );
//            
//                   $this->db->insert('budget',$budget); 
//                   $thedate_id=$this->db->insert_id();
//                   
//                   $familydata= array(                
//                'family_name' => $fname,
//                       'bgid'=>$thedate_id,
//                    );
//             $this->db->insert('family', $familydata);
           
        }
        else if ($this->input->post('CustomerType') ==2)
        {
           $fname=$this->input->post('familynameeold'); 
        }
        
        
        
//        $data = array(
//'firstname' => $this->input->post('firstnametxt'),
//'lastname' => $this->input->post('lastnametxt'),
//'username' => $this->input->post('emailtxt'),
// 'dob' => $this->input->post('dobtxt'),
//'password' => base64_encode ($this->input->post('passwordtxt')),
//'country' => $this->input->post('country'),   
//'state' => $this->input->post('state'),
//'location' => $this->input->post('location'),
// 'customertype' => $this->input->post('CustomerType'),
//'family_name' => $fname, 
//
//);
//        
//        $this->insert_customer->form_insert($data);
//        
//         $this->load->view('loginview');
        
        
       
                
              
                    $name=$this->input->post('firstnametxt')." ".$this->input->post('lastnametxt');
            $querystring= base64_encode($this->input->post('firstnametxt').'&&'.$this->input->post('lastnametxt').'&&'.$this->input->post('emailtxt').'&&'.$this->input->post('dobtxt').'&&'.$this->input->post('passwordtxt').'&&'.$this->input->post('country').'&&'.$this->input->post('state').'&&'.$this->input->post('location').'&&'.$this->input->post('CustomerType').'&&'.$fname);   
		
                $sms='Please verify your account by clicking this link:'.site_url().'/customersignupcontroller/emailverifer?stringq='.$querystring;
                     // echo $sms;  
                $sub='Customer Account Verification (Expense Manager Web Application Team)';
                
			$form_data = array(
					       	'registered_email_id' => $this->input->post('emailtxt'),
                                                'message' => $sms,
                                                'firstname' => $name,
                                                'subject'=>$sub
						);
		
			$this->send_email_m->SaveForm($form_data);
        
                 $this->load->view('loginview');
}
    }
    
    
    function uniqueemail()
    {
        $this->db->select('password');
        $this->db->from('customer');
        $this->db->where('username',$this->input->post('uname'));
        $f=$this->input->post('f_name');
         $query1 = $this->db->get();
         $this->load->database();
        $query2 = $this->db->query("select distinct family_name from family where family_name='$f'");
         
         
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
    
}
