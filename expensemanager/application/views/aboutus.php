<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/about/about.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/about.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body >
    <div id="Maincontainer" class="container"> 
    
        
        
    <div id="TopBar" class="row " >
        <span  class="fonter"  style="float:left;margin-left: 1.5em;position: relative;top:0.5em;" >
        <i class="fa fa-book" style="color:green;font-weight:bold;"></i>
        <span  style="font-weight:bold;">About Us</span>
        </span>
         
        <span  class="fonter"  id="login" style="float:right;margin-right: 2em;position: relative;top:0.5em ;" >
                    <i class="fa fa-sign-in" style="color:blue;font-weight:bold;"></i>
                     <span style="font-weight:bold;cursor:pointer" onclick="location.href='<?php echo site_url('logincontroller/index'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">User Login</span>
            </span>
        <span  class="fonter"  style="float:right;margin-right: 2em;position: relative;top:0.5em;" >
        <i class="fa fa-home" style="color:red;font-weight:bold;"></i>
        <span style="font-weight:bold;cursor:pointer" onclick="location.href='<?php echo site_url(''); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">Home</span>
         </span>
        
    </div>
    <div id="MiddleBar">
        <div id="title" class="style2">
            About Expense IQ
        </div>
        <div class="style1">
            <p class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;The Expense IQ is Web Application
            <p> For Customer :- Helps  family members manage expense and calculates all the expense of all the family members, and shows the Statistics also allowing customer to check offers posted by vendors.<p> 
            <p> For Vendors :- Helps  Vendors to Manage offers and Branches so that their offers in their different branches reach to  our Customers<p> 
            </p>
        </div>
        <div class="style1">
            <div class="style4">Creditors</div>
            <div>
                <div class="style3">Rahul D'Costa</div>
                <div class="style3">Jatin Sharma</div>
                <div class="style3">Rugved Dhuri</div>
            </div>
            
        </div>
        <div class="style1">
           <div class="style4">Contacts</div>
            <div class="style3">
               familyexpensemanager@gmail.com
            </div>
        </div>
    </div>

</div>
</body>
</html>
