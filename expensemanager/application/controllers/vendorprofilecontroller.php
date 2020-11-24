<?php

class Vendorprofilecontroller extends CI_Controller {

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
      $query = $this->db->query("SELECT * FROM vendor where username='$x'");
         $mydata=$query->result_array();
         
         //taking full name of MainBranch
          $query2 = $this->db->query("SELECT city,country,state,contact FROM branch where username='$x'and type='1'");
         $mydata2=$query2->result_array();
        //taking full list of branches
          $query3 = $this->db->query("SELECT contact,city,country,state FROM branch where username='$x'");
         $mydata3=$query3->result_array();
         
         //Username gettting
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$x'");
        $mega=$quer->result_array();
        
         $this->load->view('vendorprofile',array(
                   
                   'mydata'=>$mydata,
                   'mydata2'=>$mydata2,
                    'mydata3'=>$mydata3,
                    'mega'=>$mega,
               ));
     
        
        
       
    }
    
    function editproflie()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x=$this->session->userdata('username');
        $query=$this->db->query("select * from vendor where username='$x'");
        $mydata=$query->result_array();
        //Username gettting
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$x'");
        $mega=$quer->result_array();
        
       $this->load->view('vendorprofileedit',array(
                   
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
        
        $dob=$this->input->post('dobtxt');
        $pass=base64_encode ($this->input->post('passwordtxt'));
      
        $this->db->query("UPDATE vendor SET vendorname = '$fn',  date = '$dob',  password = '$pass' WHERE username = '$x'");
  
        redirect('vendorprofilecontroller');
    }
    
   
    function updatemainbranch()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
      $old=$this->input->post('oldh');
      $new=$this->input->post('newh');
      
      if($old!=$new)
      {   
        $this->db->query("UPDATE branch SET type = '1' WHERE contact = '$new'");
        $this->db->query("UPDATE branch SET type = '2' WHERE contact = '$old'");
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
    
    
}
