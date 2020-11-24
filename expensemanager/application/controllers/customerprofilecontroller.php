<?php

class Customerprofilecontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        
    if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
          
      $x= $this->session->userdata('username');
      //taking profile Details
      $query = $this->db->query("SELECT * FROM customer where username='$x'");
         $mydata=$query->result_array();
         //taking count of family members
       $query1 = $this->db->query("SELECT count(username) as fcount FROM customer where family_name in(select family_name from customer where username='$x')");
         $mydata1=$query1->result_array();
         //taking full name of family head
          $query2 = $this->db->query("SELECT firstname,lastname,username FROM customer where family_name in(select family_name from customer where username='$x') and customertype='1'");
         $mydata2=$query2->result_array();
         //selecting list of family memeber names
         $query3 = $this->db->query("SELECT username,firstname,lastname FROM customer where family_name in(select family_name from customer where username='$x')");
         $mydata3=$query3->result_array();
         
         //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
         $this->load->view('customerprofile',array(
                   
                   'mydata'=>$mydata,
                   'mydata1'=>$mydata1,
                   'mydata2'=>$mydata2,
                    'mydata3'=>$mydata3,
                    'mega'=>$mega,
               ));
     
        
       
    }
    
    
    
   
    function updatehead()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
      $old=$this->input->post('oldh');
      $new=$this->input->post('newh');
      
      if($old!=$new)
      {   
        $this->db->query("UPDATE customer SET customertype = '1' WHERE username = '$new'");
        $this->db->query("UPDATE customer SET customertype = '2' WHERE username = '$old'");
        $stat=true;
      }
      else
      {
         $stat=false; 
      }
        
        
        $data = array(
        'stat' => $stat,
);
            
            echo json_encode($data);
    }
    
    
    function editproflie()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x=$this->session->userdata('username');
        $query=$this->db->query("select * from customer where username='$x'");
        $mydata=$query->result_array();
        //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
        
       $this->load->view('customerprofileedit',array(
                   
                   'mydata'=>$mydata,
                   'mega'=>$mega,
           )); 
    }
    
    
    function submiteditprofile()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        
        $x=$this->session->userdata('username');
        $fn=$this->input->post('firstnametxt');
        $ln=$this->input->post('lastnametxt');
        $dob=$this->input->post('dobtxt');
        $pass=base64_encode ($this->input->post('passwordtxt'));
        $con=$this->input->post('country');
        $st=$this->input->post('state');
        $loc=$this->input->post('location');
        $this->db->query("UPDATE customer SET firstname = '$fn', lastname = '$ln', dob = '$dob', location = '$loc', password = '$pass', country = '$con', state = '$st' WHERE username = '$x'");
  
        redirect('customerprofilecontroller');
        
    }

}
