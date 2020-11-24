
function SlideMyMenu(value,event)
{
    var sidebar=document.getElementById("MenuContainer");
    
    if(value==1)
    {  event.stopPropagation();
        sidebar.removeEventListener("transitionend", ontransend);
        document.getElementById("list").style.display="block";
        sidebar.style.width="80vw";
        sidebar.style.fontSize="160%";
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
