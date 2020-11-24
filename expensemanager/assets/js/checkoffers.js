
 var geocoder;
function SlideMyMenu(value,event)
{
    
    var sidebar=document.getElementById("MenuContainer");
    
    if(value==1)
    {  event.stopPropagation();
        sidebar.removeEventListener("transitionend", ontransend);
        document.getElementById("list").style.display="block";
        sidebar.style.width="12.5em";
        sidebar.style.fontSize="140%";
    }
    else if(value==2)
    {
        sidebar.addEventListener("transitionend",ontransend);
        sidebar.style.width="0%";
        sidebar.style.fontSize="6%";
    }
}

function  ontransend()
{
      document.getElementById("list").style.display="none";
}

function onload() {
    
    //document.getElementById("managebudgetform").style.display = "block";
    //document.getElementById("addbudgetform").style.display = "none";
    //document.getElementById("manualsearch").style.display = "none";
     errorFunction();
    
    geocoder = new google.maps.Geocoder();
}
/*
function addbudgetform() {
    document.getElementById("managebudgetform").style.display = "none";
    document.getElementById("addbudgetform").style.display = "block";
    document.getElementById("button1").innerHTML = "Add Budget";
}

function updatebudgetform() {
    document.getElementById("managebudgetform").style.display = "none";
    document.getElementById("addbudgetform").style.display = "block";
    document.getElementById("button1").innerHTML = "Update Budget";
}
*/
function save() {
    document.getElementById("managebudgetform").style.display = "block";
    document.getElementById("addbudgetform").style.display = "none";
}

function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}
 


 
  function codeLatLng(lat, lng) {
 
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
//            document.getElementById("buttondropdown1").innerHTML = "<option value=\"Searching\">Searching...</option>";
//    document.getElementById("buttondropdown1").disabled = true;
         
          var temp =results[0].formatted_address.split(',');
            
          // alert(temp);
            var v =temp[temp.length-2].trim().split(" ");
          //Country || //State  || //Locality
            //alert(temp[temp.length-1] + '||' +temp[temp.length-3] + '||'+v[0]); //Location
            locationtxt =  temp[temp.length-3]+ ','+ v[0] + ','+ ltrim(temp[temp.length-1]);
           // document.getElementById("locationbutt").innerHTML = "Location:-"+locationtxt;
    document.getElementById("buttondropdown1").innerHTML = "<option selected value='"+locationtxt+"'>"+locationtxt+"</option>";
    document.getElementById("buttondropdown1").disabled = true;
     document.getElementById("singlebutton").disabled=false;
    
            //alert("OK");
 
        } else {
         // alert("No results found");
         errorFunction();
         document.getElementById("singlebutton").disabled=false;
        }
      } else {
        //alert("Geocoder failed due to: " + status);
        //  alert("codeLatLng Failed");
           //document.getElementById("manualsearch").style.display = "block"
           errorFunction();
           document.getElementById("singlebutton").disabled=false;
      }
    });
  }
  
  
  String.prototype.ltrim = function() {
return this.replace(/^\s+/,"");
}

function ltrim(stringToTrim) {

 return stringToTrim.replace(/^\s+/,"");

}