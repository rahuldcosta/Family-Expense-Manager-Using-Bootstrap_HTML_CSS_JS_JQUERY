<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/managerbudget/myproj.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Budget.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 <?php foreach($mydata1 as $red) { if($red['customertype']=="1"){?>
<body onload="onload()">
 <?php }else {?>
    <body >
 <?php }}?> 
    <div id="Maincontainer" class="container"> 
    
        <?php $this->load->view('slidermenu',$mega);?>
        
        
    <div id="TopBar" class="row text-center" >
        <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
        <span  id="HomeButton">Manage Budget</span>
    </div>
        <?php foreach($mydata1 as $red) { if($red['customertype']=="1"){?>
        
          <div id="MiddleBar" class="row style1">
        <p></p>
        <div id="managebudgetform">
            
            <?php
            
            if(sizeof($mydata)>0)
            {
             ?>   <div class="style2" onclick="document.getElementById('errordiv').innerHTML='Cannot Add Multiple Budgets for Same Month'">
                <span class="style3" style="font-size: 1.4em"><i class="fa fa-plus-square" style="background:yellow;font-size: 1.7em!important;border-radius: 20px"></i> Add Budget</span>
            </div>
            <div class="style2" onclick="updatebudgetform()">
                <span class="style3" style="font-size: 1.4em"><i class="fa fa-pencil-square" style="background:yellow;border-radius: 5px;font-size: 1.7em!important;border-radius: 20px"></i> Update Budget</span>
            </div>
            <input type="hidden" name="oper" value="update">
            
            <?php
            }
            else if(sizeof($mydata)==0)
            {
             ?>   <div class="style2" onclick="addbudgetform()">
                <span class="style3" style="font-size: 1.4em"><i class="fa fa-plus-square" style="background:yellow;font-size: 1.7em!important;border-radius: 20px"></i> Add Budget</span>
            </div>
            <div class="style2" onclick="document.getElementById('errordiv').innerHTML='Please Add A Budget First then update it'">
                <span class="style3" style="font-size: 1.4em"><i class="fa fa-pencil-square" style="background:yellow;border-radius: 5px;font-size: 1.7em!important;border-radius: 20px"></i> Update Budget</span>
            </div>
            <input type="hidden" name="oper" value="insert">
                <?php
            }
            
            ?>
            
            
        </div>
        <div id="addbudgetform" class="style2">
            <form class="form-horizontal" method="post" action="managebudgetcontroller/dataentry">
                <fieldset>
                     <?php
            
            if(sizeof($mydata)>0)
            {
             ?>   
            <input type="hidden" name="oper" value="update">
           <?php foreach($mydata as $row)
            { ?>
           <input type="hidden" name="bugetid" value='<?php echo $row['bgid']?>'>
            
            <?php
            } }
            else if(sizeof($mydata)==0)
            {
             ?>   
            <input type="hidden" name="oper" value="insert">
            
                <?php
            }
            
            ?>
            
                    <div class="form-group">
				
						
                        <div id="amountEntry" class="row" style="margin-top:2%;height:2em;margin-bottom:4%;margin-left:1em">
						
            
         
                        <div class="text-center" style="float:left;width:50%;margin-left:20%;margin-right:10%;">
                            <?php if(sizeof($mydata)>0) {?>
                            <?php foreach($mydata as $row) {?>	
                                <input required class="form-control text-center" name="maxb" style="width:100%" id="focusedInput" type="text" value="<?php echo $row['maxbudget']?>"> 
                       
                            <?php }} else {?>
                                
                                  <input required class="form-control text-center" name="maxb" style="width:100%" id="focusedInput" type="text" placeholder="Enter Amount"> 
                                
                            <?php }?>
                        </div>
         
         
                    <div style="float:left;width: 1em; text-align: center; font-size:1em;height:1em;">  
                        <i class="fa fa-inr"></i>
                            </div>
                        
 
        
                    </div>
                    </div>
                    
                    
            
                              
            <div class="form-group style4">
                        <div class="col-md-4 style4">
                            <button id="button1" type="submit" class="btn btn-primary style4 style5" >Add Budget</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        
        <div id="errordiv" style="color:red"> </div>
        
    </div>
        
        <?php } else { ?>
        
          <div id="MiddleBar" class="row style1">
        <p></p>
       
        <div id="addbudgetform" class="style2">
            
                     
            
                    <div class="form-group">
				
						
                        <div id="amountEntry" class="row" style="margin-top:2%;height:2em;margin-bottom:4%;margin-left:1em">
						
            
         
                        <div class="text-center" style="float:left;width:50%;margin-left:20%;margin-right:10%;">
                            <?php if(sizeof($mydata)>0) {?>
                            <?php foreach($mydata as $row) {?>	
                                <input disabled class="form-control text-center" name="maxb" style="width:100%" id="focusedInput" type="text" value="Amount :- <?php echo $row['maxbudget']?>"> 
                       
                            <?php }} else {?>
                                
                                  <input disabled class="form-control text-center" name="maxb" style="width:100%" id="focusedInput" type="text" value="No Budget Added Yet !"> 
                                
                            <?php }?>
                        </div>
         
         
                    <div style="float:left;width: 1em; text-align: center; font-size:1em;height:1em;">  
                        <?php if(sizeof($mydata)>0) {?>
                        <i class="fa fa-inr"></i>
                        <?php }?>
                            </div>
                        
 
        
                    </div>
                   
                    
                    </div>
            
            
            
                    <div class="form-group">
                        <?php if(sizeof($mydata)>0) {?>	
                            <?php foreach($mydata as $row) {?>	
                        <input disabled class="form-control text-center" type="text" name="bdate" style="width:60%;margin:auto;" onfocus="(this.type='date')" onblur="(this.type='text')" value="Date:- <?php echo date("d-M-Y",strtotime($row['dated'])) ?>">
                            <?php }} else {?>
                                
                                
                                
                            <?php }?>
                      
                        
                    </div>
  
        </div>
        
        
        
    </div>
        
        <?php }}?> 
        
        
        
 <div id="BottomBar" class="row text-center">
    <div onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'" class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;">
        <span class="glyphicon glyphicon-stats text-center"></span>
    </div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('addexpensecontroller/'); ?>'">
        <span class="glyphicon glyphicon-plus-sign" style="background:black;color:red;border-radius: 25px;"></span></div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller/'); ?>'">
        <span class="glyphicon glyphicon-home"></span>
    </div>
</div>
    </div>
</body>
</html>
