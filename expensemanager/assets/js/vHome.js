



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
       document.getElementById(entry+"+").style.display="inline";
   }
    else 
    {
       
        document.getElementById(entry).style.display="none";
        document.getElementById(entry+"+").style.display="none";
    }
    checker++;
    
    }
}




