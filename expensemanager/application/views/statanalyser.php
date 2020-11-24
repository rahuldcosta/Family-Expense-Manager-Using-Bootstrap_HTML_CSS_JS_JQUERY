<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/statanalyser/myproj.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/StatAnalyser.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table, th, td {
   
    border-collapse: collapse;
}
th, td {
    padding: 3px;
}
th {background:greenyellow;font-size:0.9em}

</style>
</head>
<body onload="onload()">
    <div id="Maincontainer" class="container"> 
 
        <?php $this->load->view('slidermenu',$mega);?>
        
        
        
        
    <div id="TopBar" class="row text-center" >
        <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
        <span  id="HomeButton">Stats Analyser</span>
    </div>
        
        
        
    <div id="MiddleBar" class="style1" >
        
        
          
        <div id="topbox" class="box1">
            <div style="margin-left:0.8em;font-size:0.7em;width:100%;text-align:center"><?php echo date('01-M-Y', strtotime('now'));?> <i class="fa fa-arrows-h"></i> <?php echo date('t-M-Y', strtotime('now'));?></div>
            <div class=" box2 style2">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 alignleft">
                            
                            <i class="fa fa-inr"></i>
                            <?php foreach($mydata as $row)
            { 
                                $foo = $row['price'];
                                ?>
                            

                            <?php echo number_format((float)$foo, 2, '.', ''); ?>
            
            <?php
            }  ?>
                            
                           
                        </div>
                        <div class="alignright col-xs-4 ">
                            Spent
                        </div>
                    </div>
                </div>
            </div>
            <div class="box2 style2">
                <div class="container ">
                    <div class="row">
                        <div class="col-xs-8 alignleft">
                            <i class="fa fa-inr"></i> 
                             
                            <?php $foo1=0; foreach($mydata1 as $row1)
            { 
                                $foo1 = $row1['maxbudget'];
                                ?>
                            

                            
            
            <?php
            }  ?>
                            <?php echo number_format((float)$foo1, 2, '.', ''); ?>
                        </div>
                        <div class="alignright col-xs-4 ">
                            Max
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="style1">
           
             <span class="icon1"><img src="/expensemanager/assets/imgs/icon1.png" /></span>
             
        </div>
        <div id="bottombox" class="box1">
            <div class="row">
              
                    <div class="col-sm-12">
                       Balance:<i class="fa fa-inr"></i> <?php echo number_format((float)($foo1-$foo), 2, '.', ''); ?>
                       
                    </div>
                <?php if(number_format((float)($foo1-$foo), 2, '.', '')>(float)($foo1*0.25))  {?>
                    <div class="col-sm-12" style="color:green">
                      You still can Spent some money this month
                    </div>
                <?php }else  ?>
                <?php  if(number_format((float)($foo1-$foo), 2, '.', '')<(float)($foo1*0.25))  {?>
                    <div class="col-sm-12" style="color:red">
                      You have been spending a lot please reduce expenses
                    </div>
                <?php } ?>
            </div>
        </div>
        <div style="margin-left:0px;text-align: left">
             <?php if($count>0){  
            
           echo 'Family Spenders';
          }else {  
        
            echo 'No Spenders Yet !';
         } ?> 
        </div>
                              
        <div  class="box1">
           
            <div class="row">
              
                    <div class="text-center" style="width:70%;float:left">
                        
                     
                      <?php if($count>0){ ?>           
                        
                        
                      <table id="tableid" class="table table-hover table-curved text-left" style="visibility: visible; table-layout: fixed;">  
              
                <tbody id="tbodyholder">
                  
                     <tr >
                                   <th >
                                Name
                            </th>
                            <th>
                                Spent(in <i class="fa fa-inr"></i>)
                            </th>
                                </tr>
                                
                      <?php foreach ($mydata2 as $row){ ?>           
                    <tr>
                        <td style="text-align:left;cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
                            <?php  echo $row['firstname'];?>
                        </td>
                        <td style="text-align:left;cursor: pointer;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
                            <?php  echo $row['cost'];?>
                        </td>
                        
                    </tr>
                     <?php } ?>
                </tbody>
                
            </table>  
                        
                        <?php } ?> 
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="text-right" style="width:30%;float:right">
                        <div><img src="/expensemanager/assets/imgs/minonright.jpg" alt="Smiley face" style="width:5em;height:5em;border-radius:2em;float:right"></div> 
                      
                      
                    </div>
        
            </div>
        </div>
        
        
    </div>
   
        
        <div id="BottomBar" class="row text-center" >
<div class="myborder " style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller'); ?>'">
<span class="glyphicon glyphicon-home text-center" ></span>
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
