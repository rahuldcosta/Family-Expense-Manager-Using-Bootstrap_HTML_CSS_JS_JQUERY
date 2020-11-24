<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
  <head>
      
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/customerprofile/myproj.css">
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/proflie.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <style>

</style>
      <script type="text/javascript">
        
      var oldhead;
      function selectHead() {
  oldhead=document.getElementById("hid").value;
    document.getElementById("familyheadname").innerHTML =  ' <td class="f control-label" style="vertical-align: super" for="lable">Family Head:-</td> ' + 
    '<td  class=" control-label" name="" for="lable"><select style="width:13em" id="familyheadlbl" class="btn btn-default dropdown-toggle">' +
    
    <?php foreach($mydata3 as $mem){
        
        
        ?>
        
  '<option value="<?php echo $mem['username'];?>"><?php echo $mem['firstname'];echo " ";echo $mem['lastname'];?></option>' +
    <?php }?>
  '</select></td>';
  
    sel = document.getElementById('familyheadlbl');
     <?php foreach($mydata2 as $row21) { ?>
         
         for (i=0; i<sel.options.length; i++) {
		if (sel.options[i].value == '<?php echo $row21['username'];?>') {
			sel.selectedIndex = i;
                        document.getElementById('familyheadlbl').selectedIndex=i;
		}
	}
         
         <?php }?>
    
   // document.getElementById('familyheadlbl').selectedIndex=0;
 
 document.getElementById("editor").style.opacity="0"; 
 document.getElementById("editor").setAttribute('onclick',"");
   document.getElementById("header").style.opacity="0"; 
    document.getElementById("header").setAttribute('onclick',"");
   document.getElementById("homer").innerHTML='<span class="glyphicon glyphicon-check" style="background:white;color:black;border-radius: 25px;font-size:1.6em"></span>';
   document.getElementById("homer").setAttribute('onclick',"selectedHead()");        

}
      
      
       var newhead
      function selectedHead() {
            newhead= document.getElementById("familyheadlbl").options[document.getElementById("familyheadlbl").selectedIndex].value;

   
        jQuery.ajax({
type: "POST",
url: "<?php echo site_url('customerprofilecontroller/updatehead')?>",
dataType: 'json',
data: {oldh: oldhead, newh: newhead},
success: function(res) {

    document.getElementById("hid").value=newhead;
    
   document.getElementById("familyheadname").innerHTML = ' <td class="f control-label" style="vertical-align: super" for="lable">Family Head:-</td> <td id="familyheadlbl" class=" control-label" name="" for="lable">'+
                       
                        
                      document.getElementById("familyheadlbl").options[document.getElementById("familyheadlbl").selectedIndex].text+                       
                        
                   ' </td>';
 // document.getElementById("familyheadname").innerHTML =  '<label class="col-md-4 control-label" for="lable">Family Head</label><label id="familyheadlbl" class="col-md-4 control-label" for="lable">'+document.getElementById("familyheadlbl").options[document.getElementById("familyheadlbl").selectedIndex].text+'</label>'; 
    
        document.getElementById("homer").style.opacity="1"; 
        document.getElementById("editor").style.opacity="1";
        document.getElementById("editor").setAttribute('onclick',"location.href='<?php echo site_url('customerhomecontroller/rendertag'); ?>'");
        
        if(newhead!=oldhead)
        {
            document.getElementById("header").innerHTML='<span class="glyphicon glyphicon-stats text-center"></span>'; 
             document.getElementById("header").setAttribute('onclick',"location.href='<?php echo site_url('statanalysercontroller'); ?>'");
        document.getElementById("header").style.opacity="1";
        }
        else
        {
           document.getElementById("header").style.opacity="1"; 
           document.getElementById("header").setAttribute('onclick',"selectHead()");
        }
   
   
  document.getElementById("homer").innerHTML='<span class="glyphicon glyphicon-home text-center" style="border-radius: 25px;"></span';
  document.getElementById("homer").setAttribute('onclick',"location.href='<?php echo site_url('customerhomecontroller'); ?>'");
}

});
    
   
}

function handleTyping(e){
    handleTypingDelayed(e);
}

function handleTypingDelayed(e){

    var text = document.getElementById('hiddenfield').value;
    var stars = document.getElementById('hiddenfield').value.length;
    unicode = eval(unicode);
    var unicode=e.keyCode? e.keyCode : e.charCode;

    if ( (unicode >=65 && unicode <=90) 
            || (unicode >=97 && unicode <=122) 
                || (unicode >=48 && unicode <=57) ){
        text = text+String.fromCharCode(unicode);    
        stars += 1;
    }else{
        stars -= 1;
    }

    document.getElementById('hiddenfield').value = text;
    document.getElementById('field').value = generateStars(stars);
}

function generateStars(n){
    var stars = '';
    for (var i=0; i<=n;i++){
        stars += '*';
    }
    return stars;
}
      </script>
     
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body onload="handleTyping(event)">
  	

<div id="Maincontainer" class="container "  > 
    
