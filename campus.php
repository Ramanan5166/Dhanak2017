<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Campus Ambassador | Dhanak 2017</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="icon" type="image/png" href="image/dlogo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ca.css" type="text/css">
    <script src="js/jquery-3.2.1.min.js"></script> 
<script>
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function sign(){
    var name = document.getElementById('name').value;
    var mail = document.getElementById('mail').value;
    var clg = document.getElementById('clg').value;
    var branch = document.getElementById('branch').value;
    var tel = document.getElementById('contact').value;
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
                alert("Thank you for registering");
                location.reload();
            }
            else{
                document.getElementById("error").innerHTML = response;
            }

        }
    };
    xmlhttp.open("POST","ca.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("name="+name+"&tel="+tel+"&mail="+mail+"&clg="+clg+"&branch="+branch);

    }
}    
</script>
</head>

<body>

<div id="id01" class="model">
     <div id="login"  class="model-content animate">
        <div class="cont">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div><label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php if(isset($_COOKIE['name'])){ echo($_COOKIE['name']);}?>" required>
            </div>
            <div>
                <label for="clg">College</label>
                <input type="text" id="clg" name="clg" required>
            </div>
            <div>
                <label for="branch">Branch</label>
                <input type="text" id="branch" name="branch" required>
            </div>
            <div>
                <label for="mail">Email</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div>
                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" name="contact" required>
            </div>
                <p id="error"></p>
                <button type="submit" onClick="sign()" id="logbutton">Login</button>
           </div>
        </div>  
    </div>
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-white w3-hide-medium w3-hide-large w3-left" href="javascript:void(0)" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="nav" class="w3-center transparent w3-hide-small">
        <ul>
			<li><a class="icon fa-home" href="index.php"><span>Home</span></a></li>
            <li><a class="icon fa-calendar" target="_blank" href="event.php"><span>Events</span></a></li>
            <li><a class="icon fa-headphones" target="_blank" href="proshow.html"><span>ProNight</span></a></li>
            <li><a class="icon fa-paper-plane" target="_blank" href="work.html"><span>Workshops</span></a></li>
            <li><a href="hospi.html" target="_blank" class="icon fa-handshake-o"><span>Hospitality</span></a></li>
            <li><a class="icon fa-child" target="_blank" href="sc.html"><span>Social Cause</span></a></li>
            <li><a class="icon fa-user-o" href="campus.php"><span>Campus Ambassador</span></a></li>
        </ul>
	</nav>
	
  </div>
 <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium" >
    <button class="w3-button nav-pills" onclick="toggleFunction()">Close</button>
    <a href="index.php" class="w3-button nav-pills" onclick="toggleFunction()">Home</a>
    <a href="event.php" target="_blank" class="w3-button nav-pills" onclick="toggleFunction()">Events</a>
    <a href="proshow.html" target="_blank" target="_blank" class="w3-button nav-pills" onclick="toggleFunction()">Pronight</a>
    <a href="work.html" target="_blank" class="w3-button nav-pills"  onclick="toggleFunction()">Workshops</a>
	<a href="hospi.html" target="_blank" class="w3-button nav-pills" onclick="toggleFunction()">Hospitality</a>
	<a href="sc.html" target="_blank" class=" w3-button nav-pills" onclick="toggleFunction()">Social Cause</a>
	<a href="campus.php" class=" w3-button nav-pills" onclick="toggleFunction()">Campus Ambassador</a>
  </div>

</div>    
<!--<button onclick="document.getElementById('id01').style.display='block'" id="loginbut">Register</button>    -->
<div class="bgpic"></div>
<div class="body">
<h1>Campus Ambassador</h1>
<p>
Campus Ambassadors (henceforth the ‘CA’s), will act as representatives of Dhanak 2017 in their respective campuses and will have to share and circulate the posters, brochures and pamphlets forwarded by us within their institute. They will be shouldering the responsibility of ensuring maximum participation from their institute in both the online and offline events of Dhanak.</p>

<h3>Perks of being the CA</h3>
<p>    
    Apart from the mandatory CA certificate from IIST, which shall unambiguously make one stand out when it comes to campus recruitments and job interviews, the CAs shall be bestowed upon with certain other privileges. In our efforts of ensuring equity, we have classified them into two categories.</p>
<ol>
<li>For colleges within Kerala.</li>
    <p>If the campus ambassador succeeds in bringing:</p>
<ul><li>8+ students including CA – one Dhanak 2017 T shirt and certificate.</li>
<li>13+students including CA – one Dhanak 2017 T shirt + certificate + free accommodation for CA</li>
<li>18+ students including CA - one Dhanak 2017 T shirt + certificate + free accommodation for CA + one pro show ticket.</li></ul><br>

<li>For colleges outside Kerala.</li>
    <p>If the campus ambassador succeeds in bringing:</p>
<ul>
    <li>6+ students including CA  certificate + one Dhanak 2017 T shirt</li>
<li>10+ students including CA  certificate + one Dhanak 2017 T shirt + accommodation for CA + one pro show ticket.<br></li>
    <li>15+ students including CA  certificate + one Dhanak 2017 T shirt + accommodation for two person+ two pro show ticket.</li>
</ul><br>
</ol>
<p>
Application of CA from different departments of same college is also accepted.<br>
    A disclaimer though. The activities of the campus ambassadors shall be monitored and these benefits shall be applicable iff one has registered within time and has been working honestly with us.</p> 
    <br>
    <h3>Last date of applying for campus ambassador - October 15th 2017</h3>
    <h4>You can also send your entries to iist.publicity@gmail.com</h4>
    <br>
    <h2>Contact</h2>
    <p>Arun Krishna<br>8281755570</p>
</div>
</body>
</html>
