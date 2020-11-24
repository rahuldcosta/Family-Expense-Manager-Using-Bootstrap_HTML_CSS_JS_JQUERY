<html lang="en" onclick="SlideMyMenu(2,event)"><head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/managebranch/myproj.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vHome.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body >
  	

<div id="Maincontainer" class="container "> 
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" class="text-center glyphicon glyphicon-list " style="cursor: pointer;" onclick="SlideMyMenu(1,event)"></span>
    <span id="TagButton" style="float:left;margin-left:1.5em">Manage Branch</span>
    <span class="fa fa-truck" style="margin:auto;margin-top:0.2em"></span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row" style="margin-top:2em;">
      <div id="TagList" class="col-sm-12" style="width:100%;padding-top:10px"> 
          <div style="margin-left:0.8em;font-size:0.8em;width:100%;text-align:center">List of Branches</div>
          <table class="table table-hover table-curved" style="table-layout: fixed">  
              
              <tbody>
                
                  <?php 
                  foreach ($mydata as $row)
                    {  ?>
                  <tr class="Homeitem"  onclick="location.href=location.href='<?php $x=$row['contact'];echo site_url("managebranchcontroller/branchdetails?offerid=$x") ?>'">
                      <td style="width:65%" >
                          <span>
                                 
                              <div class="parent" style="cursor: pointer;color:blue;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:50vw">
                                  <span class="glyphicon glyphicon-bookmark" style="cursor: pointer;
                                      <?php
                                  if($row['type']==1){
                                  ?> color:red <?php }else { ?>
                                      color:green;
                                <?php  }?>"></span>
                                  <?php echo $row['city'].",".$row['state'].",".$row['country']; ?></div>    
                              
                          </span>    
                      </td>
                      <td style="width:35%">
                          <span style="float:left"><i class="fa fa-phone-square"></i></span>   
                          <div class="parent" style="cursor: pointer;color:blue;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;"><?php echo $row['contact']; ?></div>    
                            
                      </td>
                  </tr>
                           
                   <?php }
                
                  ?>
                  
                  
              </tbody> 
          </table> 
      </div>
  </div>
 
 
 
 <div id="BottomBar" class="row text-center" >


     <div class="text-center " style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);">
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
   
    
<div id="submitter" class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('managebranchcontroller/addbranch'); ?>'">
        <span class="glyphicon glyphicon-plus-sign" style="background:black;color:red;border-radius: 25px;"></span></div>
    


<div class="text-center " style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);">

<span class="glyphicon glyphicon-pencil text-center" style="border-radius: 25px;"></span>

</div>

</div>
</div>










</body></html>