<?php

class Customerhomecontroller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
       
       
        
    }
     public function closeConnection(){
        $this->load->library('session');
         $this->session->set_userdata('username', "");
        if($this->session->userdata('username')!==""){
            //destroy session
            $this->session->set_userdata('logged_in', FALSE);
           // $this->session->unset_userdata('username');
         }
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
        $query = $this->db->query("select start_date,sum(price) from datesubtable,expenses,customer
 where date_id=d_id && c_username=username &&
 family_name in (select family_name from customer where customer.family_name in(SELECT distinct family_name FROM family) && username='$x' )
 
 
  GROUP BY start_date
  ORDER BY start_date DESC");
         $mydata=$query->result_array();
        //For layout inside main Layout
        $query2=$this->db->query("
  select start_date,exp_id,tag,price from datesubtable,expenses,customer where date_id=d_id && username=c_username  && family_name in (select family_name from customer where customer.family_name in(SELECT distinct family_name FROM family) && username='$x' )
  ORDER BY tag ASC");      
       $mydata2=$query2->result_array();
       
        //for Notifications 
       $date = strtotime('now');
        $converteddate= date("Y-m-d", $date);
                        
                      
       $query3=$this->db->query(" SELECT tag FROM customer,datesubtable,expenses where date_id=d_id
and username=c_username

and username='$x'

and start_date='$converteddate' and rstatus=1");
       
      //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
        
      $wer= $query3->num_rows();
             
        $this->load->view('customerhomeview',array(
                   
                   'mydata'=>$mydata,
                   'mydata2'=>$mydata2,
                   'noti'=>$wer,
                   'mega'=>$mega,

               )
                
                
                
                );
     //   $this->load->view('bottomview');
        
        
        
    }
    
    
    function rendertag()
    {
      ///////////////////////////////////////////// 
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
       $x= $this->session->userdata('username');

      // family.family_name in(SELECT family_name FROM customer WHERE username='$x')
        
        $this->load->database();
        $query = $this->db->query("select tag,sum(price) from datesubtable,expenses,customer
 where date_id=d_id && c_username=username && family_name in (select family_name from customer where customer.family_name in(SELECT distinct family_name FROM family) && username='$x' )
 GROUP BY tag ORDER BY tag;");
        
        $query2=$this->db->query(" select tag,exp_id,start_date,price from datesubtable,expenses,customer where date_id=d_id  && c_username=username && family_name in (select family_name from customer where customer.family_name in(SELECT distinct family_name FROM family) && username='$x' )  ORDER BY start_date DESC");
       $mydata=$query->result_array();
       $mydata2=$query2->result_array();
        
       //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
             
        $this->load->view('customerhometag',array(
                   
                   'mydata'=>$mydata,
                   'mydata2'=>$mydata2,
                   'mega'=>$mega,

               )
                
                
                
                );
    
        
        ///////////////////////////////
        //$this->load->view('customerhometag');
    }
    
    
    
    function expensedetails()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
      //  echo $this->input->get('exp_id');
        $x=$this->input->get('exp_id');
     //  $this->load->view('expensedetailsview');
        //Username gettting
        $t=$this->session->userdata('username');
        $quer= $this->db->query("SELECT firstname FROM customer where username='$t'");
        $mega=$quer->result_array();
        
        $this->load->database();
        $query = $this->db->query("select exp_id,tag,start_date,price,description,end_date from datesubtable,expenses
 where date_id=d_id && exp_id='$x'");

        if ($query->num_rows() == 1)
            {
                $row = $query->row(); 
            $this->load->view('expdetailsview',array(
                   'exp_id'=>$row->exp_id,
                   'tag'=>$row->tag,
                   'price'=>$row->price,
                    'start_date' =>$row->start_date,                
                'description' =>$row->description,               
                'end_date' =>$row->end_date,
                'mega'=>$mega,
               )
                
                );
            
        }
        
    }
    /*
     * show list as a table, get data from "test_model"
     * */
    function rendernotify()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
          // $this->load->view('signIn');
            //$this->load->model('signUpDonorModel');
         $x= $this->session->userdata('username');
            $date=$_POST['date'];
           // $loadId=$_POST['loadId'];
           // $this->load->model('signupdonormodel');
          //  $result=$this->signupdonormodel->getData($loadType,$loadId);
            
            $this->load->database();
            $result=$this->db->query(" SELECT exp_id,tag FROM customer,datesubtable,expenses where date_id=d_id
and username=c_username

and username='$x'

and start_date='$date' and rstatus=1");
            $HTML="";
//$HTML.="<table><tr>.<td > <span > <span class='"."glyphicon glyphicon-hand-right'"."></span></span></td>".
//"<td ><span>".$list->tag."</span></td></tr></table>";
            if($result->num_rows() > 0){
                foreach($result->result() as $list){
                   // $HTML.="<div value='".$list->tag."'>".$list->tag."</div>";
                  //  {ite_url("customerhomecontroller/expensedetails?exp_id=$list->tag")}
                  // $siter=$this->config->site_url("customerhomecontroller/expensedetails?exp_id=$list->exp_id");
                    
                    $HTML.="<tr style='cursor:pointer' id='$list->exp_id' onclick='takeme(this)'>.<td class='text-right'> <span > <span class='"."glyphicon glyphicon-hand-right'"." ></span></span></td>".
"<td class='text-left' style='text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:90%'><span  class='text-center'>&#160;".$list->tag."</span></td></tr>";
                    
                }
            }
         echo $HTML;
         
         
         
        }

    function logmeout()
    {
        $this->session->unset_userdata('username');
         $this->session->unset_userdata('logged_in');
         $this->session->unset_userdata('usertype');
         
       // $this->session->sess_destroy();
        redirect('logincontroller');
    }
    
    function headchecker()
    {
         $x= $this->session->userdata('username');
        $query=$this->db->query("SELECT * FROM customer where customertype=1 and username='$x'");
        
           if ($query->num_rows() > 0)
            {
              $valu=true;
            }
            else
            {
                $valu=false;
            }
            $data = array(
        'stat' => $valu,
);
            
            echo json_encode($data);
            
            
    }

}
