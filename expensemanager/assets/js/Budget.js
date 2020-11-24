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
    document.getElementById("managebudgetform").style.display = "block";
    document.getElementById("addbudgetform").style.display = "none";
}

function addbudgetform() {
    document.getElementById("managebudgetform").style.display = "none";
    document.getElementById("addbudgetform").style.display = "block";
    document.getElementById("button1").innerHTML = "Add Budget";
    document.getElementById('errordiv').innerHTML="";
}

function updatebudgetform() {
    document.getElementById("managebudgetform").style.display = "none";
    document.getElementById("addbudgetform").style.display = "block";
    document.getElementById("button1").innerHTML = "Update Budget";
    document.getElementById('errordiv').innerHTML="";
    
}

function save() {
    document.getElementById("managebudgetform").style.display = "block";
    document.getElementById("addbudgetform").style.display = "none";
}