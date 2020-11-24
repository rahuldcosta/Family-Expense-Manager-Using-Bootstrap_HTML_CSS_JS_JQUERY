<html lang="en" onclick="SlideMyMenu(2,event)"><head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/customerhome/myproj.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Home.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body >
  	

<div id="Maincontainer" class="container "> 
    
    
<?php $this->load->view('slidermenu',$mega);?>
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" class="text-center glyphicon glyphicon-list " style="cursor: pointer;" onclick="SlideMyMenu(1,event)"></span>
    <span id="TagButton" style="float:left;margin-left:1.5em">You Item Tags</span>
    <span class="glyphicon glyphicon-tags" style="margin:auto;margin-top:0.2em"></span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row"><div id="TagList" class="col-sm-12" style="width:100%;padding-top:10px"> 
          <div style="font-weight: bolder;margin-left:0.8em;font-size:0.7em;width:100%;text-align:center"><?php echo date('01-M-Y', strtotime('now'));?> <i class="fa fa-arrows-h"></i> <?php echo date('t-M-Y', strtotime('now'));?></div>
          <?php if(sizeof($mydata)==0) { ?>
              
          <div class="text-center" style="font-weight: bolder;margin-top: 5em;margin-bottom: 5em">Start Adding Your Expenses and Leave the Managing to us <i class='fa fa-smile-o' style='margin-left:0.3em;background:yellow'></i></div>
              
              
         <?php }else {?>
          <table class="table table-hover table-curved" style="margin-left:-0.5em">  
              <colgroup>         
                  <col class="col-md-4" style="width: 60%">  
                  <col class="col-md-7" style="width: 40%">  
              </colgroup>   
              <tbody>
                
                  <?php 
                  foreach ($mydata as $row)
                    {  ?>
                  <tr class="Homeitem"  onclick="ShowItemsList('<?php echo $row['tag']; ?>',event)">
                      <td >
                          <span>
                                 
                              <div class="parent" style="cursor: pointer;color:blue;margin-left:0.8em;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:50vw">
                                  <span class="glyphicon glyphicon-bookmark" style="cursor: pointer;color:red;"></span>
                                  <?php echo $row['tag']; ?></div>    
                              <div id="<?php echo $row['tag']; ?>" class="itemlist" style="width:100%;font-size:0.9em">   
                                  <ul class="list-group" style="width:100%">
                                       <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($entry['tag']==$row['tag']) {
                                            ?>
                                      
                                      <li class="list-group-item"><span id="<?php echo $entry['exp_id'] ?>" class="child" style="cursor: pointer" onclick="location.href=location.href='<?php $x=$entry['exp_id'];echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><?php  echo date("d,M Y", strtotime($entry['start_date'])); ?></span> 
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
                          <div id="<?php echo $row['tag']; ?>+" class="itemlist" style="width:100%;font-size:0.9em">   
                              <ul class="list-group" style="width:100%">
                                  
                                   <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($row['tag'] == $entry['tag']) {
                                            ?>
                                      <li class="list-group-item"><span class="child" onclick="location.href=location.href='<?php $x=$entry['exp_id'];echo site_url("customerhomecontroller/expensedetails?exp_id=$x") ?>'"><i class="fa fa-inr"></i><?php echo $entry['price'] ?></span> 
                                  </li>
                                      
                                    
                                      <?php
                                            }}
                                              
                                            }
                                      ?>
                                  
                                 
                                  
                                  
                              </ul>   
                          </div>    
                      </td>
                  </tr>
                           
                   <?php }
                
                  ?>
                  
                  
              </tbody> 
          </table> 
          <?php }?>
      </div>
  </div>
 
 
 
<div id="BottomBar" class="row text-center">
    <div onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'" class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;">
        <span class="glyphicon glyphicon-stats text-center"></span>
    </div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('addexpensecontroller'); ?>'">
        <span class="glyphicon glyphicon-plus-sign" style="background:black;color:red;border-radius: 25px;"></span></div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller'); ?>'">
        <span class="glyphicon glyphicon-home"></span>
    </div>
</div>


</div>










</body></html>