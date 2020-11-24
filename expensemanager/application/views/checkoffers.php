<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/checkoffers/checkoffers.css" />
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/checkoffers.js"></script>
    <style>
table, th, td {
   
    border-collapse: collapse;
}
th, td { font-size:70% !important;
    padding: 2px;
}
th {background:greenyellow;font-size:0.9em}
</style>
    <script>
        
        
        function takeme(id)
        {
            
            y="<?php echo site_url("checkoffercontroller/viewofferdetails?offerid=")?>";
            
            y+=id;
            
            location.href=y;
        }
        
        
        if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);}

    function RenderSearch()
{
    //
    document.getElementById('tbodyholder').innerHTML="";
    loadData();

}

  function loadData(){
   // alert(loadType +"||"+);
   var search,box;
   var e = document.getElementById('buttondropdown1');

   var dropdwnplace=e.options[e.selectedIndex].text;
   
   var res1 = dropdwnplace.split(",");
    
    
    if(document.getElementById('all').checked)
    {
      search=document.getElementById('all').value;  
      box=""; 
    }
    else if(document.getElementById('tag').checked)
    {
        if($("input#tagtext").val() !="")
        {  search=document.getElementById('tag').value; 
        box= $("input#tagtext").val(); }
        else
        {
            document.getElementById('errordiv').innerHTML='Tag Name Cant Be Blank'; 
            return;
        }
        
    }
    else if(document.getElementById('vendor').checked)
    {
        if($("input#vendortext").val() !="")
        {
        search=document.getElementById('vendor').value; 
        box= $("input#vendortext").val(); }
        else
        {
            document.getElementById('errordiv').innerHTML='Vendor Name Cant Be Blank'; 
            return;
        }
    
    }
    else
    {
      document.getElementById('errordiv').innerHTML='Please Select Search Criteria'; 
      return;
    }

  
   
 // var dataString = 'city='+ res1[0]+',state='+res1[1]+',country='+res1[2]+',search='+search+',text='+box;
  //alert(dataString,dropdwnplace);
  
  //result='<tr><td>adasd</td><td>adaddas</td><td>adadasd</td></tr>';
  
//  $("#tbodyholder").append(result);
  
  
  $.ajax({
    type: "POST",
    url: "<?php echo site_url('checkoffercontroller/gettabledata');?>",
    data: {city: res1[0], state: res1[1],country : res1[2],search : search,text : box},
    cache: false,
    success: function(result){
     
     $("#tbodyholder").empty();
     if(result!="")
     { $("#tbodyholder").append(result);
      document.getElementById('tableid').style.visibility="visible";
      document.getElementById('errordiv').innerHTML=""; 
  }
  else
  {
       document.getElementById('errordiv').innerHTML="No Results Found"; 
  }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
       
    }  
 });
 
      
}


            function errorFunction(){
    //alert("Geocoder failed");
    //alert("errorFunction");
    var options = '<option value="none"><i>Select Location</i></option>' +
            
            <?php foreach($mydata as $dis) {  ?>
                  '<option value="<?php echo $dis['city'].",".$dis['state'].",".$dis['country']?>"><?php echo $dis['city'].",".$dis['state'].",".$dis['country']?></option>' +
                  
            <?php  } ?>
                
               '' ;
    document.getElementById("buttondropdown1").innerHTML = options;
    document.getElementById("buttondropdown1").disabled = false;
    document.getElementById("singlebutton").disabled = false; 
}
    </script>
    
</head>
<body onload="onload()">
    <div id="Maincontainer" class="container"> 
  
        <?php $this->load->view('slidermenu',$mega);?>
        
    <div id="TopBar" class="row text-center" >
        <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
        <span  id="HomeButton">Check  Daily Offers</span>
    </div>
    <div id="MiddleBar" class="row style1">
        <p></p>
        <div class="form-horizontal" >
        <fieldset >
            <div id="manualsearch" class="form-group">
            <label class="col-md-4 control-label" for="buttondropdown1">Select Location</label>
            <div class="col-md-4">
                <div id="style5" class="input-group">
                    <select  style="width:100%" id="buttondropdown1" class="btn btn-default dropdown-toggle">
                    <option value="none">Select Location</option>
                    </select>    
                    
                </div>
            </div>
            </div>
            <div class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="input-group style3">
                        <span class="input-group-addon">     
                        <input  type="radio" checked value="all" name="search" id="all"><span class="style2">All Offers</span>     
                        </span>
                        <!--<input id="prependedcheckbox" name="prependedcheckbox" class="form-control" type="text" placeholder="Vendor Name">-->
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">     
                            <input   type="radio"  value="tag"  name="search" id="tag"><span class="style2">By Tag&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>     
                        </span>
                        <input  id="tagtext" class="form-control" type="text" placeholder="Tag Name">
                    </div>
                     <div class="input-group">
                        <span class="input-group-addon">     
                            <input   type="radio" value="vendor"  name="search" id="vendor"><span class="style2">By Vendor</span>     
                        </span>
                        <input  id="vendortext" class="form-control" type="text" placeholder="Vendor Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 style4" style="padding-left: 43%;">
                    <button disabled id="singlebutton"  class="btn btn-primary" onclick="RenderSearch()">Search</button>
                </div>
            </div>
            
            
            
            <table id="tableid" class="table table-hover table-curved text-left" style="visibility: hidden;table-layout: fixed">  
              
                <tbody id="tbodyholder">
                    
                </tbody>
                
            </table>
            <div style="width:100%;text-align: center">
            <label id="errordiv" style="color:red;font-size: 0.8em"></label>
            </div>
            
            
            
            
            
        </fieldset>
        </div>
    </div>
 
        
        
        <div id="BottomBar" class="row text-center">
    <div onclick="location.href='<?php echo site_url('statanalysercontroller'); ?>'" class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;">
        <span class="glyphicon glyphicon-stats text-center"></span>
    </div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller'); ?>'">
        <span class="glyphicon glyphicon-home" style="color:red;border-radius: 25px;"></span></div>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="location.href='<?php echo site_url('customerhomecontroller/rendertag'); ?>'">
        <span class="glyphicon glyphicon-tags"></span>
    </div>
</div>
        
        
    </div>
</body>
</html>
