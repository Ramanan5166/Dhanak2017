setInterval(reveal, 100);
function timeon(){
    setInterval(function(){
        time();
        show();
    }, 100);
}
function reveal(){
    var currTime = new Date();
    currTime.getTime();
    var deadTime = new Date(2017,8,11,18,0,0);
    var currSec = Date.parse(currTime);
    var deadSec = Date.parse(deadTime);
    var left = deadSec - currSec;
    var d = document.getElementById("cover");
    var s = document.getElementById("screen");
    left = Math.floor(left/1000);
    sec = left%60;
    left = Math.floor(left/60);
    min = left%60;
    left = Math.floor(left/60);
    hour = left%24;
    day = Math.floor(left/24);
    window.onload = open(day,hour,min,sec);
//    if(day <= 0&& hour <= 0 && min<=0 && sec <=-2){
//        d.className = "open";
//        s.style.overflowX = "hidden";
//        s.style.overflowY = "scroll";
//    }
    if(day <= 0&& hour <= 0 && min<=0 && sec <=0){
        day = 0;
        hour = 0;
        min = 0;
        sec = 0;
    }
    day = (day<10)?"0"+day:day;
    hour = (hour<10)?"0"+hour:hour;
    min = (min<10)?"0"+min:min;
    sec = (sec<10)?"0"+sec:sec;
    if(day <= 0&& hour <= 0 && min<=0 && sec <=0){
        timeon();
    }
}
function open(day,hour,min,sec){
    var d = document.getElementById("cover");
    var s = document.getElementById("screen");
      if(day <= 0&& hour <= 0 && min<=0 && sec <=-2){
            d.className = "open";
            s.style.overflowX = "hidden";
            s.style.overflowY = "scroll";
        }      
}
function show(){
    var h = window.innerHeight;
    var s = document.getElementById("screen");
    if (s.scrollTop > h) {
        document.getElementById("tophome").style.display = "block";
        document.getElementById("nav").className = "w3-center black";
    } else {
        document.getElementById("tophome").style.display = "none";
        document.getElementById("nav").className = "w3-center transparent";
    }        
}
function time(){
    var currTime = new Date();
    currTime.getTime();
    var deadTime = new Date(2017,9,20,17,0,0);
    var currSec = Date.parse(currTime);
    var deadSec = Date.parse(deadTime);
    var left = deadSec - currSec;0
    var d = document.getElementById("days");
    var h = document.getElementById("hours");
    var m = document.getElementById("minutes");
    var s = document.getElementById("seconds");
    var t = document.getElementById("timer");
    var sec,min,hour,day;
    
    left = Math.floor(left/1000);
    sec = left%60;
    left = Math.floor(left/60);
    min = left%60;
    left = Math.floor(left/60);
    hour = left%24;
    day = Math.floor(left/24);
    if(day <= 0&& hour <= 0 && min<=0 && sec <=0){
        day = 0;
        hour = 0;
        min = 0;
        sec = 0;
        t.style.display = "none";
    }
    day = (day<10)?"0"+day:day;
    hour = (hour<10)?"0"+hour:hour;
    min = (min<10)?"0"+min:min;
    sec = (sec<10)?"0"+sec:sec;
    d.innerHTML = day;
    h.innerHTML = hour;
    m.innerHTML = min;
    s.innerHTML = sec;
}

function clk(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
var currtime = new Date();
currtime.setDate(currtime.getDate() + 80);
        
function logout(){
    document.cookie = "name="+name+"; expires="+currtime+"; path=/;";
    location.reload();
}
function signup(){
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    login.style.display = 'none';
    sign.style.display = 'block';
}
function log(){
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    login.style.display = 'block';
    sign.style.display = 'none';
}
function c(){
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    login.style.display = 'block';
    sign.style.display = 'none';
    document.getElementById('id01').style.display='none';
}
document.addEventListener("keydown",function(event){
	if(event.keyCode == 27){
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    login.style.display = 'block';
    sign.style.display = 'none';
    document.getElementById('id01').style.display='none';
	}
});
function login(){
    var name = document.getElementById('lname').value;
    var pass = document.getElementById('lpass').value;
    var response = "";
    var xmlhttp;
    if(name === ""){
        document.getElementById("error").innerHTML = "";
        return;
    }else{
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            response = this.responseText;
            if(response == "success"){
                document.cookie = "name="+name+"; expires="+currtime+"; path=/;";
                location.reload();
            }
            else{
                document.getElementById("error").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","login.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("name="+name+"&pass="+pass);
    }
}

function sign(){
    var name = document.getElementById('sname').value;
    var mail = document.getElementById('smail').value;
    var clg = document.getElementById('sclg').value;
    var pass = document.getElementById('spass').value;
    var response = "";
    var xmlhttp;
    if(name === ""){
        document.getElementById("signerr").innerHTML = "";
        return;
    }else{
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            response = this.responseText;
            if(response == "success"){
                location.reload();
                document.cookie = "name="+name+"; expires="+currtime+"; path=/;";
            }
            else{
                document.getElementById("signerr").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","signup.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("name="+name+"&pass="+pass+"&mail="+mail+"&clg="+clg);

    }
}