<!DOCTYPE html>
<?php $cost=array();$onetimer=0; ?>
<html lang="en" onclick="SlideMyMenu(2,event)">
  <head>
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/customerhome/myproj.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Home.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script>
      function takeme(trtag){
          var trid=trtag.id;
          
        location.href='<?php echo site_url("customerhomecontroller/expensedetails?exp_id=") ?>'+trid;
      } 
     var globalres;
     var middle;
     var topper;
    function loadData(){
   // alert(loadType +"||"+);
   
   var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
       middle= document.getElementById('MiddleBar').innerHTML;
       topper=document.getElementById('TopBar').innerHTML;
       var today = yyyy+'-'+mm+'-'+dd;
  var dataString = 'date='+ today;
  $.ajax({
    type: "POST",
    url: "<?php echo site_url('customerhomecontroller/rendernotify');?>",
    data: dataString,
    
    cache: false,
    success: function(result){
     
    // document.getElementById('MiddleBar').innerHTML="";
     
    // alert(globalres);
    // 
     // $("#MiddleBar").append(result);
     if(result !="")
     { $("#notice").append(result);
     }
     else
     {
         //
          //document.getElementById('Daily Expense Reminders').innerHTML;
          document.getElementById('Daily Expense Reminders').innerHTML="<span class='glyphicon glyphicon-exclamation-sign'></span><span style='margin-left:0.8em'>Daily Expense Reminders</span><div style='text-align:center;margin-top:1em'>&#160; No Pending Reminders <i class='fa fa-smile-o' style='margin-left:0.3em;background:yellow'></i></div>";
         //document.getElementById('notice').innerHTML='<tr><td class="text-right"> <span > <span class="glyphicon glyphicon-hand-right"></span></span></td><td ><span class="text-left">&#160; No Pending Reminders <i class="fa fa-smile-o" style="margin-left:0.8em"></i></span></td></tr>';
         
     }
    }
 });
 var rotr="";
 jQuery.ajax({
type: "POST",
url: "<?php echo site_url('customerhomecontroller/headchecker'); ?>",
dataType: 'json',
data: {uname: rotr},
success: function(res) {
if (res.stat)
{
    document.getElementById('Family Notice').innerHTML="<span class='glyphicon glyphicon-exclamation-sign'></span><span style='margin-left:0.8em'>Family Notice</span><div style='text-align:center;color:green;margin-top:0.7em;margin-bottom:0.7em'>Your Now The Family Head</div>";
    document.getElementById('Family Notice').style.display='block';
// Show Entered Valuefailed login please check username and password
//alert("Success User Found"+res.username + '||' + res.password );

}
else {document.getElementById('Family Notice').style.display="none";}

}

});

        document.getElementById('HomeButton').setAttribute("onclick","HomeSwitch()");
}
    
    </script>
  </head>

  <body >
  	

