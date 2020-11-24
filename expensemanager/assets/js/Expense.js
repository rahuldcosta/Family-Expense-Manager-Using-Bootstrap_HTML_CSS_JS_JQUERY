




function dateon()
{
    document.getElementById("customdate").style.visibility="visible";
}

function Activechanger(a,choice)
{
    
   var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    
         if(a=='body')
         {
             document.getElementById("customdate").style.visibility="hidden";
       var today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("setdate").value = today;
        document.getElementById("customdate").name = today;
        document.getElementById("enderdate").value = today;
        
         }
         else
         {
          var list= document.getElementsByClassName("day");
        
          for(i=0;i< list.length;i++)
          {
           list.item(i).setAttribute("class","day");   
          }
          
         a.setAttribute("class","day active"); 
    
    if(choice == "c") 
    {
        document.getElementById("customdate").style.visibility="visible";
       // var today = yyyy+'-'+mm+'-'+dd;
       document.getElementById("customdate").name = "c_date";
        document.getElementById("setdate").name = "";
    }
    else if(choice == "t") 
    {
       document.getElementById("customdate").style.visibility="hidden";
       var today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("setdate").value = today;
        document.getElementById("setdate").name = "c_date";
        document.getElementById("customdate").name = "";
   }
   else if(choice == "y") 
    {
       document.getElementById("customdate").style.visibility="hidden";
       dd = ""+(today.getDate()-1);
       if(dd.length==1) dd="0"+dd;
       var today = yyyy+'-'+mm+'-'+dd;
       document.getElementById("setdate").value = today;
       document.getElementById("setdate").name = "c_date";
       document.getElementById("customdate").name = "";
   }
         }         
      
}


function DisplayEndDateList()
{
    
    var e = document.getElementById("Repeatddl");
   
    var Text = e.options[e.selectedIndex].value;
    
    if(Text =="0")
       {
        document.getElementById("Enddl").style.visibility="hidden";
            document.getElementById("Thedate").style.visibility="hidden";
           
       }
    else{
         document.getElementById("Enddl").style.visibility="visible";
         var ex = document.getElementById("Enddl");
        ex.selectedIndex=0;
    }
}

function showdateinput()
{
    var e = document.getElementById("Enddl");
     
    var Text = e.options[e.selectedIndex].value;
    if(Text =="0")
       {
        document.getElementById("Thedate").style.visibility="hidden";
       }
    else{
         document.getElementById("Thedate").style.visibility="visible";
    }
    
}



function createHeader(id)
{
    var Head= '<div id="'+id+'" class="col-sm-6" style="padding-top:10px">'+
'     <span class="glyphicon glyphicon-exclamation-sign"></span><span style="margin-left:0.8em">Your Requests</span>'+
'      <table class="table table-hover">'+
'        <colgroup>'+
'          <col class="col-md-4" style="width: 5vw">'+
'          <col class="col-md-7" style="width: 7vw">'+
'        </colgroup>'+
'        <tbody>';
    
    return Head;
    
}

function createFooter()
{
 
    var Foot = '</tbody>'+
'      </table>'+
'  </div>';
    
    return Foot;
    
    
}




