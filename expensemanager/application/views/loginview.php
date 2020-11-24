<html>
<head>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Vendor/User login page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login/test.css" />
	<script type="text/javascript">
var type="";
// Ajax post
$(document).ready(function() {
$(".submit").click(function(event) {
event.preventDefault();
var user_name = $("input#uname").val();
var password = $("input#upass").val();

           // $("input#customer").val();
            if(document.getElementById("customer").checked) 
            {
               // alert('Customer is checked');
                type='customer';
            }
            else if(document.getElementById("vendor").checked) 
            {
               // alert('Vendor is checked');
                 type='vendor';
            }
if(type!="")
{
    
jQuery.ajax({
type: "POST",
url: "<?php echo site_url('logincontroller/user_data_submit'); ?>",
dataType: 'json',
data: {uname: user_name, upass: password,table : type},
success: function(res) {
if (res)
{
    var status=res.text;
    takemethere(status,type);
// Show Entered Valuefailed login please check username and password
//alert("Success User Found"+res.username + '||' + res.password );

}

}

});

}else
{
    document.getElementById('Status').innerHTML="Please Select Customer Or Vendor !!";
}
    
  }
  
    )

});


function takemethere(status,type)
{
    if(status=='false')
    
            {
                document.getElementById('Status').innerHTML="Failed login please check username and password";
                
               
            }
     if(status =='true')
    
            { 
                var resti=type.toUpperCase();
                  document.getElementById('Status').innerHTML="Have a Nice Day "+resti;  
                 // alert(type);
                  if(type=="customer")
                  {   location.href='<?php echo site_url('customerhomecontroller'); ?>';
                  }
                  else
                  {
                       location.href='<?php echo site_url('vendorhomecontroller'); ?>';
                     // alert('Vendor');
                  }
                  
               //  document.loginform.action = '';
            }
    
    }
</script>
</head>
<body>
<div id="login">

<form  name="loginform">
<h2 style="color:white">
	Welcome. Please login.
</h2>
	<fieldset>
	<p>
        <div style="text-align: center">  <input type="radio" id="customer" name="type"value="customer" >Customer

            <input type="radio" name="type" id="vendor" value="vendor">Vendor
            </div>
		<input type="text" id="uname" required value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' ">
	</p>
	<p>
		<input type="password" id="upass" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' ">
	</p>
	<p>
            <a href="<?php echo site_url("logincontroller/forget"); ?>">Forgot Password ?</a>
	</p>
	<p>
            
            <input  id="sub" type="submit" value="Login" class="submit" >
	</p>
	</fieldset>
</form>

    <div id="Status" style="color:white;font-size: 1.4em;text-align: center"></div>
</div> 
</body>
</html>