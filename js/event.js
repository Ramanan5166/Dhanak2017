var currtime = new Date();
currtime.setDate(currtime.getDate() + 80);
setInterval(reveal, 100);
function reveal(){
    var currTime = new Date();
    currTime.getTime();
    var deadTime = new Date(2017,8,11,18,0,0);
    var currSec = Date.parse(currTime);
    var deadSec = Date.parse(deadTime);
    var left = deadSec - currSec;
    var d = document.getElementById("cover");
    var s = document.getElementById("screen");
    var t = document.getElementById("ltimer");
    t.innerHTML = "";
    left = Math.floor(left/1000);
    sec = left%60;
    left = Math.floor(left/60);
    min = left%60;
    left = Math.floor(left/60);
    hour = left%24;
    day = Math.floor(left/24);
    window.onload = open(day,hour,min,sec);
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
    t.innerHTML = hour+":"+min+":"+sec;
    if(day <= 0&& hour <= 0 && min<=0 && sec <=0){
        t.innerHTML = "We're ON";
    }
}
function open(day,hour,min,sec){
    var d = document.getElementById("cover");
      if(day <= 0&& hour <= 0 && min<=0 && sec <=-2){
            d.className = "open";
        }      
}
function logout() {
    document.cookie = "name=; expires="+currtime+"; path=/;";
    location.reload();
}
function signup(){    
    document.getElementById('id01').style.display='block';
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    login.style.display = 'none';
    sign.style.display = 'block';
}
function log(){
    document.getElementById('id01').style.display='block';
    document.getElementById('logmsg').style.display='none';
    var sign = document.getElementById('signup');
    var login = document.getElementById('login');
    var regi = document.getElementById('id02');
    login.style.display = 'block';
    sign.style.display = 'none';
    regi.style.display = 'none';
}
function login(){
    var name = document.getElementById('lname').value;
    var pass = document.getElementById('lpass').value;
    var response = "";
    var xmlhttp;
    if(name === ""){
        document.getElementById("error").innerHTML = "";
        return;
    }else {
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
        document.getElementById("error").innerHTML = "";
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
var ev = "";
function eve(e){
    ev = e;
    document.getElementById('id02').style.display = 'block';
}
function reg(){
    var response = "";
    var xmlhttp;
    if(ev === ""){
        document.getElementById("regmsg").innerHTML = "No input";
        return;
    }else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            response = this.responseText;
            if(response == "Login to continue"){
                document.getElementById('logmsg').style.display = 'block';
                
            }else{
                document.getElementById("regmsg").innerHTML = response;
        
            }
        }
    };
    xmlhttp.open("POST","reg.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("cat="+ev);
    }
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
    var regi = document.getElementById('id02');
    login.style.display = 'block';
    sign.style.display = 'none';
    regi.style.display = 'none';
    document.getElementById('id01').style.display='none';
		document.getElementById('logmsg').style.display='none';
	}
});
