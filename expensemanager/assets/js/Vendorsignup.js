
function viewmap() {
    document.getElementById("mapcontainer").style.display = "block";
    document.getElementById("locationbutt").innerHTML = "Select Location";
    //document.getElementById("googleMap").style.display = "block";
    
}



var map;
var markers = [];
var myCenter;
var geocoder;

function initialize()
{
    myCenter=new google.maps.LatLng(15.4989,73.8278);
     geocoder = new google.maps.Geocoder();
var mapProp = {
  center:myCenter,
  zoom:9,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
  });
    
}

function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
    deleteMarkers();
   markers.push(marker);
   // alert('Latitude: ' + location.lat() + 'Longitude: ' + location.lng() );
     codeLatLng(location.lat(), location.lng() );
 
 // infowindow.open(map,marker);
}
    function codeLatLng(lat, lng) {
 
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
      var locationtxt;
        if (results[1]) {
         
            
            //The name of the Place Extracted in the alert below eg:-Taligao
         //alert(results[0].formatted_address);
        var temp =results[0].formatted_address.split(',');
            
           
            var v =temp[temp.length-2].trim().split(" ");
          //Country || //State  || //Locality
            //alert(temp[temp.length-1] + '||' +temp[temp.length-3] + '||'+v[0]); //Location
            locationtxt =  temp[temp.length-3]+ ','+ v[0] + ','+ temp[temp.length-1];
            document.getElementById("locationbutt").innerHTML = "Location:-"+locationtxt;
      

         document.getElementById("city").value=temp[temp.length-3];
            document.getElementById("country").value=temp[temp.length-1];
            document.getElementById("state").value=v[0];

		
        document.getElementById("errordiv").innerHTML="";
        } else {
          //alert("No results found");
            
            document.getElementById("errordiv").innerHTML="No results found"+" Please Select another Location";
            document.getElementById("locationbutt").innerHTML = "Set Location:-";
        }
        
           //document.getElementById("googleMap").style.display = "none";
          
      } else {
     document.getElementById("errordiv").innerHTML="No results found"+" So Select another Location";
       document.getElementById("locationbutt").innerHTML = "Set Location:-";
      }
    });
  }
  
  
  
  
  
  function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
  
  
  