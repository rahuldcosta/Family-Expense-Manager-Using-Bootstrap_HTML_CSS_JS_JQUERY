<?php

class Managebudgetcontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        
    
       $x= $this->session->userdata('username');
       
       
       if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
//       $date = strtotime('now');
//       $converteddate= date("Y-m-d", $date);
    $query1=  $this->db->query("SELECT family_name,bgid,maxbudget,date_format(bdate, '%Y-%m-%d') as dated FROM family,budget where bgid=bugid
and family_name in (select family_name from customer where username='$x')
and bdate  between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND ADDDATE(LAST_DAY(NOW()), 1)");
    
    //
        $mydata=$query1->result_array();
        
        
        
        //Selecting customer type
         $query2=  $this->db->query("SELECT customertype FROM `customer` where username='$x' and family_name in (select family_name from customer where username='$x')");

         $mydata1=$query2->result_array();
         
         //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
        
$this->load->view('managebudget',array(
    
        'mydata'=>$mydata,
        'mydata1'=>$mydata1,
        'mega'=>$mega,
        
    
    
    
));
        
       
    }
    
    
    function dataentry()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
      if($this->input->post('oper')=='update')
      {
          
$bugid = $this->input->post('bugetid');

$maxbudget = $this->input->post('maxb');
 

          $query = $this->db->query("UPDATE budget SET  maxbudget= '$maxbudget' WHERE bugid = '$bugid'");
      }
      else if($this->input->post('oper')=='insert')
      {
          $data = array(

'maxbudget' => $this->input->post('maxb'),
 

);
            $this->load->model('insert_budget');
              $this->insert_budget->form_insert($data);
              $bdid=$this->db->insert_id();
              
              $x= $this->session->userdata('username');
              
              $query2=$this->db->query("Select family_name from customer where username='$x'");
              
             
              $fname;
              
              if ($query2->num_rows() > 0)
{
   $row = $query2->row(); 
   $fname=$row->family_name;
  
}
              
              
              
              
                                $fdata = array(
                     'family_name' => $fname,
                     'bgid' => $bdid,
                     );   
              
              $this->load->model('insert_family');
              $this->insert_family->form_insert($fdata);
              
      }
        

        
         redirect('statanalysercontroller');
       
    }
    
    
    
   

    

}
