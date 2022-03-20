<?php
    //error_reporting(0);
    require "connect.php";
    if(isset($_COOKIE['wname'])){
        $name = $_COOKIE['wname'];
        $check = $db->query("SELECT * FROM webbed_reg WHERE Name = '".$name."'");
        if(!$check->num_rows){
            setcookie("name", "", time() + (86400 * 80), "/");
            $name = "";
        }
    }
    else{
        setcookie("wname", "", time() + (86400 * 80), "/");
        $name = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Webbed | Dhanak 2017</title>
    <link rel="icon" type="image/png" href="image/dlogo.png">
    <link rel="stylesheet" type="text/css" href="css/webbed.css">
    <script src="js/webbed.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex">
</head>
<body>
<div id="id01" class="model">
       <div id="login"  class="model-content animate"  <?php 
         if(isset($_COOKIE['name'])){
             if($_COOKIE['name']!=""){
                 echo("style='display: none'");
            }
         }
         ?>>
        <div class="cont">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div><label for="name">Name</label>
                <input type="text" id="lname" name="name" required>
            </div>
            <div>
                <label for="pass">Password</label>
                <input type="password" id="lpass" name="pass" required>
            </div>
            <span><b>Not signed up yet? </b></span><span onClick="signup()" style="cursor: pointer;text-decoration:underline;padding: 0 10px;">Create an account</span>
                <p id="error"></p>
                <button type="submit" onClick="login()" id="logbutton">Login</button>
           </div>
        </div>  

    <div id="signup" class="model-content animate" style="display:none">
            <div class="cont">
                <div class="imgcontainer">
                  <span onClick="c()" class="close" title="Close Modal">&times;</span>
                  <img src="img_avatar2.png" alt="Avatar" class="avatar">
                </div>
                <div id="ls">
                <button id="logshift" onClick="log()" style="cursor: pointer">Existing User?</button>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="sname" name="name" required>
                </div>
                <div>
                    <label for="tel">Phone</label>
                    <input type="tel" id="stel" name="tel" required>
                </div>
                <div>
                    <label for="mail">Email</label>
                    <input type="text" id="smail" name="mail" required>
                </div>
                <div>
                    <label for="clg">College</label>
                    <input type="text" id="sclg" name="clg" required>
                </div>
                <div>
                    <label for="pass">Password</label>
                    <input type="password" id="spass" name="pass" required>
                </div>
                <p id="signerr"></p>
                <button type="submit" onClick="sign()" id="logbutton">Submit</button>
            </div>
        </div>
    </div>
<div id="id03" class="model">
       <div class="model-content animate">
        <div class="cont">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id03').style.display='none';document.getElementById('regmsg').innerHTML = '';" class="close" title="Close">&times;</span>
            </div>
            <h3>Welcome <?php echo($_COOKIE['wname']);?>.</h3>
            <h3>Do you want to logout?</h3>
            <button class="logoutbtn" onClick="logout()">Logout</button>
           </div>
    </div>
</div>
<div id="rule" class="model">
    <div class="model-content rule">
        <div class="cont">
            <div class="imgcontainer">
                <span onclick="document.getElementById('rule').style.display='none'" class="close" title="Close">&times;</span>
            </div>
    <ol>
        <li>Your mission is to navigate from one webpage to another, using all of the information available on it. You may need more than just a mouse and a keyboard for accomplishing your tasks.</li>
        <li>There will be 20 levels in all, and the one clearing the 20th level before everybody else wins. </li>
        <li>There is no limit to the number of attempts to a level.</li>
        <li>All answers are in lowercase letters of the English alphabet. No special characters like spaces, punctuation marks, etc are allowed. Test-190, for example, must be entered as testoneninezero.</li>
        <li>Enter full names for all answers, unless specified otherwise. However, for names of persons, only the first name and last name would suffice.</li>
        <li>Hints would be provided on the Webbed Facebook page.</li>
        <li>You will need to have a valid school/college ID to claim the prizes.</li>
        <li>This is a single-player event. Those playing in groups will be discouraged and disqualified.</li>
        <li>Do not share hints and answers on any platform. In case noticed, you will be banned.</li>
        <li>Mods are Gods, and security breaches will be dealt with severely.</li>
    </ol>
           </div>
    </div>
</div>
<div id='play'>   
    <?php
    if(isset($_COOKIE['wname'])){
        $name = $_COOKIE['wname'];
        if(!empty($name)){

    ?>
    <a id="ham" href="javascript:void(0)" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <?php
        }
    }
    ?>
<div id="nav"    <?php
    if(isset($_COOKIE['wname'])){
        $name = $_COOKIE['wname'];
        if(!empty($name)){
            echo(" class='hide'");
        }
    }
    ?>
>

    <ul>
        <li onclick="document.getElementById('rule').style.display = 'block'">Rules</li>
        <div class="ul"></div>
        <li onClick="document.getElementById('leader').style.display = 'block'">Leaderboard</li>
        <div class="ul"></div>
        <li><a target="_blank" href="https://www.facebook.com/iistwebbed/">Hints</a></li>
        <li <?php
     if(isset($_COOKIE['wname'])){
       if($_COOKIE['wname']==""){
         echo("style='display: none'");
      }
     }
     else{
       echo("style='display: none'");
     }
     ?>><button onClick="logout()" class="logoutbtn">Logout</button>
</li>
        
        
    <?php
    if(isset($_COOKIE['wname'])){
        $name = $_COOKIE['wname'];
        if(!empty($name)){}
        else{?>

    <button onclick="document.getElementById('id01').style.display='block'" id="loginbut">Login</button>
    <?php
        }
    }
        else{
    ?>
        <button onclick="document.getElementById('id01').style.display='block'" id="loginbut">Login</button>
    <?php
        }
?>

    </ul>
</div>
    <div id="game">
<?php
    if(isset($_COOKIE['wname'])){
        $name = $_COOKIE['wname'];
        if(!empty($name)){
            $get = $db->query("SELECT * FROM webbed_reg WHERE Name = '".$name."'");
            $no = mysqli_fetch_assoc($get);
            $level = $no['Level'];
            $img = $db->query("SELECT * FROM level WHERE Level = '".$level."'");
            if($img->num_rows){
                $i = mysqli_fetch_assoc($img);
                echo ("<h1>Level ".$level."</h1>");
                echo ("<img src=".$i['src']. " alt='Level ".$level."' id='pic'><br>");
                echo("<input type='text' id='ans'>");
                echo('<input type="submit" id="submit" value="Submit" onclick="verify()">');
                echo('<p id="result"></p>');
                echo('<button onclick="location.reload()" id="nxt" style="display:none">Proceed</button> '); 
            }
            else{
                echo("<p id='result'>We have a WINNER</p>");
            }
        }
    }
    ?>
        </div>
</div>
<div id="leader" class="model">
    <div id="animate">
            <div class="imgcontainer">
                <span onclick="document.getElementById('leader').style.display='none'" class="close" title="Close">&times;</span>
        </div>
        <iframe src="leader.php" id="frame"></iframe>
    </div>
</div>
</body>
</html>