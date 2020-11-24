<?php

class Managebranchcontroller extends CI_Controller {

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
//      echo "<h1> The Username is $x </h1> "; 
       // echo"HEloo ";
       
       // $this->load->view('customerhomeview');
        
        $this->load->database();
        //For main layout
        $query = $this->db->query("SELECT type,state,city,country,contact FROM branch where username='$x' order by type asc");
         $mydata=$query->result_array();
        
       
      
       
      //Username gettting
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$x'");
        $mega=$quer->result_array();
        
      
             
        $this->load->view('managebranchview',array(
                   
                   'mydata'=>$mydata,
                   
                   'mega'=>$mega,

               )
                
                
                
                );
        
       
    }
    
    
    
   function branchdetails()
   {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
     
        $x=$this->input->get('offerid');
   
        //Username gettting
        $t=$this->session->userdata('username');
        //$t= 'ja@yahoo.com';
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$t'");
        $mega=$quer->result_array();
        
        $this->load->database();
        $query = $this->db->query("SELECT * from branch where contact='$x'");

        if ($query->num_rows() == 1)
            {
            
                $row = $query->row();
                $loc=$row->city." ,". $row->state ." ,". $row->country;
                
                
            $this->load->view('branchdetails',array(
                   'exp_id'=>$row->contact,
                   'type'=>$row->type,
                   'loc'=>$loc,
                   
                'mega'=>$mega,
               )
                
                );
            
        }
   }

    function deletebranch()
    {
         if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x= $this->session->userdata('username');
      
       $this->load->model('insert_branch');
       // $this->load->model('insert_subdata');
        
       // $sub =new insert_subdata();
        $in = new insert_branch();
       $in->load($this->input->get('e_id'));
       if($in->type != 1)
       {
       $in->delete();}
      //   $query = $this->db->query("SELECT * from branch where contact='$x'");
        
        redirect('managebranchcontroller');
    }
    
    function updatebranch()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $this->load->model('insert_offer');
        
         $exid=$this->input->post('oldno');
       
        
        $state=$this->input->post('state');
        $country=$this->input->post('country');
        $city=$this->input->post('city');
        $newno=$this->input->post('newno');
        
        $query = $this->db->query("UPDATE branch SET state = '$state', country = '$country' ,city = '$city' ,contact = '$newno' WHERE contact = '$exid' ");
        
        redirect('managebranchcontroller');
    }
    
    
    function addbranch()
    {
      
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
      $x= $this->session->userdata('username');
      //$x= 'ja@yahoo.com';
      
//      ec
      //Username gettting
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$x'");
        $mega=$quer->result_array();
        
      $this->load->view('addbranch',array('mega'=>$mega));
    
     
    }
    
    function addbranchs()
    {
        $x= $this->session->userdata('username');
        $this->load->model('insert_branch');
        $in = new insert_branch();
       $in->contact=$this->input->post('contactno');
       $in->contact=$this->input->post('contactno');
       $in->state=$this->input->post('state');
       $in->type=2;
               $in->city=$this->input->post('city');
       $in->country=$this->input->post('country');
       $in->username=$x;
       
       
        
         $in->insert();
        redirect('managebranchcontroller'); 
        
    }
    
    function displayupdateview()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $t= $this->session->userdata('username');
        $x=$this->input->get('e_id');
        $this->load->database();
        $query = $this->db->query("SELECT * FROM branch where contact='$x'");
       //Username gettting
       // $t=$this->session->userdata('username');
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$t'");
        $mega=$quer->result_array();
        
       
        
        if ($query->num_rows() == 1)
            {
                $row = $query->row();
              //  $loc=$row->city." ,". $row->state ." ,". $row->country;
                $loc=$row->city." ,". $row->state ." ,". $row->country;
               
            
        }
      
        
        
                
            $this->load->view('updatebranch',array(
                   'exp_id'=>$row->contact,
                   'type'=>$row->type,
                   'loc'=>$loc,
                   'city'=>$row->city,
                    'country'=>$row->country,
                    'state'=>$row->state ,
                'mega'=>$mega,
                
               )
                
                );
        
        
    }

    
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
}
