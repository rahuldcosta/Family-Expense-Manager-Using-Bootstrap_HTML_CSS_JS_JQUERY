<?php

class Addexpensecontroller extends CI_Controller {

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
      
      if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
//      ec
      //Username gettting
        $quer= $this->db->query("SELECT firstname FROM customer where username='$x'");
        $mega=$quer->result_array();
      $this->load->view('addexpense',array('mega'=>$mega,));
      
    }
    
    function insertexpense()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $this->load->model('insert_expense');
        $this->load->model('insert_subdata');

        $x= $this->session->userdata('username');
       // SELECT d_id FROM datesubtable WHERE tag='Vegetables' && c_username ='adasd@ada.com' && start_date='2015-04-20'
        $this->db->select('d_id');
        $this->db->from('datesubtable');
        $this->db->where('tag',$this->input->post('tag'));
        $this->db->where('c_username', $x);
        $this->db->where('start_date', $this->input->post('c_date'));
        $query1 = $this->db->get();
         $thedate_id;
               
            
        
               if($this->input->post('c_date')==$this->input->post('enddate')) 
               {
                   if ($query1->num_rows() == 1)
            {
               $row = $query1->row();
               $thedate_id=$row->d_id;
            }
            else
            {
                $sub =new insert_subdata();
               //  $sub->d_id;
                $sub->tag =$this->input->post('tag');
                $sub->c_username=$x;
                $sub->start_date=$this->input->post('c_date');
                 $sub->insert();
                 $thedate_id=$this->db->insert_id();
            } 
                   
               $inputed = new insert_expense();
               $inputed->date_id= $thedate_id;
               $inputed->price=  $this->input->post('price');
               $inputed->description=  $this->input->post('description');
               $inputed->rstatus=0;
               $inputed->end_date=  $this->input->post('enddate');
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
                        
                        if ($query1->num_rows() == 1)
                    {
                       $row = $query1->row();
                       $thedate_id=$row->d_id;
                    }
                    else
                    {
                        $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                    } 
                        
                        $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                       if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                       
                        $inputed->end_date= $converteddate;
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
                        
                        if ($query1->num_rows() == 1)
                    {
                       $row = $query1->row();
                       $thedate_id=$row->d_id;
                    }
                    else
                    {
                        $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                    } 
                        
                        $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                         if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                        
                        
                        $inputed->end_date= $converteddate;
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
                        
                        if ($query1->num_rows() == 1)
                    {
                       $row = $query1->row();
                       $thedate_id=$row->d_id;
                    }
                    else
                    {
                        $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                    } 
                        
                        $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                       
                         if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                        
                        
                        $inputed->end_date= $converteddate;
                         $inputed->insert();
                        }
                           
                                                 
                       
                    }
                    }
                    
                    
                                                 
                                                 
                                                 
                                                 
                    ///////////////////////////                             
                 
                    
               }
                redirect('customerhomecontroller');
    }
    
    function deleteexpense()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        
      //  if($this->input->get['e_id']==3)
     // echo $this->input->get('e_id');
       $this->load->model('insert_expense');
        $this->load->model('insert_subdata');
        
        $sub =new insert_subdata();
        $in = new insert_expense();
       $in->load($this->input->get('e_id'));
       
        $this->db->select('date_id');
        $this->db->from('expenses');
        $this->db->where('date_id',$in->date_id);
        $query1 = $this->db->get();
         if ($query1->num_rows() == 1)
            {
               $sub->d_id=$in->date_id;
               $sub->delete();
            }
        
        
        // $inputed = new insert_expense();
       //  $inputed->exp_id=$this->input->get('e_id');
         $in->delete();
        redirect('customerhomecontroller');
    }
    
    function displayupdateview()
    {     
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $x=$this->input->get('e_id');
        $this->load->database();
        $query = $this->db->query("select exp_id,tag,start_date,price,description,end_date from datesubtable,expenses
 where date_id=d_id && exp_id='$x'");
       //Username gettting
        $t=$this->session->userdata('username');
        $quer= $this->db->query("SELECT firstname FROM customer where username='$t'");
        $mega=$quer->result_array();
        if ($query->num_rows() == 1)
            {
                $row = $query->row(); 
            $this->load->view('updateexpense',array(
                   'exp_id'=>$row->exp_id,
                   'tag'=>$row->tag,
                   'price'=>$row->price,
                    'start_date' =>$row->start_date,
                'description' =>$row->description,
                'mega'=>$mega,
                'end_date' =>$row->end_date,
                
               )
                
                );
            
        }
      //  $this->load->view('updateexpense');
    }
    
    
    function updateexpense()
    {
        if($this->session->userdata('username')=="")
      {
          redirect('logincontroller');
      }
        $this->load->model('insert_expense');
        $this->load->model('insert_subdata');
         $exid=$this->input->get('e_id');
        $x= $this->session->userdata('username');
      
        //getting date_id for given expenseid
        $this->db->select('date_id');
        $this->db->from('expenses');
        $this->db->where('exp_id',$exid);
        $query1 = $this->db->get();
       
         $thedate_id;
         $row = $query1->row();
         //getting count of no of date_id entires in expenses table
         $this->db->select('date_id');
         $this->db->from('expenses');
         $this->db->where('date_id',$row->date_id);
         $query2 = $this->db->get();
           

               if($this->input->post('c_date')==$this->input->post('enddate')) 
               {
                   if ($query2->num_rows() == 1)
            {
               
               $thedate_id=$row->date_id;
               $start_date=$this->input->post('c_date');
               $tag=$this->input->post('tag');
              
               $query = $this->db->query("UPDATE datesubtable SET tag = '$tag', c_username = '$x', start_date = '$start_date' WHERE d_id = $thedate_id;");
              
            }
            else
            {
                $sub =new insert_subdata();
               
                $sub->tag =$this->input->post('tag');
                $sub->c_username=$x;
                $sub->start_date=$this->input->post('c_date');
                 $sub->insert();
                 $thedate_id=$this->db->insert_id();
            } 
            
            
               $price=  $this->input->post('price');
               $description=  $this->input->post('description');
               
               $end_date=  $this->input->post('enddate');
               
                $query = $this->db->query("UPDATE expenses SET date_id = '$thedate_id', "
                        . "price = '$price', "
                        . "description = '$description' ,"
                        . " end_date = '$end_date'"
                        . " WHERE exp_id = $exid ");
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
                   if ($query2->num_rows() == 1)
            {
                $row = $query1->row();
               $thedate_id=$row->date_id;
               $start_date=$this->input->post('c_date');
               $tag=$this->input->post('tag');
              
               $query = $this->db->query("UPDATE datesubtable SET tag = '$tag', c_username = '$x', start_date = '$start_date' WHERE d_id = $thedate_id;");
              
            }
            else
            {
                $sub =new insert_subdata();
               
                $sub->tag =$this->input->post('tag');
                $sub->c_username=$x;
                $sub->start_date=$this->input->post('c_date');
                 $sub->insert();
                 $thedate_id=$this->db->insert_id();
            } 
            
            
               $price=  $this->input->post('price');
               $description=  $this->input->post('description');
               
               $end_date=  $this->input->post('c_date');
               
                $query = $this->db->query("UPDATE expenses SET date_id = '$thedate_id', "
                        . "price = '$price', "
                        . "description = '$description' ,"
                        . " end_date = '$end_date'"
                        . " WHERE exp_id = $exid ");
               }
               
               
               
                        else    //Only insert coz of repeat status
                        {
                           $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                         
                         $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                         if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                        $inputed->end_date= $converteddate;
                         $inputed->insert();
                         
                         
                            
                            
                            
                            
                        }
                    }
                    
                     else if($this->input->post('Repeatstatus')=='2')
                    {  
                         
                        
                        $date = strtotime("+$y day", strtotime($this->input->post('c_date')));
                        $converteddate= date("Y-m-d", $date);
                        
                        if($y==0) //Only update if possible
                         {
                   if ($query2->num_rows() == 1)
            {
                $row = $query1->row();
               $thedate_id=$row->date_id;
               $start_date=$this->input->post('c_date');
               $tag=$this->input->post('tag');
              
               $query = $this->db->query("UPDATE datesubtable SET tag = '$tag', c_username = '$x', start_date = '$start_date' WHERE d_id = $thedate_id;");
              
            }
            else
            {
                $sub =new insert_subdata();
               
                $sub->tag =$this->input->post('tag');
                $sub->c_username=$x;
                $sub->start_date=$this->input->post('c_date');
                 $sub->insert();
                 $thedate_id=$this->db->insert_id();
            } 
            
            
               $price=  $this->input->post('price');
               $description=  $this->input->post('description');
               
               $end_date=  $this->input->post('c_date');
               
                $query = $this->db->query("UPDATE expenses SET date_id = '$thedate_id', "
                        . "price = '$price', "
                        . "description = '$description' ,"
                        . " end_date = '$end_date'"
                        . " WHERE exp_id = $exid ");
               }
               
               
               
                        else  
                        {//Only insert coz of repeat status
                            $day = date('l', $date);
                            if($day =='Saturday' || $day =='Sunday' )
                         
                            {
                           $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                         
                         $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                         if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                        $inputed->end_date= $converteddate;
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
                   if ($query2->num_rows() == 1)
            {
                $row = $query1->row();
               $thedate_id=$row->date_id;
               $start_date=$this->input->post('c_date');
               $tag=$this->input->post('tag');
              
               $query = $this->db->query("UPDATE datesubtable SET tag = '$tag', c_username = '$x', start_date = '$start_date' WHERE d_id = $thedate_id;");
              
            }
            else
            {
                $sub =new insert_subdata();
               
                $sub->tag =$this->input->post('tag');
                $sub->c_username=$x;
                $sub->start_date=$this->input->post('c_date');
                 $sub->insert();
                 $thedate_id=$this->db->insert_id();
            } 
            
            
               $price=  $this->input->post('price');
               $description=  $this->input->post('description');
               
               $end_date=  $this->input->post('c_date');
               
                $query = $this->db->query("UPDATE expenses SET date_id = '$thedate_id', "
                        . "price = '$price', "
                        . "description = '$description' ,"
                        . " end_date = '$end_date'"
                        . " WHERE exp_id = $exid ");
               }
               
               
               
                        else  
                        {//Only insert coz of repeat status
                        
                            if($day !='Saturday' && $day !='Sunday' )
                         
                            {
                           $sub =new insert_subdata();
                       //  $sub->d_id;
                        $sub->tag =$this->input->post('tag');
                        $sub->c_username=$x;
                        $sub->start_date=$converteddate;
                         $sub->insert();
                         $thedate_id=$this->db->insert_id();
                         
                         $inputed = new insert_expense();
                        $inputed->date_id= $thedate_id;
                        $inputed->price=  $this->input->post('price');
                        $inputed->description=  $this->input->post('description');
                         if($y>0){ $inputed->rstatus=1; }
                       else
                       {$inputed->rstatus=0;}
                        $inputed->end_date= $converteddate;
                         $inputed->insert();
                         
                         
                            
                            
                            
                            
                        }
                    }
                   
                    }
                    
                        }
                    
               }
               
               redirect('customerhomecontroller');
    }
}