<?php

class Webhomecontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        
        if($this->session->userdata('username')!="")
      {
            if($this->session->userdata('usertype')=="customer")
          redirect('customerhomecontroller');
            else if($this->session->userdata('usertype')=="vendor")
             redirect('vendorhomecontroller');   
                
      }
      else 
        $this->load->view('webhome');
        
       
    }
    
    
    function aboutus()
    {
         $this->load->view('aboutus');
    }
   

    

}
