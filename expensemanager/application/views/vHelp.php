<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/help/helpv.css">
      
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/help.js"></script>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
</head>
<body onload="onload()">
    <div id="Maincontainer" class="container"> 
    
        
       <?php $this->load->view('vendorslidermenu',$mega);?>
        
        
        
        
    <div id="TopBar" class="row text-center" >
        <span id="SliderM" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)" style="cursor: pointer;"></span>
        <span  id="HomeButton">Help</span>
    </div>
    <div id="MiddleBar" style="word-wrap: break-word">
        <div id="title">
            Frequently Asked Questions
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans1')">
                Q, Can i change the contact no for a branch ?
            </div>
            <div id="ans1" class="style3">
                A, No its not allowed since each branch is registered according to contact no
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans2')">
                Q, How to Change My Main Branch ?
            </div>
            <div id="ans2" class="style3">
                A, Go to Profile and click on 'B' icon to select the main branch from list of branches
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans3')">
                Q, How to add offer for a period of time ?
            </div>
            <div id="ans3" class="style3">
                A, in Add an offer just select repeat daily,weekends,weekdays and set your end date
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans4')">
                Q, Contact?
            </div>
            <div id="ans4" class="style3">
                A, Email us @ -> familyexpensemanager@gmail.com
            </div>
        </div>
        
     
    </div>
  
        <div id="BottomBar" class="row text-center"  >
<div class="myborder " style="cursor:pointer; opacity: 0;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" >
<span class="glyphicon  text-center" ></span>
</div>

<div id="submitter" class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('vendorhomecontroller'); ?>'">
        <span class="glyphicon glyphicon-home" style="position:relative;top:2px;color:red;border-radius: 25px;"></span></div>


<div class="text-center myborder" style="cursor:pointer; opacity: 0;width:33.33%;float:left;z-index: 8;background: #FFFFCC;"  >
<span class="glyphicon "></span>
</div>

</div>
        
         
       
</div>
</body>
</html>
