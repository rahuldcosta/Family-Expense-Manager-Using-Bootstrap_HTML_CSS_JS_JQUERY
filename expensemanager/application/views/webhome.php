<!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/webhome/webhome.css">
     <script src="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      function  showops(){document.getElementById("redirector").style.display="block"}
      </script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
  	
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body >
  	

<div id="Maincontainer" class="container "  >
    
    
    <div id="App_Top" class="row" >
        
    <div class="col-lg-6 text-center"  >
        <img src="/expensemanager/assets/imgs/expensemanager.png" width="30px" height="30px">
       <i class="fa fa-university"> </i>
        <i class="fa fa-taxi"></i>
        <i class="fa fa-motorcycle"></i>
        <i class="fa fa-beer"></i>
        <i class="fa fa-cutlery"></i>
        <i class="fa fa-diamond"></i>
        <img src="/expensemanager/assets/imgs/expensemanager.png" width="30px" height="30px">
    </div>
    
        <div class="col-lg-6  text-center" >
            <span style="color:black;font-weight:bold;background: black;color:white;border-radius: 3px">Expense IQ</span>  <span  class='switchedhide'  style="position: fixed;font-size:75%;float:right;right: 1em;margin-top: 0.7em" >
        <i class="fa fa-book" style="color:green;font-weight:bold;"></i>
        <span   style="float:right;cursor: pointer" onclick="location.href='<?php echo site_url('webhomecontroller/aboutus'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">About Us</span>
        </span>
           <div>
            <span  class="hider" id="login" style="float:right" >
                    <i class="fa fa-sign-in" style="color:blue;font-weight:bold;"></i>
                     <span style="font-weight:bold;cursor:pointer" onclick="location.href='<?php echo site_url('logincontroller/index'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">User Login</span>
            </span>
            
             <span  class="hider"  style="float:right;margin-left: 1.5em" >
        <i class="fa fa-book" style="color:green;font-weight:bold;"></i>
        <span  class="hider" style="font-weight:bold;float:right;cursor: pointer" onclick="location.href='<?php echo site_url('webhomecontroller/aboutus'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">About Us</span>
        </span>
          
            </div>
    </div>
  </div>


   
   
  <div  id="App_Middle" class="row text-center" >
    
      
      <div id="carousel-example-generic" class="carousel slide col-md-6" data-ride="carousel" data-interval="2000" style="height:16.5em;border:3px solid black;overflow:hidden">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3" ></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    
    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
    
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner" >
    <div class="item active">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/1.jpg" width='100%' >
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/2.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/3.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/4.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/5.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/6.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
      <div class="item">
      <img src="<?php echo base_url(); ?>assets/imgs/carosule/7.jpg" width='100%'>
      <div class="carousel-caption">
          <h3></h3>
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
      
      <div  id="Points"class="col-md-6" >
    <h4><i class="fa fa-cubes"></i>Know where your money is going</h4>
        <h5 class="text-left"> All those coffees, car fill-ups and restaurant meals really add up.
Get to know how much money you spend and for what.
That's the first step to financial freedom.</h5>  
           <h4><i class="fa fa-cubes"></i>Make your paycheck last longer</h4>
             <h5 class="text-left">  Set up a budget to remind you not to spend too much.
That way you can save some money at the end of the month.
You can even budget for specific expenses. Like candy.</h5>   
          <h4><i class="fa fa-cubes"></i>Peace of mind about your finances</h4>
               <h5>Worry less. Because Our App makes it easy to know where your finances stand you can sleep easier at night. Maybe even go travel like you've always wanted. Now you know you can afford it.</h5> 
 
          </div>
    <div id="showondesktop" style="position:relative;top:0;">
    <img src="<?php echo base_url(); ?>assets/imgs/cash.jpg" width="80%" height="159" style="border-radius:2em;margin-top:1em">
    
    </div>

    
      </div>
      
      
    

    
    
    <div id="App_Bottom" class="row text-center" style="font-size:150%;margin-top:0.5em;">
         
              <div id="redirector" style="font-size:1em;display:none;" class="row"  >
        <div class="col-md-12" style="color:black;border-radius: 10px;opacity: 1">
            <button id="locationbutt"  name="locationbutt"  class="label label-warning " onclick="location.href='<?php echo site_url('customersignupcontroller'); ?>'"><i class="fa fa-user"></i> Customer</button>
            <button id="locationbutt" name="locationbutt"  class="label label-success" onclick="location.href='<?php echo site_url('vendorsignupcontroller'); ?>'"> <i class="fa fa-user-secret"></i> Vendor</button>
        
        </div>
       
    </div>
  
<div id="LoginButton" style="border: 1.75px solid black;">
<i class="fa fa-sign-in" style="color:blue;font-weight:bold;"></i>
    <span style="font-weight:bold;cursor:pointer" onclick="location.href='<?php echo site_url('logincontroller/index'); ?>'">User Login</span>
</div>

<div id="SignUpButton" class="text-center" style="border: 1.75px solid black;" >
<i class="fa fa-shirtsinbulk" style="color:orange;font-weight:bold;"></i>
<span style="font-weight:bold;cursor:pointer"  onclick="showops()" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">
    
    
    Sign Up</span>

</div>
        
        




</div>


</div>



</body>
</html>
