



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


var checker=0;
function ShowItemsList(entry,event)
{
    event.preventDefault();
   // alert(event.currentTarget.className);
    
    if(event.target.className !="child")
    {
       
   if(checker % 2 == 0) 
   {
       
       document.getElementById(entry).style.display="inline";
       document.getElementById(entry.substring(0,entry.length)+'+').style.display="inline";
   }
    else 
    {
       
        document.getElementById(entry).style.display="none";
        document.getElementById(entry.substring(0,entry.length)+'+').style.display="none";
    }
    checker++;
    
    }
}


function HomeSwitch()
{ //alert(middle);
     document.getElementById("MiddleBar").innerHTML="";
    document.getElementById("MiddleBar").innerHTML=middle;
    document.getElementById('TopBar').innerHTML="";
      document.getElementById('TopBar').innerHTML=topper;
}




function RenderNotifications()
{
    loadData();
    document.getElementById("NotifyButton").style.border="5px solid blue";
    document.getElementById("NotifyButton").style.borderBottom="none";
    document.getElementById("HomeButton").style.border="none";
    
    var namelist=[ ];
    var ReminderList=[];
    var Entry="";
    var PreDIv= createHeader("Family Notice");
       
    
   
        
	var PostDiv =  createFooter();
	


    document.getElementById('MiddleBar').innerHTML=PreDIv+Entry+PostDiv;
    
    
    
PreDIv = createHeader("Daily Expense Reminders");
    
    Entry='<tbody id="notice">';;
    
    
   document.getElementById('MiddleBar').innerHTML+=PreDIv+Entry+PostDiv;
  
  document.getElementById('Family Notice').style.display="none";
	
}

function apply()
{
      //   alert(globalres);
    document.getElementById("notice").append(globalres);
    }


function createHeader(id)
{
    var Head= '<div id="'+id+'" class="col-sm-12 text-center" style="padding-top:10px">'+
'     <span class="glyphicon glyphicon-exclamation-sign"></span><span style="margin-left:0.8em">'+id+'</span>'+
'      <table class="table table-hover" style="table-layout:fixed">'+
'        <colgroup>'+
'          <col class="col-md-4" style="width: 5vw">'+
'          <col class="col-md-7" style="width: 7vw">'+
'        </colgroup>';
    
    return Head;
    
}

function createFooter()
{
 
    var Foot = '</tbody>'+
'      </table>'+
'  </div>';
    
    return Foot;
    
    
}
