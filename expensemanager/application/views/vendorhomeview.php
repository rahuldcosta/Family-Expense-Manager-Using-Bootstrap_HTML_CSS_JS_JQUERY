<html lang="en" onclick="SlideMyMenu(2,event)"><head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vhome/myproj.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vHome.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body >
  	

<div id="Maincontainer" class="container "> 
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " style="cursor: pointer;" onclick="SlideMyMenu(1,event)"></span>
    <span id="TagButton" style="float:left;margin-left:1.5em">Offer History</span>
    
    <i class="fa fa-history" style="margin:auto;margin-top:0.2em"></i>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row" style="margin-top:2em"><div id="TagList" class="col-sm-12" style="width:100%;padding-top:10px"> 
          <div style="font-weight: bolder;margin-left:0.8em;font-size:0.7em;width:100%;text-align:center"><?php echo date('01-M-Y', strtotime('now'));?> <i class="fa fa-arrows-h"></i> <?php echo date('t-M-Y', strtotime('now'));?></div>
          <?php if(sizeof($mydata)==0) { ?>
              
          <div class="text-center" style="font-weight: bolder;margin-top: 5em;margin-bottom: 5em">Start Adding Your Offers and We Shall Get Them To Customers <i class='fa fa-smile-o' style='margin-left:0.3em;background:yellow'></i></div>
              
              
         <?php }else {?>
          <table class="table table-hover table-curved" style="margin-left:-0.5em;table-layout: fixed;">  
                
              <tbody>
                
                  <?php 
                  foreach ($mydata as $row)
                    {  ?>
                  <tr  class="Homeitem"  onclick="ShowItemsList('<?php echo $row['tag']; ?>',event)">
                      <td >
                          <span>
                                 
                              <div class="parent" style="cursor: pointer;color:blue;margin-left:0em;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:100%">
                                  <span class="glyphicon glyphicon-bookmark" style="cursor: pointer;color:red;"></span>
                                  <?php echo $row['tag']; ?></div>    
                              <div id="<?php echo $row['tag']; ?>" class="itemlist" style="width:90%;font-size:0.9em">   
                                  <ul class="list-group" >
                                       <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($entry['tag']==$row['tag']) {
                                            ?>
                                      
                                      <li class="list-group-item child" style="text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:100%"><span id="<?php echo $entry['offerid'] ?>"  style="cursor: pointer;" onclick="location.href='<?php $x=$entry['offerid'];echo site_url("vendorhomecontroller/offerdetails?offerid=$x") ?>'"><?php  echo date("d,M Y", strtotime($entry['startdate'])); ?></span> 
                                      </li>
                                    
                                      <?php
                                            }}
                                              
                                            }
                                      ?>
                                  </ul>      
                              </div>  
                          </span>    
                      </td>
                      <td >
                          
                          <span class="parent" style="display:inline;cursor: pointer;color:blue;margin-left:-2.1em"><?php echo  date("d,M Y", strtotime($row['startdate'])); ?></span>    
                            <div id="<?php echo $row['tag']; ?>+" class="itemlist" style="width:90%;font-size:0.9em;">   
                                  <ul class="list-group" >
                                       <?php 
                                                foreach ($mydata2 as $entry)
                                                    
                                            {  
                                            {if ($entry['tag']==$row['tag']) {
                                            ?>
                                      
                                      <li class="list-group-item" style="text-overflow: ellipsis; white-space: nowrap;overflow: hidden;width:100%"><span id="<?php echo $entry['offerid'] ?>" class="child" style="cursor: pointer" onclick="location.href=location.href='<?php $x=$entry['offerid'];echo site_url("vendorhomecontroller/offerdetails?offerid=$x") ?>'"><?php  
                                      
                                       if (strtotime($entry['startdate'])>strtotime('now'))
                                      {
                                        ?>  <span style="color:orange"><?php echo " Comming Soon"; ?></span>  <?php
                                      }
                                      else if( strtotime($entry['startdate'])>strtotime("-1 days") )
                                      {
                                       ?>  <span style="color:green"><?php echo "Available"; ?></span>  <?php
                                      }
                                      else 
                                      {
                                       ?>  <span style="color:red"><?php echo "Expired"; ?></span>  <?php
                                      }
                                      
                                      ?></span> 
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
 
 
 


 
 <div id="BottomBar" class="row text-center" >


     <div class="text-center " style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);">
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
   
    
<div id="submitter" class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('vendorhomecontroller/addoffer'); ?>'">
        <span class="glyphicon glyphicon-plus-sign" style="background:black;color:red;border-radius: 25px;"></span></div>
    


<div class="text-center " style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);">

<span class="glyphicon glyphicon-pencil text-center" style="border-radius: 25px;"></span>

</div>

</div>

</div>










</body></html>