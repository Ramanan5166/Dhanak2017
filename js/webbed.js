var currtime = new Date();
currtime.setDate(currtime.getDate() + 80);
function logout(){
    document.cookie = "wname="+name+"; expires="+currtime+"; path=/;";
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
    document.getElementById('rule').style.display='none';
    document.getElementById('leader').style.display='none';
	}
	if(event.keyCode == 13){
        verify();
    }
});
function login(){
     var type = 'log';
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
                document.cookie = "wname="+name+"; expires="+currtime+"; path=/;";
                location.reload();
            }
            else{
                document.getElementById("error").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","verify.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("type="+type+"&name="+name+"&pass="+pass);
    }
}
function sign(){
    var type = 'sign';
    var name = document.getElementById('sname').value;
    var mail = document.getElementById('smail').value;
    var tel = document.getElementById('stel').value;
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
                document.getElementById("signerr").innerHTML = "A verification email has been sent to your mail.Wait upto 10 minutes for the mail.";
            }
            else{
                document.getElementById("signerr").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","verify.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("type="+type+"&name="+name+"&pass="+pass+"&mail="+mail+"&clg="+clg+"&tel="+tel);

    }
}
function verify(){
    var type = 'verify';
    var ans = document.getElementById('ans').value;
    var xmlhttp;
    if(ans === ""){
        document.getElementById("result").innerHTML = "Enter a value";
        return;
    }else{
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            response = this.responseText;
            if(response == "success"){
                document.getElementById('result').innerHTML = "Success.Proceed to next level";
                document.getElementById('nxt').style.display = "inline-block";
                document.getElementById('submit').style.display = "none";
                document.getElementById('ans').style.display = "none";
            }
            else{
                document.getElementById("result").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","verify.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("type="+type+"&ans="+ans);
    }
}
function toggleFunction(){
    var tog = document.getElementById('nav');
    var ham = document.getElementById('ham');
    var game = document.getElementById('game');
    if(tog.className == "show"){
        tog.className = "hide";
        game.style.display = "block";
        ham.style.color = "#9B0000";
    }
    else{
        tog.className = "show";
        game.style.display = "none";
        ham.style.color = "white";
    }
}
setInterval(function(){
    document.getElementById('frame').src += '';
},15000);