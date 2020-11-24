<?php

class Helpcontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        
       if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
       
        $this->load->view('Help');
        
       
    }
    
    function customer()
    {
         $x= $this->session->userdata('username');
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
       
       $this->load->view('Help',array('mega'=>$mega));
    }

    function vendor()
    {
         $x= $this->session->userdata('username');
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$x'");
        $mega=$quer->result_array();
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
       
        $this->load->view('vHelp',array('mega'=>$mega));
    }

    
    
    
   

    

}
