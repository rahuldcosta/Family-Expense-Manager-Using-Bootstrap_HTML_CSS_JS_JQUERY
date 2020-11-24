<?php

class Statanalysercontroller extends CI_Controller {

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
         //Selecting Total Spendings
    $query = $this->db->query("SELECT sum(price)as price ,family_name FROM expenses,datesubtable,customer where date_id=d_id and username=c_username and family_name in (select family_name from customer where username='$x') and start_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND ADDDATE(LAST_DAY(NOW()), 1)");
       $mydata=$query->result_array();
       
       //Selecting MAX budget
       $query1 = $this->db->query("SELECT maxbudget FROM family,budget where bugid=bgid  and bdate between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND ADDDATE(LAST_DAY(NOW()), 1) and family_name in (select family_name from customer where username='$x')");
       $mydata1=$query1->result_array();
       
       //Selecting family persons spent amount
      $query2 = $this->db->query("SELECT firstname,sum(price) as cost  FROM expenses,datesubtable,customer where date_id=d_id and username=c_username and family_name in(select family_name from customer where username='$x') and start_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND ADDDATE(LAST_DAY(NOW()), 1) group by username order by cost DESC");
       $mydata2=$query2->result_array();
       $count=sizeof($mydata2);
       
       //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
       
    $this->load->view('statanalyser',array(
                   
                   'mydata'=>$mydata,
                   'mydata1'=>$mydata1,
                    'mydata2'=>$mydata2,
                    'mega'=>$mega,
                     'count'=> $count,
               )
                
                
                
                );
        
        
       
    }
    
    
    
   

    

}