<?php $this->load->view('slidermenu',$mega);?>  
    
<div id="TopBar" class="row text-center" >

<span id="SliderM" style="cursor: pointer;"class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
            <span  id="HomeButton">Customer Profile</span>

</div>


<div id="MiddleBar" class="row" style="word-wrap: break-word;" >
       
    <table style="table-layout: fixed; width: 100%">
                   <colgroup>   
                  <col class="col-md-4" style="width: 30%;">   
                  <col class="col-md-7" style="width: 70%;text-align: center ">   
              </colgroup> 
              <tbody>
                  <tr>
                      
                      <td style="vertical-align:super"><img class="style2" id="logo" src="/expensemanager/assets/imgs/person.jpg" /></td>
                      <td><?php foreach($mydata as $row) {?>
                <span class="style3"><?php echo $row['firstname'];echo"  ";echo $row['lastname'];?></span></td>
                  </tr>
                  
              </tbody>
                </table>
    
    
    
    
    
        <div class="form-horizontal style4 text-center">
            <fieldset >
                <table style="table-layout: fixed; width: 100%">
                   <colgroup>   
                  <col class="col-md-4" style="width: 33%;">   
                  <col class="col-md-7" style="width: 67%;text-align: center ">   
              </colgroup> 
              <tbody>
                  
                <tr >
                    <td class="f control-label " style="vertical-align: super;" for="lable">Birthday:- </td> 
                    <td class="control-label" for="lable"><?php echo date("d M Y", strtotime($row['dob']));?></td>
                </tr>
               
                
                 <tr >
                    <td class="f control-label" style="vertical-align: super" for="lable">Lives in:-</td>  
                    <td class=" control-label" for="lable"><?php echo $row['location'];echo ",";echo $row['state'];echo ",";echo $row['country'];?></td>
                </tr>
                <tr >
                    <td class="f control-label" style="vertical-align: super" for="lable">Family:-</td> 
                    <td class=" control-label" for="lable"><?php echo $row['family_name'];?></td>
                </tr>
                
                 <?php foreach($mydata2 as $row2) { ?>
                <input id="hid"type="hidden" value="<?php echo $row2['username'];?>">
                <tr id="familyheadname" >
                    <td class="f control-label" style="vertical-align: super" for="lable">Family Head:-</td> 
                   
                    
                     
                    <td id="familyheadlbl" class=" control-label" name="" for="lable">
                       
                        
                       <?php     echo $row2['firstname'];echo"  ";echo $row2['lastname'];
                         }?>
                        
                        
                    </td>
                </tr>
                <tr >
                    <td class="f control-label" style="vertical-align: super" for="lable">Family Count:-</td> 
                    <td class=" control-label" for="lable">
                        <?php foreach($mydata1 as $row1) { 
                        
                            echo $row1['fcount'];
                         }?>
                        
                    </td>
                </tr>
                <tr >
                    <td class="f control-label" style="vertical-align: super" for="lable">Email Id:-</td> 
                    <td class=" control-label" for="lable"><?php echo $row['username'];?></td>
                </tr>
                <tr >
                    <td class="f control-label" style="vertical-align: super"  for="lable">Password:-</td> 
                
                        
                        
                        
                    <td class=" control-label" >
                       
                        
                        <span>
                        <textarea disabled rows="<?php echo ceil(strlen(base64_decode ($row['password']))/18); ?>"  id="field" style="word-wrap: break-word;text-align:center !important;width:80%;border-radius: 5px"  >

</textarea>

<textarea rows="<?php echo ceil(strlen(base64_decode ($row['password']))/18); ?>"  id="hiddenfield"  style="display:none" >
<?php echo base64_decode ($row['password']);?>
</textarea>
                          <span class="glyphicon glyphicon-eye-open" style="cursor:pointer;top:-<?php echo 8 * ceil(strlen(base64_decode ($row['password']))/18)?>px "ontouchstart="document.getElementById('field').value=document.getElementById('hiddenfield').value" onmousedown="document.getElementById('field').value=document.getElementById('hiddenfield').value" onmouseup="handleTyping(event)"></span>
                    </span>
                        </td>
                </tr>
                
                
                
                
                
                </tbody>
               </table>
            </fieldset>
        </div>
  


</div>

    
<div id="BottomBar" class="row text-center" >
    
  <?php if($row['customertype']=="1"){?>
<div id="header" class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="selectHead()">
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
 <?php }
 else {
 
 ?>
     <div id="header" class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'" >
<span class="glyphicon glyphicon-stats text-center"></span>
</div>

     <?php
 
 } }?>  
    
<div id="homer"  class="myborder " style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;color:red" onclick="location.href='<?php echo site_url('customerhomecontroller'); ?>'">
<span class="glyphicon glyphicon-home text-center" ></span>
</div>

<div id="editor"  class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerprofilecontroller/editproflie'); ?>'">

<span class="glyphicon glyphicon-pencil text-center" style="border-radius: 25px;" ></span>

</div>

 
</div>


</div>




</body>
</html>
