<!DOCTYPE html>
<html lang="en"  onclick="SlideMyMenu(2,event)">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/help/help.css">
      
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/help.js"></script>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
</head>
<body onload="onload()">
    <div id="Maincontainer" class="container"> 
    
        
       <?php $this->load->view('slidermenu',$mega);?>
        
        
        
        
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
                Q, What is a Stat Analyser?
            </div>
            <div id="ans1" class="style3">
                A, its a Module which Analysis all expenses of Family
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans2')">
                Q, What is Item Tag?
            </div>
            <div id="ans2" class="style3">
                A, Its the Tag added while entering an expense
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans3')">
                Q, How can i add a budget after registering ?
            </div>
            <div id="ans3" class="style3">
                A, Go to manage budget->click on update budget.(by default we set it to zero)
            </div>
        </div>
        
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans5')">
                Q, How to change My Family head ?
            </div>
            <div id="ans5" class="style3">
                A, Go to Profile and click on the 'H' icon to change from a list of family memebers
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans6')">
                Q, What is Check Offer About ?
            </div>
            <div id="ans6" class="style3">
                A, It list the offers by different vendors around your GPS co-ordinates ,if GPS is not available it gives a list of Offers By different vendors for the Current Day Only
            </div>
        </div>
        <div class="style1">
            <div class="style2" onclick="animatedcollapse.toggle('ans4')">
                Q, Contact us?
            </div>
            <div id="ans4" class="style3">
                A, Email us at familyexpensemanager@gmail.com
            </div>
        </div>
    </div>
  
        <div id="BottomBar" class="row text-center" >
<div class="myborder " style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'">
<span class="glyphicon glyphicon-stats text-center" ></span>
</div>

<div  class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller'); ?>'">

<span class="glyphicon glyphicon-home" style="color:red;border-radius: 25px;" ></span>

</div>


<div class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller/rendertag'); ?>'" >
<span class="glyphicon glyphicon-tags"></span>
</div>

</div>
        
        
        
</div>
</body>
</html>
