<?php

class Checkoffercontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x=$this->session->userdata('username');
        //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
        
//        //Getting list of branches having offers 
        
        
        $quer1= $this->db->query("SELECT state,city,country FROM branch ,offer where contact=branchno and startdate = DATE_FORMAT(NOW() ,'%Y-%m-%d') group by country,state,city");
        $mydata=$quer1->result_array();
       
        $this->load->view('checkoffers',array('mega'=>$mega,'mydata'=>$mydata));
        
       
    }
    
    
    function gettabledata()
    {
         if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $HTML="";
        $result;
         $x= $this->session->userdata('username');
           
           
            
            $this->load->database();
            
            
            if($this->input->post('search')=="all")
            {
               $ci=$this->input->post('city');
                $st=$this->input->post('state');
                $co=$this->input->post('country');
               
            
            $result=$this->db->query("SELECT offerid,vendorname,tag,description FROM branch b,offer,vendor v where contact=branchno and b.username=v.username and city='$ci' and state='$st' and country='$co' and startdate = DATE_FORMAT(NOW() ,'%Y-%m-%d')"); 
            
            }
            else if($this->input->post('search')=="tag")
            {
               $ci=$this->input->post('city');
                $st=$this->input->post('state');
                $co=$this->input->post('country');
              $tag=$this->input->post('text');
               // $tag="shoes";
            
            $result=$this->db->query("SELECT offerid,vendorname,tag,description FROM branch b,offer,vendor v where contact=branchno and b.username=v.username and city='$ci' and state='$st' and country='$co' and startdate = DATE_FORMAT(NOW() ,'%Y-%m-%d') and tag like '%$tag%'"); 
            
            }
            else if($this->input->post('search')=="vendor")
            {
               $ci=$this->input->post('city');
                $st=$this->input->post('state');
                $co=$this->input->post('country');
               $vendor=$this->input->post('text');
            
            $result=$this->db->query("SELECT offerid,vendorname,tag,description FROM branch b,offer,vendor v where contact=branchno and b.username=v.username and city='$ci' and state='$st' and country='$co' and startdate = DATE_FORMAT(NOW() ,'%Y-%m-%d') and vendorname like '%$vendor%' "); 
            
            }
            
            
            
             
            
            if($result->num_rows() > 0){
                 $HTML.= "<tr>
                        <th>Vendor</th>
                        <th>Tag</th>
                        <th>Offer</th>
                    </tr>";
                foreach($result->result() as $list){
                   // $HTML.="<div value='".$list->tag."'>".$list->tag."</div>";
                    
              
                   
                    
                    
                $HTML.="<tr  id='$list->offerid'onclick='takeme(this.id)'><td style='text-align:left;cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;'>".$list->vendorname."</td><td style='text-align:left;cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;'>".$list->tag."</td><td style='text-align:left;cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;'>".$list->description."</td></tr>";
//                    $HTML.="<tr>.<td > <span > <span class='"."glyphicon glyphicon-hand-right'"."></span></span></td>".
//"<td ><span class='text-center'>&#160;".$list->tag."</span></td></tr>";
                    
                }
            }
            
            else
            {
               $HTML=""; 
            }
            
         echo $HTML;
        
        //Finding all Offers
        
        
        
        //Finding by Vendor Name
        
//        SELECT offerid,vendorname,tag,description FROM branch b,offer,vendor v where contact=branchno
//and b.username=v.username
//and city='Ponda' and state='Goa' and country='India'
//and v.vendorname like 'Jstores'
        
        
        
        //Finding by tag Name
        
        
        
        
        
        
        
        
    }
    
    
    
   function viewofferdetails()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
     
        $x=$this->input->get('offerid');
   
        //Username gettting
        $t=$this->session->userdata('username');
        //$t= 'ja@yahoo.com';
        $quer= $this->db->query("SELECT firstname FROM customer where username='$t'");
        $mega=$quer->result_array();
        
        $this->load->database();
        $query = $this->db->query("SELECT vendorname,tag,offerid,description,startdate,enddate,state,country,city,branchno FROM branch b,offer,vendor v where  branchno=contact and v.username=b.username and offerid='$x'");

        if ($query->num_rows() == 1)
            {
            
                $row = $query->row();
                $loc=$row->city." ,". $row->state ." ,". $row->country;
                
                $sdate=date("Y-m-d",strtotime($row->startdate));
                 $edate=date("Y-m-d",strtotime($row->enddate));
            $this->load->view('customerofferview',array(
                   'vname'=>$row->vendorname,
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

    

}