function SlideMyMenu(value,event)
{
    var sidebar=document.getElementById("MenuContainer");
    
    if(value==1)
    {  
        event.stopPropagation();
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


function RenderHome()
{
    var heading = '<span id="SliderM"class="text-center glyphicon glyphicon-list "  onclick="SlideMyMenu(1,event)"></span>'+
'<span  id="HomeButton"  onclick="RenderHome()">Home</span>'+
'<span id="NotifyButton" style="position:relative;width:53.3333%;float:left;cursor:pointer" onclick="RenderNotifications()">Notifications<span id="NotfiyCount"class="badge" >2</span></span>';
	
document.getElementById("TopBar").innerHTML=heading;
     document.getElementById('MiddleBar').innerHTML="";
     document.getElementById("HomeButton").style.border="5px solid blue";
    document.getElementById("HomeButton").style.borderBottom="none";
    document.getElementById("HomeButton").style.borderLeft="none";
    document.getElementById("NotifyButton").style.border="none";
    
    
    

    
    //////////////////////////////////////////////////
    var report2darray=[[]];
    report2darray[0]=["Planned","1,500.00"];
    report2darray[1]=["Today","400.00"];
    report2darray[2]=["March 29,2015","200.00"];
    report2darray[3]=["March 28,2015","500.00"];
    report2darray[4]=["March 26,2015","50.00"];
    
    var itemandamount2darray=[[]];
    itemandamount2darray[0]=["Vegetables","450.00"];
    itemandamount2darray[1]=["Education","350.00"];
    itemandamount2darray[2]=["Cleaning","150.00"];
    var Entry="";
    
var PreDiv = createdetailsHeader("ExpenseReportList");
    
    for(cnt=0;cnt<report2darray.length;cnt++)
{
    //----tr start
Entry += '<tr class="Homeitem " onclick="ShowItemsList(\'entry'+(cnt)+'0\')">';
     
    var icon="";
    for(m=0;m<2;m++)
    {
        if(m==0) icon='<span class="glyphicon glyphicon-bookmark" style="color:red;">';
        if(m==1) icon='<i class="fa fa-inr"></i>';
        
        Entry +='<td > <span >'+icon+'</span>'+
'      <span  style="color:blue;margin-left:0.8em">'+report2darray[cnt][m]+'</span>'+
'            '+
'            <div id="entry'+cnt+''+m+'" class="itemlist" style="width:100%;font-size:0.9em">'+
'            <ul class="list-group" style="width:100%">';
        m==0 ? icon="":0;
        for(i=itemandamount2darray.length-1;i>=0;i--)
    {
    Entry+='<li class="list-group-item"><span >'+icon+itemandamount2darray[i][m]+'</span> </li>';
    }
        
        
        Entry+=   
'</ul>'+
'              </div>'+
'            '+
'            </span>'+
'              </td>';
        
    }
    

 //----tr end    
  Entry+= '</tr>';
	
}
    
    
    var PostDiv =createFooter();
	
document.getElementById('MiddleBar').innerHTML+=PreDiv+Entry+PostDiv;
    /////////////////////////////////////////////////
}

var checker=0;
function ShowItemsList(entry)
{
    
   if(checker % 2 == 0) 
   {
       document.getElementById(entry).style.display="inline";
       document.getElementById(entry.substring(0,entry.length-1)+'1').style.display="inline";
   }
    else 
    {
        document.getElementById(entry).style.display="none";
        document.getElementById(entry.substring(0,entry.length-1)+'1').style.display="none";
    }
    checker++;
    
}




function createdetailsHeader(id){
    
 var cdh = '<div id="'+id+'" class="col-sm-12" style="width:100%;padding-top:10px"> '+
'    <div style="margin-left:0.8em;font-size:0.7em;width:100%;text-align:center">Jan 15,2015 <i class="fa fa-arrows-h"></i> Feb 15,2015</div>'+
'     <table class="table table-hover table-curved">'+
'       <colgroup>'+
'         <col class="col-md-4" style="width: 60%">'+
'           <col class="col-md-7" style="width: 40%">'+
'         </colgroup>'+
'        <tbody>';
    
    return cdh;
}


function RenderTag(ev)
{
    if(ev.target.classList=="glyphicon glyphicon-home")
    {   
         ev.target.setAttribute("class","glyphicon glyphicon-tags");
        RenderHome(); }
    else if(ev.target.classList=="glyphicon glyphicon-tags")
    {
        ev.target.setAttribute("class","glyphicon glyphicon-home");
    document.getElementById('MiddleBar').innerHTML="";
    
var heading = '<span id="SliderM"class="text-center glyphicon glyphicon-list "  onclick="SlideMyMenu(1,event)"></span>'+
'<span  id="TagButton" style="float:left;margin-left:1.5em" >You Item Tags</span>'+
'<span class="glyphicon glyphicon-tags" style="margin:auto;margin-top:0.2em"></span>';
	
    document.getElementById("TopBar").innerHTML=heading;
    
    var tag2darray=[[]];
    tag2darray[0]=["Vegetables","600.00"];
    tag2darray[1]=["pay pIgme","111.00"];
    tag2darray[2]=["Education","486.00"];
    tag2darray[3]=["Bill Pays","99.00"];
    tag2darray[4]=["Dinner","450.00"];
    
    var dateandamount2darray=[[]];
    dateandamount2darray[0]=["March 21,2015","450.00"];
    dateandamount2darray[1]=["March 22,2015","350.00"];
    dateandamount2darray[2]=["March 21,2015","150.00"];
    var Entry="";
    
var PreDiv = createdetailsHeader("TagList");
    
    for(cnt=0;cnt<tag2darray.length;cnt++)
{
    //----tr start
Entry += '<tr class="Homeitem " onclick="ShowItemsList(\'entry'+(cnt)+'0\')">';
     
    var icon="";
    for(m=0;m<2;m++)
    {
        if(m==0) icon='<span class="glyphicon glyphicon-bookmark" style="color:red;">';
        if(m==1) icon='<i class="fa fa-inr"></i>';
        
        Entry +='<td > <span >'+icon+'</span>'+
'      <span  style="color:blue;margin-left:0.8em">'+tag2darray[cnt][m]+'</span>'+
'            '+
'            <div id="entry'+cnt+''+m+'" class="itemlist" style="width:100%;font-size:0.9em">'+
'            <ul class="list-group" style="width:100%">';
        m==0 ? icon="":0;
        for(i=dateandamount2darray.length-1;i>=0;i--)
    {
    Entry+='<li class="list-group-item"><span >'+icon+dateandamount2darray[i][m]+'</span> </li>';
    }
        
        
        Entry+=   
'</ul>'+
'              </div>'+
'            '+
'            </span>'+
'              </td>';
        
    }
    

 //----tr end    
  Entry+= '</tr>';
	
}
    
    
    var PostDiv =createFooter();
	
document.getElementById('MiddleBar').innerHTML+=PreDiv+Entry+PostDiv;
    
        
    }
}

