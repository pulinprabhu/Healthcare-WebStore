
function openWinHome() {
    window.open(href="http://localhost:63342/untitled1/src/Spitmeds.html?_ijt=f8s6739op6mogkdokoun35usai");
}
function alertforlogin() {
    window.alert("Login Successful")
}
function alertforlogin1() {
    window.alert("Login Unuccessful")
}
function verify() {
    var x=document.getElementsByClassName("uname1");
    var currvalue=x.value;
    var x=document.getElementsByClassName("psw1");
    var currpsw=x.value;
    if(currvalue=="SHANEY MANTRI" /*|| "abc123"*/ && currpsw=="11111")
    {
        alertforlogin();
    }
    else
    {
        alertforlogin1();
    }
}

    var i=0;
    var images=[];
    var time=2500;

    images[0]='images1.jpg';
    images[1]='images3.jpg';
window.onload=changeimage;
    function changeimage() {
        document.slide.src=images[i];
        if(i<images.length-1){
            i++;}
        else{
            i=0;
        }
        setTimeout("changeimage()", time);
    }