<div id="Maincontainer" class="container "  > 
    
    
    
    
<?php $this->load->view('slidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)" style="cursor: pointer;"></span>
    <span id="HomeButton"  style="cursor: pointer;border-top-width: 5px; border-right-width: 5px; border-style: solid solid none none; border-top-color: blue; border-right-color: blue;">Home</span>
    <span id="NotifyButton" style="position: relative; width: 53.3333%; float: left; cursor: pointer; border: none;" onclick="RenderNotifications()">Notifications<span id="NotfiyCount" class="badge badge-info" style="background:red;color:white"><?php if($noti>0)echo $noti;?></span></span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row">
      <div id="ExpenseReportList" class="col-sm-12" style="width:100%;padding-top:10px">  
          <div style="font-weight: bolder;margin-left:0.8em;font-size:0.7em;width:100%;text-align:center"><?php echo date('01-M-Y', strtotime('now'));?> <i class="fa fa-arrows-h"></i> <?php echo date('t-M-Y', strtotime('now'));?></div>
          <?php if(sizeof($mydata)==0) { ?>
              
          <div class="text-center" style="font-weight: bolder;margin-top: 5em;margin-bottom: 5em">Start Adding Your Expenses and Leave the Managing to us <i class='fa fa-smile-o' style='margin-left:0.3em;background:yellow'></i></div>
              
              
         <?php }else {?>
          
          <table id="datatable" class="table table-hover table-curved" style="margin-left:-0.5em">  
              <colgroup>   
                  <col class="col-md-4" style="width: 60%">   
                  <col class="col-md-7" style="width: 40%">   
              </colgroup>   
              <tbody>
                  
                  <?php 
                  $flag=0;
                  
                  foreach ($mydata as $row)
                    {  $fang=0;
                      $unixtime=strtotime('now');
                       $time = date("Y-m-d",$unixtime);

                      if(strtotime( $row['start_date']) > strtotime($time)) //flag=1
                      {
                          $datertext='Planned';
                          if ($flag==0)
                          {
                              $flag=1;
                          ?>
                  
                   <tr class="Homeitem"  onclick="ShowItemsList('x',event)">
                       <td > <span class="glyphicon glyphicon-bookmark" style="cursor: pointer;color:red;"></span>   
                              <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo $datertext; ?></span>    
                              
                           <div id="x" style="display:none">
                    <?php 
                          
                        
                          }   
                             
                         // continue;
                  ?>
                  
                    <?php 
                    }
                    else if (strtotime( $row['start_date']) == strtotime($time))  //fang=1
                    {
                        
                        if($fang==0 && $flag==1 && $onetimer==0 )
                        {  $onetimer=1;
                         ?> 
                                
                           </div></td>
                           <td> <i style="cursor: pointer" class="fa fa-inr"></i>   
                              <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo array_sum($cost);?></span>
                            <div id="x+" style="display:none;width:100%;font-size:0.9em">
                                 
                           <?php           //The Cost TD and Div
                           
                           
                            foreach ($cost as $p => $value) {
                          //  echo  $cost[$index];

                           ?>
                           
                               
                          
                                <span> 
                          <div style="width:100%;font-size:0.9em"> 
                              <ul class="list-group" style="width:100%">
                                  
                              <li class="list-group-item"><span class="child" onclick="location.href='<?php $x=$p;echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><i class="fa fa-inr"></i><?php echo $cost[$p];?></span> 
                                  </li>
  
                              </ul>   
                      
                        
                          </div>
                           
                         
                           
                           </span>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           <?php
                           
                           }
                           
                           ?>
                                </div>
                    </td>
                   </tr>
                         <?php   
                        }
                        
                        $datertext='Today';
                        $fang=1;
                   ?> <tr class="Homeitem"  onclick="ShowItemsList('<?php echo $row['start_date']; ?>',event)">    <?php
                    }
                    else if($row['start_date']==date("Y-m-d", strtotime("yesterday"))) //fang=1
                    {
                        if($fang==0 && $flag==1 && $onetimer==0 )
                        {  $onetimer=1;
                         ?> 
                               
                           </div></td>
                           <td> <i style="cursor: pointer" class="fa fa-inr"></i>   
                              <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo array_sum($cost);?></span>
                            <div id="x+" style="display:none;width:100%;font-size:0.9em">
                                 
                           <?php           //The Cost TD and Div
                           
                           
                            foreach ($cost as $p => $value) {
                          //  echo  $cost[$index];

                           ?>
                           
                               
                          
                                <span> 
                          <div style="width:100%;font-size:0.9em"> 
                              <ul class="list-group" style="width:100%">
                                  
                              <li class="list-group-item"><span class="child" onclick="location.href='<?php $x=$p;echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><i class="fa fa-inr"></i><?php echo $cost[$p];?></span> 
                                  </li>
  
                              </ul>   
                      
                        
                          </div>
                           
                         
                           
                           </span>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           <?php
                           
                           }
                           
                           ?>
                                </div>
                    </td>
                   </tr>
                         <?php   
                        }
                        $datertext='Yesterday';
                        $fang=1;
                   ?> <tr class="Homeitem"  onclick="ShowItemsList('<?php echo $row['start_date']; ?>',event)">    <?php
                    }
                    
                      
                    else {   //fang=1
                        if($fang==0 && $flag==1  && $onetimer==0)
                        { $onetimer=1;
                         ?> 
                                 
                           </div></td>
                           <td> <i style="cursor: pointer" class="fa fa-inr"></i>   
                              <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo array_sum($cost);?></span>
                            <div id="x+" style="display:none;width:100%;font-size:0.9em">
                                 
                           <?php           //The Cost TD and Div
                           
                           
                            foreach ($cost as $p => $value) {
                          //  echo  $cost[$index];

                           ?>
                           
                               
                          
                                <span> 
                          <div style="width:100%;font-size:0.9em"> 
                              <ul class="list-group" style="width:100%">
                                  <!--here-->
                              <li class="list-group-item"><span class="child" onclick="location.href='<?php $x=$p;echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><i class="fa fa-inr"></i><?php echo $cost[$p];?></span> 
                                  </li>
  
                              </ul>   
                      
                        
                          </div>
                           
                         
                           
                           </span>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           <?php
                           
                           }
                           
                           ?>
                                </div>
                    </td>
                   </tr>
                         <?php   
                        }
                               $datertext= date("d,M Y", strtotime($row['start_date'])); 
                               $fang=1;
                    ?>
                    <tr class="Homeitem"  onclick="ShowItemsList('<?php echo $row['start_date']; ?>',event)">
                    
                        
                        
                        
                        
                        
                        
                    <?php
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     if($fang==1)  //happens for today and yesterday and old dates
                     {
                    ?>
                        <td >
                          <span>
                              <span class="glyphicon glyphicon-bookmark" style="cursor: pointer;color:red;"></span>   
                              <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo $datertext; ?></span>    
                              <div id="<?php echo $row['start_date']; ?>" class="itemlist" style="width:100%;font-size:0.9em">   
                                  <ul class="list-group" style="width:50vw">
                                       <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($entry['start_date']==$row['start_date']) {
                                              
                                            ?>
                                      
                                      <li class="list-group-item" ><div roc="5" id="<?php echo $entry['exp_id'] ?>" class="child" style="cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden; " onclick="location.href='<?php $x=$entry['exp_id'];echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><?php echo $entry['tag']; ?></div> 
                                      </li>
                                    
                                      <?php
                                            }}
                                              
                                            }
                                      ?>
                                  </ul>      
                              </div>  
                          </span>    
                      </td>
                      <td>
                          <span><i style="cursor: pointer" class="fa fa-inr"></i></span>   
                          <span class="parent" style="cursor: pointer;color:blue;margin-left:0.8em"><?php echo $row['sum(price)']; ?></span>    
                          <div id="<?php echo $row['start_date']; ?>+" class="itemlist" style="width:100%;font-size:0.9em">   
                              <ul class="list-group" style="width:100%">
                                  
                                   <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($row['start_date'] == $entry['start_date']) {
                                               
                                            ?>
                                      <li class="list-group-item"><span class="child" onclick="location.href='<?php $x=$entry['exp_id'];echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><i class="fa fa-inr"></i><?php echo $entry['price'] ?></span> 
                                  </li>
                                      
                                    
                                      <?php
                                            }}
                                              
                                            }
                                      ?>
                                  
                                 
                                  
                                  
                              </ul>   
                          </div>    
                      </td>
                       
                      
                  </tr>
               
                        
                   <?php 
                   
                    }
                    else if($fang==0) {   //happens for planned
                     ?> 
                    
                          <span>
                                  
                              
                                       <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($entry['start_date']==$row['start_date']) {
                                                 $cost[$entry['exp_id']]=$entry['price'];
                                                 
                                            ?>
                                      <div   style="width:100%;font-size:0.8em">   
                                  <ul class="list-group" style="width:50vw">
                                      <li class="list-group-item" ><div roc="5" id="<?php echo $entry['exp_id'] ?>" class="child" style="cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden; " onclick="location.href='<?php $x=$entry['exp_id'];echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><?php echo $entry['tag']; ?></div> 
                                      </li>
                                    </ul>      
                              </div>  
                                      <?php
                                            }}
                                              
                                            }
                                      ?>
                                  
                          </span>    
                        
                  
                  
                  
                  
                  
                  
                   <?php
                    }
                    
                    
                    
                    
                                            }
                
                  ?>
                 
                  
       
                  
                  
                  
                  
                  
                  
                  </tbody>  
          </table> 
      <?php }?>
      </div>
      
  </div>
 
 
 
<div id="BottomBar" class="row text-center" >
<div class="myborder " style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'">
<span class="glyphicon glyphicon-stats text-center" ></span>
</div>

<div  class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('addexpensecontroller'); ?>'">

<span class="glyphicon glyphicon-plus-sign" style="background:black;color:red;border-radius: 25px;" ></span>

</div>


<div class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller/rendertag'); ?>'" >
<span class="glyphicon glyphicon-tags"></span>
</div>

</div>


</div>




</body>
</html>




