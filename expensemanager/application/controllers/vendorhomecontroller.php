<?php

class Vendorhomecontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
       ///////////////////////////////////////////// 
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        
       $x= $this->session->userdata('username');

      // family.family_name in(SELECT family_name FROM customer WHERE username='$x')
        
        $this->load->database();
        //Getting the Tags
        $query = $this->db->query(" Select * from (Select * from (SELECT tag,offerid,startdate,enddate FROM branch,offer where username='$x' and branchno=contact order by startdate DESC) as wp_posts group by tag) as rt order by startdate DESC ");
        //Getting dates under the tag
        $query2=$this->db->query(" SELECT tag,offerid,startdate,city,country,state FROM branch,offer where username='$x' and branchno=contact ORDER BY startdate DESC");
       $mydata=$query->result_array();
       $mydata2=$query2->result_array();
        
       //Username gettting
        $quer= $this->db->query("SELECT vendorname from vendor where username='$x'");
        $mega=$quer->result_array();
             
        $this->load->view('vendorhomeview',array(
                   
                   'mydata'=>$mydata,
                   'mydata2'=>$mydata2,
                   'mega'=>$mega,

               )
                
                
                
                );
    
        
        ///////////////////////////////
        //$this->load->view('customerhometag');
    }
    
    
    
   function offerdetails()
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
        $query = $this->db->query("SELECT tag,offerid,description,startdate,enddate,state,country,city,branchno FROM branch,offer where username='$t' and branchno=contact and offerid='$x'");

        if ($query->num_rows() == 1)
            {
            
                $row = $query->row();
                $loc=$row->city." ,". $row->state ." ,". $row->country;
                
                $sdate=date("Y-m-d",strtotime($row->startdate));
                 $edate=date("Y-m-d",strtotime($row->enddate));
            $this->load->view('vendorofferdetails',array(
                   'exp_id'=>$row->offerid,
                   'tag'=>$row->tag,
                   'loc'=>$loc,
                    'start_date' =>$sdate,                
                'description' =>$row->description,               
                'end_date' =>$edate,
                'cno'=>$row->branchno,
                'mega'=>$mega,
               )
                
                );
            
        }
        
    }

    function deleteoffer()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x= $this->session->userdata('username');
      
       $this->load->model('insert_offer');
       // $this->load->model('insert_subdata');
        
       // $sub =new insert_subdata();
        $in = new insert_offer();
       $in->load($this->input->get('e_id'));
       
        
         $in->delete();
        redirect('vendorhomecontroller');
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
        $query = $this->db->query("SELECT * FROM offer where offerid='$x'");
       //Username gettting
       // $t=$this->session->userdata('username');
        $quer= $this->db->query("SELECT vendorname FROM vendor where username='$t'");
        $mega=$quer->result_array();
        
        $quer1= $this->db->query("SELECT * FROM branch where username='$t'");
        $mega1=$quer1->result_array();
        
        if ($query->num_rows() == 1)
            {
                $row = $query->row();
              //  $loc=$row->city." ,". $row->state ." ,". $row->country;
                
               
            
        }
      
        
         $sdate=date("Y-m-d",strtotime($row->startdate));
                 $edate=date("Y-m-d",strtotime($row->enddate));
                
            $this->load->view('updateoffer',array(
                   'exp_id'=>$row->offerid,
                   'tag'=>$row->tag,
                   'cno'=>$row->branchno,
                    'start_date' =>$sdate,
                'description' =>$row->description,
                'mega'=>$mega,
                'mega1'=>$mega1,
                'end_date' =>$edate,
                
               )
                
                );
        
        
        
    }

    
    
    function updateoffer()
     {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $this->load->model('insert_offer');
        
         $exid=$this->input->get('e_id');
        $x= $this->session->userdata('username');
      
        //getting date_id for given expenseid
        
       
//         $thedate_id;
//         $row = $query1->row();
         //getting count of no of date_id entires in expenses table
         
           
               if($this->input->post('c_date')==$this->input->post('enddate')) 
               {
                   
            
            
               $branchno=  $this->input->post('branchno');
               $description=  $this->input->post('description');
               $startdate=$this->input->post('c_date');
               $tag=$this->input->post('tag');
               $end_date=  $this->input->post('enddate');
               
                $query = $this->db->query("UPDATE offer SET "
                        . "branchno = '$branchno', "
                        . "description = '$description' ,"
                            . "startdate = '$startdate',"
                                . "tag = '$tag',"
                        . " enddate = '$end_date'"
                        . " WHERE offerid = '$exid' ");
               }
               else
               {
                    $end = strtotime( $this->input->post('enddate')); // or your date as well
                   $start = strtotime($this->input->post('c_date'));
                   $datediff = abs($end - $start);
                    $max= floor($datediff/(60*60*24));
                    for ($y = 0; $y <= $max; $y++)
                    {
                        if($this->input->post('Repeatstatus')=='1' || $this->input->post('Repeatstatus')=='0')
                    {  
                         
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        $converteddate= date("Y-m-d", $date);
                        
                        if($y==0) //Only update if possible
                         {
                   
            
            
               $branchno=  $this->input->post('branchno');
               $description=  $this->input->post('description');
               $startdate=$this->input->post('c_date');
               $tag=$this->input->post('tag');
               $end_date=  $this->input->post('enddate');
               
                $query = $this->db->query("UPDATE offer SET "
                        . "branchno = '$branchno', "
                        . "description = '$description' ,"
                            . "startdate = '$startdate',"
                                . "tag = '$tag',"
                        . " enddate = '$end_date'"
                        . " WHERE offerid = '$exid' ");
               }
               
               
               
                        else    //Only insert coz of repeat status
                        {
                           ////////////im here
                         
                         $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;;
                        $inputed->enddate=  $converteddate;;
                        $inputed->branchno=  $this->input->post('branchno');
                         $inputed->insert();
                        
                         
                            
                            
                            
                            
                        }
                    }
                    
                     else if($this->input->post('Repeatstatus')=='2')
                    {  
                         
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        $converteddate= date("Y-m-d", $date);
                        
                        if($y==0) //Only update if possible
                         {
                   
            
            
               $branchno=  $this->input->post('branchno');
               $description=  $this->input->post('description');
               $startdate=$this->input->post('c_date');
               $tag=$this->input->post('tag');
               $end_date=  $this->input->post('enddate');
               
                $query = $this->db->query("UPDATE offer SET "
                        . "branchno = '$branchno', "
                        . "description = '$description' ,"
                            . "startdate = '$startdate',"
                                . "tag = '$tag',"
                        . " enddate = '$end_date'"
                        . " WHERE offerid = '$exid' ");
               }
               
               
               
                        else  
                        {//Only insert coz of repeat status
                            $day = date('l', $date);
                            if($day =='Saturday' || $day =='Sunday' )
                         
                            {
                                
                           $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;;
                        $inputed->enddate=  $converteddate;;
                        $inputed->branchno=  $this->input->post('branchno');
                         $inputed->insert();
                         
                         
                            
                            
                            
                            
                        }
                    }
                   
                    }
                    
                    else if($this->input->post('Repeatstatus')=='3')
                    {  
                         
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        $converteddate= date("Y-m-d", $date);
                        $day = date('l', $date);
                        if($y==0) //Only update if possible
                         {
                   
            
                 $branchno=  $this->input->post('branchno');
               $description=  $this->input->post('description');
               $startdate=$this->input->post('c_date');
               $tag=$this->input->post('tag');
               $end_date=  $this->input->post('enddate');
               
                $query = $this->db->query("UPDATE offer SET "
                        . "branchno = '$branchno', "
                        . "description = '$description' ,"
                            . "startdate = '$startdate',"
                                . "tag = '$tag',"
                        . " enddate = '$end_date'"
                        . " WHERE offerid = '$exid' ");
               }
               
               
               
                        else  
                        {//Only insert coz of repeat status
                        
                            if($day !='Saturday' && $day !='Sunday' )
                         
                            {
                          $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;;
                        $inputed->enddate=  $converteddate;;
                        $inputed->branchno=  $this->input->post('branchno');
                         $inputed->insert();
                         
                         
                            
                            
                            
                            
                        }
                    }
                   
                    }
                    
                        }
                    
               }
               
              redirect('vendorhomecontroller');
    }
    
    
    
    function logmeout()
    {
        $this->session->unset_userdata('username');
         $this->session->unset_userdata('logged_in');
         $this->session->unset_userdata('usertype');
       // $this->session->sess_destroy();
        redirect('logincontroller');
    }
    
    function addoffer()
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
        $quer1= $this->db->query("SELECT * FROM branch where username='$x'");
        $mega1=$quer1->result_array();
      $this->load->view('addoffer',array('mega'=>$mega,'mega1'=>$mega1));
    }
    
    
    
    function insertoffer()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        
        $this->load->model('insert_offer');
      
         //$x= 'ja@yahoo.com';
        $x= $this->session->userdata('username');
       // SELECT d_id FROM datesubtable WHERE tag='Vegetables' && c_username ='adasd@ada.com' && start_date='2015-04-20'
        
               
            
        
               if($this->input->post('c_date')==$this->input->post('enddate')) 
               {
                   
                   
               $inputed = new insert_offer();
               
               $inputed->tag= $this->input->post('tag');
               $inputed->description=  $this->input->post('description');
               $inputed->startdate=  $this->input->post('c_date');
               $inputed->enddate=  $this->input->post('enddate');
               $inputed->branchno=  $this->input->post('branchno');
       $inputed->insert();

        
         
               }
               
               else
               {   
                   
                   
                   
                   
                   $end = strtotime( $this->input->post('enddate')); // or your date as well
                   $start = strtotime($this->input->post('c_date'));
                   $datediff = abs($end - $start);
                    $max= floor($datediff/(60*60*24));
                    for ($y = 0; $y <= $max; $y++)
                    {
                        if($this->input->post('Repeatstatus')=='1' || $this->input->post('Repeatstatus')=='0')
                    {  
                         
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        $converteddate= date("Y-m-d", $date);
                        
                        
                        
                         $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;
                         $inputed->enddate= $converteddate;
                        $inputed->branchno=  $this->input->post('branchno');
                        
                         $inputed->insert();
                       
                                                 
                       
                    }
                    else if($this->input->post('Repeatstatus')=='2')
                    {   
                        
                        
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        
                        
                     if($y==0)
                         { $day='Saturday';} 
                         else { $day = date('l', $date);}
                        
                        if($day =='Saturday' || $day =='Sunday' )
                            
                        {
                            
                        $converteddate= date("Y-m-d", $date);
                        
                         
                        $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;
                         $inputed->enddate= $converteddate;
                        $inputed->branchno=  $this->input->post('branchno');
                        
                         $inputed->insert();
                       
                        
                        
                        }
                            
                                                 
                       
                    }
                    else if($this->input->post('Repeatstatus')=='3')
                    { 
                         
                         
                            
                            
                            
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        if($y==0)
                         { $day='Satursdday';} 
                         else { $day = date('l', $date);}
                        
                        if($day !='Saturday' && $day !='Sunday' )
                        {
                        $converteddate= date("Y-m-d", $date);
                        
                        
                        
                        $inputed = new insert_offer();
               
                        $inputed->tag= $this->input->post('tag');
                        $inputed->description=  $this->input->post('description');
                        $inputed->startdate=  $converteddate;
                         $inputed->enddate= $converteddate;
                        $inputed->branchno=  $this->input->post('branchno');
                        
                         $inputed->insert();
                        }
                           
                                                 
                       
                    }
                    }
                    
                    
                 
                    
               }
                redirect('vendorhomecontroller');
    }
}
