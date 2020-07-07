function addimage() {
    var x=document.getElementById("maleradio").checked;
    var y=document.getElementById("femaleradio").checked;
    if(x==true)
    {document.getElementById("genderimage").src="loginmale.png";}
    else if(y==true)
    {
        document.getElementById("genderimage").src="loginfemale.png";
    }
}
function openWinHome() {
    window.open(href="http://localhost:63342/untitled1/src/Spitmeds.html?_ijt=f8s6739op6mogkdokoun35usai");
}


function alertforlogin() {
    window.alert("Are you sure to Register?")
}