<?php
    error_reporting(0);
    require "connect.php";
    $name = $_COOKIE['name'];
    $check = $db->query("SELECT * FROM login WHERE Name = '".$name."'");
    if(!$check->num_rows){
        setcookie("name", "", time() + (86400 * 80), "/");
    }

?>
<!DOCTYPE html>
<html>
<head>
<title>Events | Dhanak 2017</title>
	 <script src="jquery-3.2.1.min.js"></script> 
     <link rel="icon" type="image/png" href="image/dlogo.png">
	 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css" />
   	 <link rel="stylesheet" href="css/events.css" />
   	 <link rel="stylesheet" href="css/button.css" />   	 
	 <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
     <script src="js/event.js" type="text/javascript"></script>
     <script src="js/ripple-effect.js"></script>
	 <meta name="viewport" content="width=device-width" />
     <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
<div id="cover" class="closed">
    <img id="clogo" src="dlogo.png">
    <h2 id="ltimer"></h2>
</div>
<div id="log">
        <button onclick="document.getElementById('id01').style.display='block'" id="loginbut"
        <?php 
		 if(isset($_COOKIE['name'])){
			 if($_COOKIE['name']!=""){
				 echo("style='display: none'");
		 	}
		 }
		 ?>>Login</button>
        
        <div id="logged" <?php
		 if(isset($_COOKIE['name'])){
			 if($_COOKIE['name']==""){
				 echo("style='display: none'");
			}
		 }
		 else{
			 echo("style='display: none'");
		 }
		 ?>>
            <button onClick="document.getElementById('id03').style.display='block'" class="logoutbtn">Logout</button>
	</div>

</div>

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
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div><label for="name">Name</label>
                <input type="text" id="lname" name="name" required>
            </div>
            <div>
                <label for="pass">Password</label>
                <input type="password" id="lpass" name="pass" required>
            </div>
            <span><b>Not signed up yet? </b></span><span onClick="signup()" style="cursor: pointer;text-decoration:underline">Create an account</span>
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
                    <label for="mail">Phone</label>
                    <input type="tel" id="smail" name="mail" required>
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
<div id="id02" class="model">
       <div class="model-content animate"  id="regcont"> 
        <div class="cont">
            <div class="imgcontainer">
              <span onclick="document.getElementById('logmsg').style.display='none';document.getElementById('id02').style.display='none';document.getElementById('regmsg').innerHTML = '';" class="close" title="Close Modal">&times;</span>
            </div>
            <h3>Do you want to register for this event?</h3>
            <h5>Note that for group events,one registration is sufficient.</h5>
            <button id="regbtn" onClick="reg()">Register</button>
            <p id="regmsg"></p>
            <p id="logmsg">You are not logged in. <span style="cursor:pointer;text-decoration:underline" onclick="log()">Click here to login</span></p>
           </div>
    </div>
</div>
<div id="id03" class="model">
       <div class="model-content animate">
        <div class="cont">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id03').style.display='none';document.getElementById('regmsg').innerHTML = '';" class="close" title="Close Modal">&times;</span>
            </div>
            <h3>Welcome <?php echo($_COOKIE['name']);?>.</h3>
            <h3>Do you want to logout?</h3>
            <button class="logoutbtn" onClick="logout()">Logout</button>
           </div>
    </div>
</div>

    <div class="container custom_container">
    <div class="row custom_row" >

        <div class="navtab">      
                <button type="button" class="btn btn-danger btn-lg close_button" >
                 <span class="glyphicon glyphicon-remove"></span>Close 
                </button>
                <button class=" btn btn-primary tablinks active" data-tab="Tab1">Music</button>       
                <button class=" btn btn-primary tablinks" data-tab="Tab2">Dance</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab3">Theatrical<br>Arts</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab4">Quiz</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab5">Literary</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab6">Arts</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab7">Informals</button>
                <button class=" btn btn-primary tablinks" data-tab="Tab8">Online</button>
            </div>
        </div>
      <div class="main">
            <div id="Tab1" class="tabcontent" style="display: block;">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>MUSIC
                    </h1>
                </header>
                <div class="tab" >
                <div class=" btn btn-primary active link" style="cursor: default;">
                    <div class="jumbo"> 
                        <img src="image/Events/Music/musicico.png" class="eventico" alt="Music">
                        <h3>Music</h3>
                        <div class="ul"></div>
                    </div>
                        <ul class="collapse" id="music">
                            <li><a href="#solo_singing">Solo Singing</a></li>
                            <li><a href="#duet_singing">Duet Singing</a></li>
                            <li><a href="#battle_of_bands">Battle of Bands</a></li>
                        </ul>

                </div>        
               </div>
                <div class="abc">
                    <div class="def" id="solo_singing">
                        <a>
                            <img src="image/Events/Music/solo%20sing.jpg" >
                        </a>
    <!--                    w3-button w3-xlarge w3-circle w3-black reg-->
                        <a  class="reg" >
                        +
                        </a>  
                        <!--<a class="text" data-toggle="modal" data-target="#solo_singing_modal" style="cursor: pointer;">
                            <h1><span class="span_text" >Solo Singing</span></h1>
                        </a>-->
                        <div class="text desktop_text" style="width: 100%;">
							<h1><span  class="span_text">Solo Singing</span></h1>  
                        	<div style="width: 100%;">  
                        	                    	
                        	<a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('solo_singing')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                        	
							</div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
							<h1><span  class="span_text">Solo Singing</span></h1>  
                        	<div style="width: 100%;">  
                        	                    	
                        	<a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#solo_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                        	
                        	<a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('solo_singing')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                        	
							</div>
                        </div>
                    </div>

                    <div class=" def" id="duet_singing">

                <a>
                        <img src="image/Events/Music/duet%20sing.jpg" >
                    </a>

                <a  class="reg">
                    +
                </a>  
                 <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Duet Singing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('duet_singing')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Duet Singing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#duet_singing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('duet_singing')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>

            </div>
                    <div class=" def" id="battle_of_bands">
            <a >
                        <img src="image/Events/Music/battle%20of.jpg" >
                </a>
                <a  class="reg">
                    +
                </a>  
                 
                <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Battle of Bands</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('battle_of_bands')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Battle of Bands</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#battle_of_bands_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('battle_of_bands')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div> 

            
                </div>
            </div>
        </div>
           
            <div id="Tab2" class="tabcontent">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>DANCE
                    </h1>
                </header>
        <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Dance/danceico.png" class="eventico" alt="Dance">
                        <h3>Dance</h3>
                          <div class="ul"></div>
                    </div>
                    <ul class="collapse" id="dance">
                            <li><a href="#group_dance">Group Dance</a></li>
                            <li><a href="#solo_dance">Solo Dance</a></li>
                            <li><a href="#unchoreographed_dance">Unchoreographed Dance</a></li>
                        </ul>
                </div>        
        </div>  
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class=" def" id="group_dance">

                <a >
                <img src="image/Events/Dance/group_dance_edit.png" >
              </a>

              <a  class="reg" >
                +
              </a>  
              
<div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Group Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('group_dance')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Group Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#group_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('group_dance')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
            </div>


            <div class=" def" id="solo_dance">


                      <a >
                        <img src="image/Events/Dance/solo_dance.jpg"  height="450px">
                    </a>

                <a  class="reg">
                    +
                </a>  
               <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Solo Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('solo_dance')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Solo Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#solo_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('solo_dance')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>

            </div>


            <div class=" def" id="unchoreographed_dance">

                <a >
                        <img src="image/Events/Dance/un%20dance.jpg"  height= "40px" class="aaa">
                    </a>

                <a  class="reg">
                    +
                </a>  
               <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Unchoreographed Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('unchoreographed_dance')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Unchoreographed Dance</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#unchoreographed_dance_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('unchoreographed_dance')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>

            </div>
 
            </div>
            </div>    

            <div id="Tab3" class="tabcontent">
                 <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>THEATRICAL ARTS
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Theatrical/theatreico.png" class="eventico" alt="Theatrical Arts">
                        <h3>Theatrical Arts</h3>
                        <div class="ul"></div>
                    </div>
                    <ul class="collapse" id="theatrical">
                            <li><a href="#play">Play</a></li>
                            <li><a href="#open_mic">Open Mic</a></li>
                            <li><a href="#mime">Mime</a></li>
                        </ul>
                    </div> 
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class=" def" id="play">    

                      <a >
                        <img src="image/Events/Theatrical/drama.jpg" >
                    </a>

                <a  class="reg">
                    +
                </a>  
             <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Play</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#play_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#play_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#play_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('play')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Play</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#play_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#play_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="play_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('play')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>

            </div>

            <div class=" def" id="open_mic">

                 <a >
                        <img src="image/Events/Theatrical/open.jpg" >
                    </a>

                <a  class="reg">
                    +
                </a>  
               <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Open Mic</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('open_mic')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Open Mic</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#open_mic_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('open_mic')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>

            </div>

            <div class=" def" id="mime">

                <a >
                        <img src="image/Events/Theatrical/mime_edit.png" >
                    </a>

                <a  class="reg">
                    +
                </a>  
            <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Mime</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#mime_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#mime_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#mime_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('mime')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Mime</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#mime_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#mime_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#v_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('mime')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
            </div>



            </div>
            </div>    

            <div id="Tab4" class="tabcontent">
                  <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>QUIZ
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Quiz/quizico.png" class="eventico" alt="quiz">
                        <h3>Quiz</h3>
                        <div class="ul"></div>
                    </div>
                    <ul class="collapse" id="quiz">
                            <li><a href="#general_quiz">General Quiz</a></li>
                            <li><a href="#pop_quiz">Pop Culture Quiz</a></li>
                            <li><a href="#sports_quiz">Sports Quiz</a></li>
                        </ul>
                    </div> 
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class="def" id="general_quiz">
                        <a >
                            <img src="image/Events/Quiz/generalquiz.jpg" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                      <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">General Quiz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('general_quiz')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">General Quiz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#general_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('general_quiz')"><img src="image/register.png" style="height: 10vw;width: 10vw;" ></a>
                            
                            </div>
                        </div>
                    </div>
            <div class="def" id="pop_quiz">
                        <a>
                            <img src="image/Events/Quiz/popquiz.jpg" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
             <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Pop Quiz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('pop_quiz')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Pop Quiz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#pop_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('pop_quiz')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>

            <div class="def" id="sports_quiz">
                        <a >
                            <img src="image/Events/Quiz/sports_quiz.jpg" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
       <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Sports Qiuz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('sports_quiz')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Sports Quiz</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#sports_quiz_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('sports_quiz')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>



            </div>
            </div>    

            <div id="Tab5" class="tabcontent">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>LITERARY
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Literary/literaryico.png" class="eventico" alt="Literary">
                        <h3>Literary</h3>
                        <div class="ul"></div>
                    </div>
                        <ul class="collapse" id="literary">
                            <div><li><a href="#debate">Debate</a></li>
                            <li><a href="#channel_surfing">Channel Surfing</a></li></div>
                            <div><li><a href="#spellbee">Spell-bee</a></li>
                            <li><a href="#shipwreck">Shipwreck</a></li></div>
                            <div><li><a href="#jam">Jam</a></li>
                            <li><a href="#malayalam-extempore">Malayalam Extempore</a></li></div>
                        </ul>
                    </div> 
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class="def" id="debate">
                        <a>
                            <img src="image/Events/Literary/Debate.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
<div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Debate</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('debate')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Debate</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#debate_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('debate')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>



            <div class="def" id="channel_surfing">
                        <a >
                            <img src="image/Events/Literary/channel.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                      <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Channel Surfing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('channel_surfing')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Channel Surfing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#channel_surfing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('channel_surfing')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>

            <div class="def" id="spellbee">
                        <a >
                            <img src="image/Events/Literary/spellbee.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                       <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Spellbee</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('spellbee')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Spellbee</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#spell_bee_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('spellbee')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>


            <div class="def" id="shipwreck">
                        <a >
                            <img src="image/Events/Literary/ship.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                       <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Ship Wreck</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('shipwreck')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Ship Wreck</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#shipwreck_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('shipwreck')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>

            <div class="def" id="jam">
                        <a >
                            <img src="image/Events/Literary/jam.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                       <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Jam</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('jam')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Jam</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#jam_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('jam')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>
            <div class="def" id="malayalam-extempore">
                        <a >
                            <img src="image/Events/Literary/mal.png" >
                        </a>
                        <a  class="reg" >
                        +
                        </a>  
                       <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Malayalam Extempore</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('malayalam_extempore')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Malayalam Extempore</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#malayalam-extempore_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('malayalam_extempore')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                    </div>
            </div>
            </div>    

            <div id="Tab6" class="tabcontent">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>ARTS
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Arts/artsico.png" class="eventico" alt="Arts">
                        <h3>Arts</h3>
                        <div class="ul"></div>
                    </div>
                        <ul class="collapse" id="art">
                            <div><li><a href="#t_shirt_painting">T-Shirt Painting</a></li>
                            <li><a href="#face_painting">Face Painting</a></li></div>
                            <div><li><a href="#sketching">Sketching</a></li>
                            <li><a href="#junk_art">Junk Art</a></li></div>
                            <li><a href="#doodling">Doodling</a></li>
                        </ul>
                </div>
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class="def" id="t_shirt_painting">
              <a>
                      <img src="image/Events/Arts/t_shirt_painting.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                  <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">T Shirt Painting</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('t_shirt_painting')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">T shirt Painting</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#t_shirt_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('t_shirt_painting')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

            <div class="def" id="face_painting">
              <a>
                      <img src="image/Events/Arts/fc.png" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                 <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Face Painting</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('face_painting')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Face Painting</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#face_painting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('face_painting')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

            <div class="def" id="sketching">
              <a>
                      <img src="image/Events/Arts/sketching.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
<div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Sketching</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('sketching')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Sketching</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#sketching_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('sketching')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>    

            <div class="def" id="junk_art">
              <a >
                      <img src="image/Events/Arts/jk.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                  <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Junk Art</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('junk_art')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Junk Art</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#junk_art_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('junk_art')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

            <div class="def" id="doodling">
              <a >
                      <img src="image/Events/Arts/doodle_drawing.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
<div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Doodling</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('doodling')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Doodling</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#doodle_drawing_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('doodling')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>
            </div>
            </div>    

            <div id="Tab7" class="tabcontent">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>INFORMALS
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Informal/informalico.png" class="eventico" alt="informal">
                        <h3>Informals</h3>
                        <div class="ul"></div>
                    </div>
                    <ul class="collapse" id="informal">
                            <div><li><a href="#dumb_charades">Dumb Charades</a></li>
                            <li><a href="#beg_borrow_steal">Beg Borrow Steal</a></li></div>
                            <div><li><a href="#treasure_hunt">Treasure Hunt</a></li>
                            <li><a href="#crime_scene">Crime Scene</a></li></div>
                            <div><li><a href="#fashion_show">Fashion Show</a></li>
                            <li><a href="#mr_and_ms_dhanak">Mr and Ms Dhanak</a></li></div>
                            <div><li><a href="#dostana">Dostana</a></li>
                        </ul>
                    </div>
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->
            <div class="def" id="dumb_charades">
              <a>
                      <img src="image/Events/Informal/dumb_charades.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                    <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Dumb Charades</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dumb_charades')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Dumb Charades</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dumb_charades_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dumb_charades')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>


            <div class="def" id="beg_borrow_steal">
              <a>
                      <img src="image/Events/Informal/br.png" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Beg Borrow Steal</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('beg_borrow_steal')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Beg Borrow Steal</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#beg_borrow_steal_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('beg_borrow_steal')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>


            <div class="def" id="treasure_hunt">
              <a>
                      <img src="image/Events/Informal/tr.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
               <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Treasure Hunt</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('treasure_hunt')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Treasure Hunt</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#treasure_hunt_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('treasure_hunt')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>


        <div class="def" id="crime_scene">
              <a >
                      <img src="image/Events/Informal/crm.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                   <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Crime Scene</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('crime_scene')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Crime Scene</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#crime_scene_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('crime_scene')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>


            <div class="def" id="fashion_show">
              <a >
                      <img src="image/Events/Informal/fashion_show.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                   <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Fashion Show</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('fashion_show')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Fashion Show</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#fashion_show_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('fashion_show')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

         <div class="def" id="mr_and_ms_dhanak">
              <a >
                      <img src="image/Events/Informal/mr_ms_dhanak.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                   <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Mr and Ms Dhanak</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('mr_and_ms_dhanak')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Mr and Mrs Dhanak</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#mr_and_ms_dhanak_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('mr_and_ms_dhanak')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

        <div class="def" id="dostana">
              <a >
                      <img src="image/Events/Informal/fr.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
            <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Dostana</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dostana')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Dostana</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dostana_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dostana')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

         
            </div>
            </div>

            <div id="Tab8" class="tabcontent">
                <header class="mobile_header" >
                    <h1 class="header_h1">
                    <span  class="glyphicon glyphicon-menu-hamburger ham"></span>ONLINE
                    </h1>
                </header>
                <div class="tab">
                <div class=" btn btn-primary active link">
                    <div class="jumbo"> 
                        <img src="image/Events/Online/onlineico.png" class="eventico" alt="online">
                        <h3>Online</h3>
                        <div class="ul"></div>
                    </div>
                    <ul class="collapse" id="online">
                            <div><li><a href="#movie_making">Movie Making</a></li>
                            <li><a href="#lets_meme">Let&#39;s Meme</a></li></div>
                            <div><li><a href="#dubsmash">Dubsmash</a></li>
                            <li><a href="#storywriting">Story Writing</a></li></div>
                            <div><li><a href="#poetry">Poetry</a></li>
                            <li><a href="#the_picturesque">The Picturesque</a></li></div>
                            <li><a href="#webbed">Webbed</a></li>

                        </ul>
                </div>
                </div>
                <div class="abc" >

            <!--<div style="position: fixed;left:90%;top: 85%;">
                <button onClick="scrollUp()" style="width: 100px;height: 50px; background-color: #b3b3b3"><span class="glyphicon  glyphicon glyphicon-menu-down"></span></button>

            </div>
            <div style="position: fixed;left:90%;top: 5%;">
                <button onClick="scrollDown()" style="width: 100px;height: 50px; background-color: #b3b3b3" ><span class="glyphicon glyphicon-menu-up"></span></button>
            </div>-->

            <div class="def" id="movie_making">
              <a >
                      <img src="image/Events/Online/mv.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                  <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Movie Making</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('movie_making')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Movie Making</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#movie_making_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('movie_making')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

            <div class="def" id="lets_meme">
              <a >
                      <img src="image/Events/Online/me.jpg">
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                  <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Lets Meme</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('lets_meme')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Lets Meme</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#lets_meme_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('lets_meme')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

            <div class="def" id="dubsmash">
              <a >
                      <img src="image/Events/Online/Dubsmash.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                 <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Dubsmash</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dubsmash')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Dubsmash</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#dubsmash_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('dubsmash')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>


        <div class="def" id="storywriting">
              <a>
                      <img src="image/Events/Online/str.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
              <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Story Writing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('storywriting')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Story Writing</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#storywriting_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('storywriting')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

        <div class="def" id="poetry">
              <a >
                      <img src="image/Events/Online/poetry.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                    <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Poetry</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('poetry')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Poetry</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#poetry_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('poetry')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

          <div class="def" id="the_picturesque">
              <a>
                      <img src="image/Events/Online/picture.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
                   <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">The Picturesque</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('the_picturesque')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">The Picturesque</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#the_picturesque_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('the_picturesque')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
                </div>

          <div class="def" id="webbed">
              <a>
                      <img src="image/Events/Online/wb.jpg" >
                  </a>
                  <a  class="reg" >
                    +
                    </a>  
               <div class="text desktop_text" style="width: 100%;">
                            <h1><span  class="span_text">Webbed</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">About&nbsp;<img src="image/info1.png" style="height: 1.8vw;width:1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 23%;min-width: 10px;font-size: 1.5vw;">Rules&nbsp;<img src="image/note1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;">Contact&nbsp;<img src="image/contact1.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 27%;min-width: 10px;font-size: 1.5vw;" onClick="eve('webbed')">Register&nbsp;<img src="image/register.png" style="height: 1.8vw;width: 1.8vw;"></a>
                            
                            </div>
                        </div>
                        <div class="text mobile_text" style=" display: none;width: 98%;">
                            <h1><span  class="span_text">Webbed</span></h1>  
                            <div style="width: 100%;">  
                                                    
                            <a  class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg about1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/info1.png" style="height: 10vw;width:10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg rules1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/note1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" data-toggle="modal" data-target="#webbed_modal" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;"><img src="image/contact1.png" style="height: 10vw;width: 10vw;"></a>
                            
                            <a class="btn1 pmd-btn1-raised pmd-ripple-effect btn1-primary btn1-lg contact1" style="margin: 0px; float: left;width: 25%;min-width: 10px;font-size: 1.5vw;" onClick="eve('webbed')"><img src="image/register.png" style="height: 10vw;width: 10vw;"></a>
                            
                            </div>
                        </div>
          </div>

            </div>
            </div>
        </div>

    

    </div>


    <!--Music -->
    <div id="music_model">
    <!--Solo Singing Modal -->
    <div class="modal fade" id="solo_singing_modal" role="dialog">
        <div class="modal-dialog">

            <!--Solo Singing Modal content-->
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Solo Singing</h4>
                </div>

                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="about"><a data-toggle="tab" href="#home_solo_singing">About</a></li>
                        <li class="rules"><a class="poi" data-toggle="tab" href="#rules_solo_singing">Rules</a></li>
                        <li class="contact"><a data-toggle="tab" href="#contact_solo_singing">Contact</a></li>    
                    </ul>

                    <div class="tab-content">
                        <div id="home_solo_singing" class="tab-pane fade in active">
                            <div class="modal_text_style"> <q>I think there is a good pop song in everything</q>
								<p align="right">&#45; Kesha</p>
                            <p style="text-indent: 25px;">Catchy and enjoyable, music is all around us. Music is that art which connects souls. Pop music is nothing less.</p>
                            
                           <b>Total Prize Money - &#8377; 4,500 </b>
                            </div>
                        </div>
                        <div id="rules_solo_singing" class="tab-pane fade">
                            <div class="modal_text_style">
                                <p style="margin: 0px;">
                                   The event will have 3 separate categories:  </p>
                                   <ol style="padding-left: 35px;">                              
									<li><b>Des&#39;pop&#39;cito</b> - Solo singing in English.</li>
                                    <li><b>Swaraleyam</b> - Solo singing in Malayalam.</li>
                                    <li><b>Geet Manjusha</b> - Solo singing in any other regional language. </li>   
									</ol>                       
								
                                <p style="margin: 0px;"><b>Prelims:</b></p>
                                <ol style="padding-left: 35px;">
                                    <li>Time limit for each participant is 3 mins.</li>
                                    <li>Participants are allowed to sing a maximum of two songs.</li>
                                    <li>Use of karaoke is not allowed.</li>
                                    <li>Use of instruments is not allowed.</li>
                                    <li>There is no specific theme. Participants can sing any song in the particular language</li>
                                </ol>


                                <p style="margin: 0px;"><b>Finals:</b></p>
                                <ol style="padding-left: 35px;"><li>Time duration allowed for each participant: Minimum 3 mins, Maximum 5 mins.
                                </li>
                                <li>Participants can use proper karaoke (Karaoke made by suppression of voices
                                from the original track is not allowed).</li>
                                <li>Participants are allowed to use instruments like keyboard or guitar provided
                                that they play it themselves.
                                </li>
                                <li>The decision of the judges will be final and binding.</li>
                                <li>There is no specific theme. Participants can sing any song in the particular
                                language.</li>
                                </ol>

                            </div>
                        </div>
                        <div id="contact_solo_singing" class="tab-pane fade">
                            <div class="modal_text_style">
                                Roahith - 8281805577<br>
                                Anju - 9488619102
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Duet Singing -->
      <div class="modal fade" id="duet_singing_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Duet Singing</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_duet_singing">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_duet_singing">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_duet_singing">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_duet_singing" class="tab-pane fade in active">
                <div class="modal_text_style">
                <q>Music gives a soul to the universe, Wings to the
    mind, Flight to the imagination, and Life to
    everything</q>
   <p> So pair up and &#39;RHYTHM IT&#39; with your partner on
    the stage.Tune the hearts to sing thy grace.</p>
   <b>Total Prize Money - &#8377; 2,000 </b>


    </div>
              </div>
              <div id="rules_duet_singing" class="tab-pane fade">
                <div class="modal_text_style">
                    <ol><li>There will be only one round (On Stage).</li>
                    <li>Each team must consist of exactly two members
    (Male-Male, Male-Female, Female-Female).
    </li>
                    <li>Contestants are free to choose songs (Single Or
    Fusion).
    </li>
                    <li>Songs can be either in Hindi, Malayalam or
    English.
    </li>
                    <li>For background music participants can play their
    own instruments (should be brought by the
    participants themselves) or should get the proper
    karaoke of their song. Suppression of the voices
    from the original track will not be allowed. (The
    karaoke should be given to the event organizers at
    least 2 hours prior to the commencement of the
    event preferably in a pendrive.)
    </li>
                    <li>Each participant is restricted to one team only.

    </li>
                    <li>Performance should not exceed time limit (4
    minutes). Exceeding the time limit will result in
    deduction of points.
    </li>
                    </ol>

                </div>
              </div>
              <div id="contact_duet_singing" class="tab-pane fade">
                 <div class="modal_text_style">
                    Sreelakshmi Sandeep - 9496974367<br>
    Jacob Sebastian - 9496481043

                 </div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
    <!--Battle of Bands -->
      <div class="modal fade" id="battle_of_bands_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Battle of Bands</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_battle_of_bands">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_battle_of_bands">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_battle_of_bands">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_battle_of_bands" class="tab-pane fade in active">
                <div class="modal_text_style">RAISE YOUR METALFISTS.<br>
    Take to arms, bring in the heat<br>
    Shake the earth with your blast beats<br>
    Tune your axes and unleash hellish screams<br>
    Change the world, eternalize your feats.<br>
    The stage is set and the battle is on...<br><br>
    <b>Total Prize Money - &#8377;45,000(30,000 + 15,000*) </b><br>
                    <h6>* Terms and Conditions Apply</h6>  
                    <h6>The event is being sponsored by <a href="http://kalpafestival.com/" target="_blank" style="color: black;font-weight: bold;font-style: italic">Kalpa Festival of Arts</a>.The winning team will be offered an opportunity to perform at Kalpa Festival of Arts, Cochin (December 1-3,2017). The additional 15,000 prize money will be given to the winning band only if the offer is accepted and the band performs during Kalpa Festival of Arts . Otherwise the prize money remains 30,000 (divided into two prizes.)</h6>  
					 	
    </div>
              </div>
              <div id="rules_battle_of_bands" class="tab-pane fade">
                <div class="modal_text_style">
                    <ol>
                        <li>The participating band should be registered online , latest by 13th October 2017 failing which a slot given for the competition is not guaranteed.</li>
                        <li>No individual can be a part of more than one competing band in any role.</li>
                        <li>Each band can have max 10 members.</li>
                        <li>Stage time will be 30-40 min (plug in and plug out) depending on the schedule and number of bands. Points will be deducted for exceeding time limit.</li>
                        <li>Sound check can be performed immediately before each band’s performance or before the competition begins at the discretion of sound provider/technician.</li>
                        <li>No guide tracks, backing tracks, pre-recorded music or computed beats may be used.</li>
                        <li>The decision of judges is final and cannot be challenged.</li>
                    </ol>
                </div>
              </div>
              <div id="contact_battle_of_bands" class="tab-pane fade">
                <div class="modal_text_style">Manish Chauhan - 7018924530<br>
              Shubham Aghao - 9497300057
    </div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
    </div>

    <!--Dance-->
     <div id="dance_model">
    <!--Group Dance Modal -->
      <div class="modal fade" id="group_dance_modal" role="dialog">
        <div class="modal-dialog">

          <!--Group Dance Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Group Dance</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_group_dance">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_group_dance">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_group_dance">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_group_dance" class="tab-pane fade in active">
                <div class="modal_text_style"><q>And those who were seen dancing were thought to be insane by those who could not hear the music.
    </q>
    <p align="right">&#45;Friedrich Nietzsche</p>
   <p> Here is the platform for you to create the mesmerizing effect of perfectly synchronized moves which have the spellbinding effect of synchronizing heartbeats!</p>
    <b>Total Prize Money - &#8377; 30,000 </b>
    </div>
              </div>
              <div id="rules_group_dance" class="tab-pane fade">
                <div class="modal_text_style">
                <ol>
<li>Each participant must carry a valid Id card.</li>
<li>5-12 members per group are allowed. Teams will be penalized if they exceed this limit.</li>
<li>Duration 6-8 mins (2 mins extra will be given for setup and clearance,if required). Time limit should be strictly adhered to. Points will be cut for taking extra time.</li>
<li>Use of props is allowed.</li>
<li>Pre recorded music should be handed over minimum 30 mins prior to the event.</li> 
<li>Pre recorded music should be brought in a pendrive in .mp3 format ONLY.(Other formats may not be supported by the computer..use them at your own risk.). It needs to be submitted beforehand so it is the responsibility of the participants to make sure they write the name of the college etc. on it and take it back after the performance.</li>
<li>Participants can dance in more than one style.</li>
<li>Any kind of fluid or flame is not allowed on stage.</li>
<li>Obscenity of any kind will lead to immediate disqualification.</li>
<li>The decision of the judges will be final and binding.</li>

                </ol>
                </div>
              </div>
              <div id="contact_group_dance" class="tab-pane fade">
                <div class="modal_text_style">Lipi Roy - 9497300130<br>
                  Saathvika Kasukurthi - 9447784877</div>         
                 </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Duet Dance Modal -->
      <div class="modal fade" id="duet_dance_modal" role="dialog">
        <div class="modal-dialog">

          <!--Duet Dance Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Duet Dance</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_duet_dance">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_duet_dance">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_duet_dance">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_duet_dance" class="tab-pane fade in active">
                <div class="modal_text_style">Dance is music made visible&#46;&#46;&#46;it is with your feet that you move. But it is with your heart that you dance&#46;&#46;&#46;Come and set the stage on fire along with your partner!!<br><br>
                	 <b>Total Prize Money - &#8377; 4,000 </b>
    </div>
              </div>
              <div id="rules_duet_dance" class="tab-pane fade">
                <div class="modal_text_style">
                <ol>
                <li>Valid college or school ID card is required to participate.</li>
                <li>As the name suggests, allowed no. of participants per team is 2.</li>
                <li>Participants are allowed to fuse songs for their performance.</li>
                <li>The participants cannot use any part of the song which was used in the prelims, for the finals.</li>
                <li>Use of props is permitted. A duration of 1 minute is allowed for set up and clearance.</li>
                <li>Performance duration: 3-5 minutes only. The time limit should be strictly adhered to. Participants will be penalized by judges for not doing so.</li>
                <li>Pre-recorded music should be brought on a CD/DVD or a pen drive in .cda or .mp3 format only. The same should be handed over to the organizers half an hour before the start of the event.</li>
                <li>Any kind of fluid or flame is not allowed on stage.</li>
                <li>Obscenity of any kind will lead to immediate disqualification.</li>
                <li>The decision of the judges will be final and binding.</li>
                </ol>
                </div>
              </div>
              <div id="contact_duet_dance" class="tab-pane fade">
                <div class="modal_text_style">Saathvika Kasukurthi - 9447784877</div>         
                 </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Solo Dance -->
      <div class="modal fade" id="solo_dance_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Solo Dance</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_solo_dance">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_solo_dance">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_solo_dance">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_solo_dance" class="tab-pane fade in active">
                <div class="modal_text_style">
                    <h2>Classical dance : MUDRA</h2>
                   <p> Dance is a poem of where each movement is a word.
    In this world full of arts,dance is considered as the cultural mirror where the spirit,character and artistry of its time are reflected. To experience its magical energy flowing through you,here is the event MUDRA.</p>
    <h2>Western and semi-classical dance : EXPLODE</h2>
    <p>When you dance , your purpose is not to get to a certain place  on the floor, it’s to enjoy every step along the way!</p>
  
     <p>   For all the high-spirited and enthusiastic souls out there  who can swing and sway, swish and swirl to the rhythm. Here is the platform to showcase your hidden verve to dance. Just come out and tap to the beat.</p>
      <b>Total Prize Money - &#8377; 6,000 each for Western and  Classical and Semi classical</b>


                </div>
              </div>
              <div id="rules_solo_dance" class="tab-pane fade">
                <div class="modal_text_style">
                    <h2>Classical dance : MUDRA</h2>
                    <ol>
                        <li>Each participant must carry a valid ID card.</li>
                        <li>Participants must bring their pre recorded audio on a pendrive in mp3 format and must be present at the venue 30 min prior to the event.</li>
                        <li>Same music cannot be used to both prelims and finals(if selected)</li>
                        <li>Use of properties is allowed and 1 min time is given to setup and clearance.</li>
                        <li>Time duration of the performance should be minimum of 4 mins and should not exceed 8 mins.</li>
                        <li>Any kind of obscenity will not be allowed and can lead to disqualification from the event.</li>
                        <li>Decision of the judges will be final.</li>
                                        </ol>
                                        
                                        <h2>Western and semi-classical dance : EXPLODE</h2>
                    <ol>
                        <li>Each participant must carry a valid ID card.</li>
                        <li>Participants must bring their pre recorded audio on a pendrive in mp3 format and must be present at the venue 30 min prior to the event.</li>
                        <li>Same music cannot be used to both prelims and finals(if selected)</li>
                        <li>Use of properties is allowed and 1 min time is given to setup and clearance.</li>
                        <li>Time duration of the performance should be minimum of 4 mins and should not exceed 7 mins.</li>
                        <li>Any kind of obscenity will not be allowed and can lead to disqualification from the event.</li>
                        <li>Decision of the judges will be final.</li>

                                        </ol>

                </div>
              </div>
              <div id="contact_solo_dance" class="tab-pane fade">
                <div class="modal_text_style">Kavya Karampuri - 9447784588<br>
         Harshitha Grandhi - 9447785758   
    </div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
      <!--Unchoreographed Dance  -->
      <div class="modal fade" id="unchoreographed_dance_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Unchoreographed Dance</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_unchoreographed_dance">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_unchoreographed_dance">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_unchoreographed_dance">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_unchoreographed_dance" class="tab-pane fade in active">
                <div class="modal_text_style"><q>  Dancing is the art to surrender yourself to music.</q>
   <p> Unchoreographed dance, the most open ended event of dhanak!
	   We invite you to showcase your creativity through your moves!</p>
	   <b>Total Prize Money - &#8377; 2,000 </b>
    </div>
              </div>
              <div id="rules_unchoreographed_dance" class="tab-pane fade">
                <div class="modal_text_style">
                    <ol>
                        <li>Valid college or school id required to participate.</li>
                        <li>The participants would be given the song to dance on the spot.the track would be 2 minute long.</li>
                        <li>Track selection would be totally random through chit selection system and would not be changed.</li>
                        <li> 4 minutes would be allotted for choreographing.</li>
                        <li> Any source of media during these 3 minutes is not allowed.</li>
                        <li>  All styles of dancing are invited.</li>
                        <li>The decision of judges will be final and binding.</li>
                    </ol>
                </div>
              </div>
              <div id="contact_unchoreographed_dance" class="tab-pane fade">
                <div class="modal_text_style">Mayank - 9447784436<br>
            Uttam Srimali - 9447784296
    </div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
        </div>

    <!--Theatical Arts -->
     <div id="theatrical_model">
     <!--Play -->
      <div class="modal fade" id="play_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Plays</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_play">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_play">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_play">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_play" class="tab-pane fade in active">
                <div class="modal_text_style">
                    <p><q>Be who you want to be, and live how you want to be, because in drama, you get to choose what you want to be. So come stupefy us, with your amazing acting skills, take us to unknown worlds, and grab amazing prizes. The stage is all yours!</q></p>
                    <b>Total Prize Money - &#8377; 6,000 </b>
                </div>
              </div>
              <div id="rules_play" class="tab-pane fade">
                <div class="modal_text_style">
                    <ol>
                        <li> Valid college or school ID card is required to participate.</li>
                        <li> The play can be of any genre of theatre, like street play, musical, pantomime etc.</li>
                        <li> The theme of the play can be anything.</li>
                        <li> Use of props is permitted. Duration of 2 minutes is allowed for set up and clearance.</li>
                        <li> Performance duration: 8-10 minutes only. Participants will be penalized by judges for not sticking to it.</li>
                        <li> Maximum 10 persons per team.</li>
                        <li> Pre-recorded music should be brought on a CD/DVD or a pen drive in .cda or .mp3 format only. The same should be handed over to the organizers an hour before the start of the event.</li>
                        <li> The decision of the judges will be final and binding.</li>
                        <li> Play can be in English, Hindi, Malayalam and Tamil.</li>
                    </ol>
                </div>
              </div>
              <div id="contact_play" class="tab-pane fade">
                <div class="modal_text_style">Ravishankar SS - 9447784858</div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
      <!--Mime -->
      <div class="modal fade" id="mime_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Mime</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_mime">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_mime">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_mime">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_mime" class="tab-pane fade in active">
               <div class="modal_text_style">
               <q>When words fail, actions prevail.</q>
             <p>  Mime is to convey an impression of &#40;an idea or feeling&#41; by gesture and movement,without using words.
    If you think grabbing the attention of an audience is easy, try doing it without the leisure of words. Welcome to the world of mime, where expressions grab you stronger than words.</p>
    <b>Total Prize Money - &#8377; 5,000 </b>
    </div>
              </div>
              <div id="rules_mime" class="tab-pane fade">
                <div class="modal_text_style">
                    <ol>
                        <li> Each team can have 5-6 members.</li>
                        <li> Time limit is 5mins for each team. Negative points for exceeding time.</li>
                        <li> Act should not contain any dialogues or lip sync.</li>
                        <li> Use of props is allowed.</li>
                        <li> No act shall contain any offensive, obscene, disrespectful actions or gestures. Else, the act will immediately be stopped.</li>
                        <li> Points will be given on the basis of innovation, depiction of situation, teamwork and expression.</li>
                                        </ol>
                </div>
              </div>
              <div id="contact_mime" class="tab-pane fade">
                <div class="modal_text_style">Mrinal Dutt - 7023166255</div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
      <!--Open Mic -->
      <div class="modal fade" id="open_mic_modal" role="dialog">
        <div class="modal-dialog">    
          <!-- content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Open Mic</h4>
            </div>
            <div class="modal-body">         
              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_open_mic">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_open_mic">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_open_mic">Contact</a></li>    
              </ul>
              <div class="tab-content">
              <div id="home_open_mic" class="tab-pane fade in active">
                <div class="modal_text_style">Day 1 : The COMEDY HANGOUT<br>
    <q>Life literally abounds in comedy if you just look around you.</q>
					<p align="right">- Mel Brooks</p>
<p>    Do you think you have the talent to bring out the comedy in the mundane happenings around you. If so, Dhanak 2017 invites you to take part in Open Mic, our very first stand-up comedy event.</p>
Day 2 : POETRY SLAM<br>
    <q>  Dil se jo baat nikalti hai asar rakhti hai
        Par nahi quwat-e-parwaaz magar rakhti hai
(When passion streaming from the heart turns human lips to lyres,
Some magic wings man’s music then, his song with soul inspires)
</q>
					<p align="right">-Allama Iqbal</p>
<p>Poetry speaks your heart, or sometimes your mind. And when it speaks, it changes the world around you. So this Dhanak come forward, speak your mind and inspire people around you.</p>
<b>Total Prize Money - &#8377; 1,500 </b>
    </div>

              </div>
              <div id="rules_open_mic" class="tab-pane fade">
                <div class="modal_text_style">
                   <b>Comedy Hangout</b>
                    <ol>
                        <li> Only two languages are allowed: English, Hindi.</li>
                        <li> Colloquial language will be appreciated.</li>
                        <li> It can be a solo performance or a group but a group should not exceed the limit of 3 members. </li>
                        <li> It should not exceed the time limit of 7 mins.</li>

                    </ol>
                   <b>Poetry Slam</b>
                    <ol>
                        <li>Poems may be in any style and on any subject. </li>	
                        <li>Poem can be self-written or of any other poet.</li>	
                        <li>Max. time for a performance is 5 mins.</li>	
                        <li>Extra points will be given for self-written poem.</li>	
                        <li>Acknowledgement should be there if the poem is of any other poet</li> 
                        <li>Performance will be judged on the basis of content, understanding and explanation.</li>	
                        <li>Judge's decision will be the final</li>	
                    </ol>
                </div>
              </div>
              <div id="contact_open_mic" class="tab-pane fade">
                <div class="modal_text_style">Tatsat Solanki - 7228813999<br>
         Abhi Jaiswal - 9447787751
    </div>
              </div>          
              </div>          
            </div>        
          </div>      
        </div>
      </div>
    </div>

    <!--Quiz  Modal -->
    <div id="quiz_model">
    <!--Pop Culture Quiz Modal -->
    <div class="modal fade" id="pop_quiz_modal" role="dialog">
        <div class="modal-dialog">

          <!--Pop Culture Quiz Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pop Culture Quiz</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_pop_quiz">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_pop_quiz">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_pop_quiz">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_pop_quiz" class="tab-pane fade in active">
                
                <div class="modal_text_style">
                <p>
                Come and indulge in this celebration of words,acoustic, artistry and feature to flaunt your  knowledge of pop culture.</p>
                <b>Total Prize Money - &#8377; 3,000 </b>
                </div>
              </div>
              <div id="rules_pop_quiz" class="tab-pane fade">
                
                <div class="modal_text_style">
                <ol>
    <li>
    A team may consist of only two members.
    </li>
    <li>
    Prelims will be held on the spot in a written round of 30 minutes duration.
    </li>
    <li>
    Six teams qualify to the finals.
    </li>
    <li>
    Other rules and details of the events and rules of the final round will be disclosed
    during the event.

    </li>
    <li>
    The decision of the organisers  will be final and binding
    </li>
    </ol>
                </div>
              </div>
              <div id="contact_pop_quiz" class="tab-pane fade">
                
                <div class="modal_text_style">
                Kalyani - 9447785014 <br />
    Jagriti - 7979745247 <br />
    </div>
              </div>

              </div>

            </div>

          </div>

        </div>
        </div>
     <!--General Quiz Modal -->
    <div class="modal fade" id="general_quiz_modal" role="dialog">
        <div class="modal-dialog">

          <!--Solo Singing Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">General Quiz</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_general_quiz">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_general_quiz">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_general_quiz">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_general_quiz" class="tab-pane fade in active">
                <div class="modal_text_style">
                <p>No fields left. No holds barred. No punches held. Everything that has ever crossed your eyes, everything that ever ran through your ears, swam across your trillion nerves will vanish in depths of your ever-zealous mind. Be ready for that spark of euphoria that will hit you at the opportune moment. But will it be enough?</p>
                <b>Total Prize Money - &#8377; 7,000 </b>
				  </div>
              </div>
              <div id="rules_general_quiz" class="tab-pane fade">
               
                <div class="modal_text_style">
                <ol>
                <li>
    A team may consist of only two members.
    </li>
    <li>
    Prelims will be held on-the-spot in a written round.
    </li>
    <li>
    Six teams qualify to the finals.
    </li>
    <li>
    Other rules and details of the final round will be disclosed during the event.
    </li>
    <li>
    Decision of the quizmaster and the organisers will be final.
    </li>
    </ol>

                </div>
              </div>
              <div id="contact_general_quiz" class="tab-pane fade">
                
                <div class="modal_text_style">

                Sneha - 9497071826<br />
    Anuj - 9497300445<br />
    Avinash - 7702568767<br /></div>

                </div>
              </div>

              </div>

            </div>

          </div>

        </div> 
     <!--Sports Quiz Modal -->
    <div class="modal fade" id="sports_quiz_modal" role="dialog">
        <div class="modal-dialog">

          <!--Solo Singing Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sports Quiz</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_sports_quiz">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_sports_quiz">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_sports_quiz">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_sports_quiz" class="tab-pane fade in active">
                
                <div class="modal_text_style">
                    <q>You were born to be a player. You were meant to be here. This moment is yours.</q>
  <p>  Here&#39;s a chance for you to dribble past the teams, smash the volley of questions fired at you, hit them at cover drive and finally to dunk and score in this year&#39;s edition of sports quiz in Dhanak 2k17. So pull up your socks, tighten your studs, stretch your minds and win yourself a podium finish.</p>
  <b>Total Prize Money - &#8377; 3,000 </b>
    </div>
              </div>
              <div id="rules_sports_quiz" class="tab-pane fade">
                
                <div class="modal_text_style">
                <ol>
    <li>
    Each team must contain 2 members.
    </li>
    <li>
    A written preliminary round will precede the finals.
    </li>
    <li>
    Six teams qualify to the finals.
    </li>
    <li>
    The final round will have various rounds, the rules of which will be disclosed during the event.
    </li>
    <li>
    The decision of the organisers and the quizmaster will be final and binding
    </li>
    </ol></div>
              </div>
              <div id="contact_sports_quiz" class="tab-pane fade">
                 <div class="modal_text_style">
                Neelabh - 8700456238<br />
    Mallikarjun - 7013359175 <br />
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    </div>

    <!--LITERARY  Modal -->
    <div id="literary_model">
     <!--Channel Surfing Modal -->
    <div class="modal fade" id="channel_surfing_modal" role="dialog">
        <div class="modal-dialog">

          <!--Channel Surfing Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Channel Surfing</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_channel_surfing">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_channel_surfing">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_channel_surfing">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_channel_surfing" class="tab-pane fade in active">
               
                <div class="modal_text_style">
                <p>
                	*TV ON* And survival can be summed *switch* Sansani Sansani Breaking News *switch* If you ever call me sister  *switch* How to solve JEE problems in *switch* The game Mrs. Hudson is *switch* The Defense Arrest? Confused?
                </p>
                <p>
                How best do you think you can mimic the TV? Enact out as a group , the channels that play on TV, as given by the moderator Switch from channel to channel and be as spontaneous as possible
                </p>
                <b>Total Prize Money - &#8377; 2,500 </b>
            </div>
              </div>
              <div id="rules_channel_surfing" class="tab-pane fade">
                
                <div class="modal_text_style">
                <ol>
    <li>
    The moderator will start off from a particular T.V. channel, which you enact out
    </li>
    <li>
    The name of a channel on the spot (English/Regional[popular enough]) will be given and the team should enact what is telecast in that channel
    </li>
    <li>
    Each team should consist of atleast two members. 
    </li>
    <li>
    Each team will be given a maximum of 5 minutes (extra in case a tie situation arises) on stage.
    </li>
    <li>
    Some clues will be provided  regarding genre of channel that will come for their enactment.
    </li>
    <li>
    Teams will be judged on the basis of spontaneity, humour, relevance  and clarity
    </li>
    </ol></div>
              </div>
              <div id="contact_channel_surfing" class="tab-pane fade">
                
                <div class="modal_text_style">
                Kunal - 9447785203</div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Debate Modal -->
    <div class="modal fade" id="debate_modal" role="dialog">
        <div class="modal-dialog">

          <!--Debate Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Debate</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_debate">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_debate">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_debate">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_debate" class="tab-pane fade in active">
              <div class="modal_text_style">
               <q>The clash of ideas is not weakness. Truth reaches its place when tussling with error.</q>
               <p align="right">- Richard Henry Pratt</p>
               <p>
               
    Believe in the power of words??
    Sharpen your intellect and gear up for the battle.
    </p>
    <b>Total Prize Money - &#8377; 3,000 </b>
              </div>
              </div>
              <div id="rules_debate" class="tab-pane fade">
                
                <div class="modal_text_style">
                <ol>
            <li>
    There will be two rounds. Preliminary round, followed by the finals.The no. of teams in the finals will be decided based on the number of participants.
    </li>
    <li>
    The topics for the debate will be provided in due time.
    </li>
    <li>
    Proposition and opposition teams each consist of TWO debates each.
    </li>
    <li>
    Participants are allowed to carry research papers along with notepads to write down important points.
    </li>
    <li>
    No electric gadgets are allowed.
    </li> 
    <li>
    Participants are requested to maintain decorum, and will be penalized if found guilty of using Un-Parliamentary and colloquial language.
    </li>
    <li>
    Moderators’ decision will be final and binding.
    </li></ol>
    </div>

              </div>
              <div id="contact_debate" class="tab-pane fade">
               <div class="modal_text_style">
                Anjumol Salim - 8547841946<br>     
                Niharika- 9497663554
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Spell Bee Modal -->
    <div class="modal fade" id="spell_bee_modal" role="dialog">
        <div class="modal-dialog">

          <!--Spell Bee Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Spell Bee</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_spell_bee">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_spell_bee">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_spell_bee">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_spell_bee" class="tab-pane fade in active">
                
                <div class="modal_text_style">
               <p> Is the Dictionary your favorite literary companion? Do you have a way with words and enjoy the thrill of getting them right? And are books the Wonderland to your Alice?
        If your answer to any of these questions is YES then join us! Bring out the Spelling Nazi in you!</p>
        <b>Total Prize Money - &#8377; 1,500 </b>
    </div>
              </div>

              <div id="rules_spell_bee" class="tab-pane fade">
              
                <div class="modal_text_style">
                <ol>
    <li>
    Teams can consist of a maximum of two people.
    </li>
    <li>
    he event will consist of two rounds : Prelims and Finals.
    </li>
    <li>
    The Prelim round will be a pen-n-paper round, testing the spellers through a set of small questions 
    </li>
    <li>
    The use of printed or electronic material of any kind during the rounds will lead to a direct disqualification of the participant.
    </li>
    <li>
    The decision of the judges is final and irrefutable.
    </li>
    <li>
    Teams will be judged on the basis of spontaneity, humour, relevance  and clarity
    </li>
    </ol>
                </div>
              </div>
              <div id="contact_spell_bee" class="tab-pane fade">
               <div class="modal_text_style">
                Sharvi - 9447784091
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Malayalam Extempore Modal -->
    <div class="modal fade" id="malayalam-extempore_modal" role="dialog">
        <div class="modal-dialog">

          <!--Malayalam Extempore Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Malayalam Extempore</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_malayalam-extempore">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_malayalam-extempore">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_malayalam-extempore">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_malayalam-extempore" class="tab-pane fade in active">
                
    <div class="modal_text_style">
    Manyamahajanangale,<br>
    <p> Are you an expert in public speaking ? Can words give life to your thoughts?
		Here it is, the opportunity to showcase your talent!</p>
    Seize it! Let your voice be heard!  <br><br>
    <b>Total Prize Money - &#8377; 1,500 </b>
    </div>
                </div>
              <div id="rules_malayalam-extempore" class="tab-pane fade">
                <div class="modal_text_style">
                <ol>
    <li>
    The speech must be presented in Malayalam.
    </li>
    <li>
    Each contestant  will be given 3 topics out of which he/she should choose one
    </li>
    <li>
    Each contestant will be allotted 10 minutes for preparation and 5 minutes for presentation.</li>
    <li>
    Speech notes made during the preparation time are permitted at the time of presentation.
    </li>
    <li>
    No form of electronic media is allowed during the competition. If any contestant is found in possession of the same will be disqualified
    </li>
    <li>
    A warning bell will be given at the end of 4 minutes.
    </li>
    <li>
    The decisions made by the judges will be final and binding.
    </li>
    </ol>
				  </div>
              </div>
              <div id="contact_malayalam-extempore" class="tab-pane fade">
                <div class="modal_text_style">
                Nikitha - 9447787499<br />
               Niharika - 9497663554<br />
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
     <!--Shipwreck -->
    <div class="modal fade" id="shipwreck_modal" role="dialog">
        <div class="modal-dialog">
        <!--Shipwreck content-->
        <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Shipwreck</h4>
            </div>
        <div class="modal-body">

            <ul class="nav nav-tabs">
            <li class="about"><a data-toggle="tab" href="#home_shipwreck">About</a></li>
            <li class="rules"><a data-toggle="tab" href="#rules_shipwreck">Rules</a></li>
            <li class="contact"><a data-toggle="tab" href="#contact_shipwreck">Contact</a></li>    
            </ul>

        <div class="tab-content">
        <div id="home_shipwreck" class="tab-pane fade in active">
        
        <div class="modal_text_style">
        <p>Do you think that you can convince people in critical situations for your   benefit , then the event Shipwreck is for you as it tests your persuading skills. </p>
        <b>Total Prize Money - &#8377; 2,500 </b>
        </div>
        </div>
        <div id="rules_shipwreck" class="tab-pane fade">
       
        <div class="modal_text_style">
        <ol>
        <li>
        You will be be a famous personality like Superman,Justin Bieber,Narendra Modi etc..You are on the ship with some other famous celebrities/fictional characters/hypothetical or controversial characters. Unluckily, the ship is sinking and the captain has only one life jacket . Sink into the given character, use your impressive convincing skills to prove the captain of the ship that you deserve the only life  jacket.
        </li>
        <li>
        Make yourself appear prominent and better than any other person on the board to win the life jacket and eventually the event.
        </li>
        <li>
        Laptops will be provided at the event location so that you will be acquainted with the character given to you before the argument starts. 
        </li>
        <li>
        The duration for each argument will be decided at the time of the event
        </li>
        <li>
        The participants will be judged on content , humour , credible arguments and valid points.</li>
        </ol>
        </div>
        </div>
        <div id="contact_shipwreck" class="tab-pane fade">
        
        <div class="modal_text_style">
        Mallikarjun - 7013359175 <br />

        </div>
        </div>

        </div>

        </div>

    </div>
        </div>
        </div>
      <!--JAM Modal -->
      <div class="modal fade" id="jam_modal" role="dialog">
        <div class="modal-dialog">

          <!--JAM Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">JAM</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_jam">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_jam">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_jam">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_jam" class="tab-pane fade in active">
             <div class = "modal_text_style">
    <p>What does the second&#39;s hand ticking away bring out in you? Does it make you stutter, flutter, or just speak way too fast? And what when there&#39;s the added factor of an opponent listening to you way too intently, just to pick on your faults and starts speaking himself? Does this make your adrenaline rush? Because then this event is for you!! Creativity comes to everyone when time is plentiful, but this event tests your ability to imagine and communicate and stupefy everyone, and all this sin just a paltry minute! So roll your sleeves, clear your throat and claim that one minute!</p>
    <b>Total Prize Money - &#8377; 2,500 </b>
             </div>
              </div>
              <div id="rules_jam" class="tab-pane fade">
             <div class = "modal_text_style">
     <ol>
    <li>A topic is given, the participant starts speaking and continues to speak until an opponent participant spots a pause, irrelevance or a mistake in their grammar/vocabulary, at which point this person can interrupt the speaker and start speaking themselves. Points will be given based upon your duration speech and pointing mistakes.</li>
    <li>At the end of one minute, the person who is speaking gets bonus points.</li>
    <li>This event includes three rounds. The first round is the normal J.A.M.</li>
    <li>The next two rounds are surprise rounds aiming at a check of spontaneity.</li>
    </ol>
             </div>
              </div>
              <div id="contact_jam" class="tab-pane fade">
                <div class="modal_text_style">
    Surya - 9447785166<br>
    Jashwanth - 9447785919
                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    </div>

    <!--ARTS -->
    <div id="arts_model">
    <!--T-Shirt Painting  Modal -->
      <div class="modal fade" id="t_shirt_painting_modal" role="dialog">
        <div class="modal-dialog">

          <!--T-Shirt Painting Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">T-Shirt Painting </h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_t_shirt_painting">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_t_shirt_painting">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_t_shirt_painting">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_t_shirt_painting" class="tab-pane fade in active">
                <div class="modal_text_style">
                 <p> Paint your way through the garden of dreams where there is no concept of limit.</p>
    <q>Dip your brush into your soul and let it reflect in your art.</q> 
  <p>  Dhanak 2k17  brings you an opportunity to unleash your innate talents, creativity and spontaneity.</p>
<b>Total Prize Money - &#8377; 2,500 </b>
                </div>
              </div>
              <div id="rules_t_shirt_painting" class="tab-pane fade">
                 <div class="modal_text_style">
                 <ol>
                  <li>The team can consist of a maximum of two individuals.</li>
    <li>Topic will be announced on spot and accordingly each team has to design the t-shirt.</li>
        <li>  The time limit is 2 hours.</li>
    <li>A white round necked t-shirt, colours and all the necessary logistics will be provided by the organizers.</li>
     <li>NO additional t-shirt will be provided.</li>
     <li>Electronic gadgets and printouts in any form are not allowed, if brought, they will be collected and given back only after the competition.</li>
     <li>Readymade materials are not allowed.</li>
    <li>The design will be judged on creativity, colour scheme and originality.</li>
     <li>The decision of Judges is final and binding.</li>
              </ol>
                </div>
              </div>
              <div id="contact_t_shirt_painting" class="tab-pane fade">
                <div class="modal_text_style">
                  Janakiram - 9447784133<br>
    Rasesh - 9687849521

                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Face Painting   Modal -->
      <div class="modal fade" id="face_painting_modal" role="dialog">
        <div class="modal-dialog">

          <!--Face Painting  Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Face Painting </h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_face_painting">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_face_painting">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_face_painting">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_face_painting" class="tab-pane fade in active">
                <div class="modal_text_style">
					 <q>  Life is a great big canvas, and you should color it all you want!</q>
				  <p> What if the canvas was expressive? And what is more expressive than a face?</p>
  <p>  Give colour to your thoughts and paint your imagination!
	  We are eager to bring out the face painter in you.</p>
	  <b>Total Prize Money - &#8377; 2,500 </b>

                </div>
              </div>
              <div id="rules_face_painting" class="tab-pane fade">
               <div class="modal_text_style">
               <ol>
                  <li>  Each team may consist of two participants (one who paints and the other whose face is being painted).</li>
    <li>  The artist must work alone. No assistants are allowed.</li>
    <li>  The materials for the event like acrylic paints, brushes, plates, cups and tissues will be provided at the venue.</li>
    <li> Each artist must work within the allotted area.</li>
    <li>  The teams will be allotted a specific time period which will not be extended upon request.</li>
    <li> Judgement criteria includes but is not limited to relevance to the theme, color combination and creativity.</li> 
    <li> The decision of judges is final and binding. 
    </li>
    </ol>
                </div>
              </div>
              <div id="contact_face_painting" class="tab-pane fade">
				  <div class="modal_text_style">
				  	Jashwanth - 9447785919<br>
	   Surya - 9447785166

				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Sketching  Modal -->
      <div class="modal fade" id="sketching_modal" role="dialog">
        <div class="modal-dialog">

          <!--Sketching Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sketching</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_sketching">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_sketching">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_sketching">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_sketching" class="tab-pane fade in active">
               <div class="modal_text_style">
              <p> To portray the colours of human emotions in monochrome, one need not just have an artistic hand, but, also an expressive mind, and an innovative thought. Life is the art of drawing without an eraser. So lets draw it carefully. Sketch everything and keep your curiosity fresh.</p>
              <b>Total Prize Money - &#8377; 2,500 </b>
    </div>
              </div>
              <div id="rules_sketching" class="tab-pane fade">
                 <div class="modal_text_style">
               <ol>
                <li>The theme of the event will be disclosed on spot.</li> 
    <li>Participants may participate in teams of two or individually.</li> 
    <li>Pencils, paper and other requirements will be provided to the participants by the organizers.</li>
    <li>The event is limited to a time frame of one hour.</li>
    <li> Use of mobile phones or other unfair means for inspiration is prohibited and will lead to immediate disqualification.</li>
    <li>No cheating will be allowed during event if anyone caught then participant will disqualify.</li>
    <li>The sketch will be judged on the basis of neatness, creativity and depiction of the theme. </li>
    <li>The decision of the judges and the organizers is final and binding.</li>

               </ol>

              </div>
              </div>
              <div id="contact_sketching" class="tab-pane fade">
				  <div class="modal_text_style">
				  	Ashish - 9447785645
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Junk Art   Modal -->
      <div class="modal fade" id="junk_art_modal" role="dialog">
        <div class="modal-dialog">

          <!--Junk Art  Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Junk Art </h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_junk_art">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_junk_art">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_junk_art">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_junk_art" class="tab-pane fade in active">
               <div class="modal_text_style">
                 <q>If you love the unpredictability of found materials and enjoy the inventiveness to transform them into sculptures, then let your creativity transform trash to treasure.</q><br><br>
                 <b>Total Prize Money - &#8377; 2,500 </b>
               </div>
              </div>
              <div id="rules_junk_art" class="tab-pane fade">
               <div class="modal_text_style">
               <ol>
                 <li>A team can consist of maximum three members.</li>
    <li>The theme will be declared on the spot.</li>
    <li>A collection of similar materials will be provided to each team.</li>
    <li>The teams will be allowed to break or deform the items as per the requirement</li>
    <li>Use of mobile phones is strictly prohibited. The team may be disqualified if found resorting to unfair means.</li>
    <li>The exhibit cannot be altered or supported during judgement</li>
    <li>Time limit is 2hrs.</li>
    <li> The decision of judges is final and binding. </li>
    </ol>
               </div>
              </div>
              <div id="contact_junk_art" class="tab-pane fade">
                <div class="modal_text_style">
                Vaishnavi - 9447785335 
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Doodle Drawing  Modal -->
      <div class="modal fade" id="doodle_drawing_modal" role="dialog">
        <div class="modal-dialog">

          <!--Doodle Drawing Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Doodle Drawing</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_doodle_drawing">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_doodle_drawing">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_doodle_drawing">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_doodle_drawing" class="tab-pane fade in active">
               <div class="modal_text_style">
              <p> Bored in class? Drawing doodles in notebook margins? Let your mind unleash the hidden doodler inside you and fill the page with a simple blend of colors to express the million emotions that hide among these sketches. Join this year's doodle drawing contest and win amazing prizes !</p>
              <b>Total Prize Money - &#8377; 2,500 </b>
              </div>
              </div>
              <div id="rules_doodle_drawing" class="tab-pane fade">
                 <div class="modal_text_style">
                 <ol>
             <li>  The doodle must contain a theme i.e. it should not be a random mess of caricatures. This theme will be declared on spot.</li> 
    <li>All necessary logistics will be provided during the event.</li>
    <li>Use of internet and adoption of unfair means will lead to immediate disqualification.</li>
    <li>The doodles will be judged anonymously.</li>
    <li>Doodles must not be derogatory, offensive or contain any inappropriate content.</li>
              </ol>
              </div>
              </div>
              <div id="contact_doodle_drawing" class="tab-pane fade">
               <div class="modal_text_style">
                 Akshitha - 9447785587
				  </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
        </div>

    <!-- INFORMALS -->
    <div id="informal_model">
    <!--Dumb Charades Modal -->
      <div class="modal fade" id="dumb_charades_modal" role="dialog">
        <div class="modal-dialog">

          <!--Dumb Charades Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Dumb Charades</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_dumb_charades">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_dumb_charades">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_dumb_charades">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_dumb_charades" class="tab-pane fade in active">
                <div class="modal_text_style">
    <q> Cause actions speak louder than words
    Are u master in silent speak? Come <q>N</q> play Dumb Charades.
    Keep silent. Zip thy lips</q><br><br>
    <b>Total Prize Money - &#8377; 1,500 </b>

                </div>
              </div>
              <div id="rules_dumb_charades" class="tab-pane fade">
               <div class="modal_text_style">
				   <p style="text-indent: 0px;">Max three people in team</p>
    Two rounds:
	<ol>
		<li>First round : Prelims</li>
    <li>Second round : Finals</li>
	</ol>
    <p>
    First round consists of 20-25 questions with some bonus questions included. It will be a written round where questions will be shown on the screen one by one. The questions will be asked related to anything about the movie or it’s name. The participant needs to depict the movie name from whatever is displayed. There is time limit for each question so that each team will get equal chance to guess the name.</p>

     <p>For the second round, a number of teams will be shortlisted for this final round. The teams will be given some time and in that time a member from a particular team has to enact the movies that they get by picking chits. Every member in a team has to enact movies by taking turns. The team which guesses more number of movies correctly wins.</p>

               </div>
              </div>
              <div id="contact_dumb_charades" class="tab-pane fade">
                <div class="modal_text_style">
            Siri Gadipudi - 9447785716</div>
              </div>

              </div>

            </div>

          </div>

        </div>
    </div>
     <!--Beg Borrow Steal Modal -->
      <div class="modal fade" id="beg_borrow_steal_modal" role="dialog">
        <div class="modal-dialog">

          <!--Beg Borrow Steal Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Beg Borrow Steal</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_beg_borrow_steal">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_beg_borrow_steal">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_beg_borrow_steal">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_beg_borrow_steal" class="tab-pane fade in active">
                <div class="modal_text_style">
   
    <p>Are you good at getting what you want? Are you the master fixer? Here&#39;s the event
    for you .Prepare yourself to gather the most weird, radical things. We give you a list of random items with points specified for each item. It&#39;s up to you to decide on the method you might want to employ to garner them. Scour the campus - make your deals - Beg from a friend - Borrow from strangers - Steal maybe (at your own risk!).</p>
    <p>The highest scoring team at the end of the stipulated time will be declared as the
    winner.</p>
    <b>Total Prize Money - &#8377; 1,000 </b>

                </div>
              </div>
              <div id="rules_beg_borrow_steal" class="tab-pane fade">
              <div class ="modal_text_style">
                <ol>
    <li>Maximum 3 players in a team.</li>
    <li>Time allotted will be 1 hour.</li>
    <li>List of items will be given at the start of the event.</li>
    <li>Points for each item will be specified along with some specific conditions.</li>
    <li>Teams will have to bring the items in the allotted time. First team to do so will be
    crowned the winner.</li>
    <li>. All the items must be submitted together. Once the submission is done, you are
    not supposed to alter the objects.</li>
    <li>In case of a Tie, the team submitting earlier will have an upper hand in the competition.</li>
    <li>If no team produces all the items within the allotted time, winner will be decided on the basis of points scored.</li>
    <li>The participants are solely responsible for their means of acquiring the required
    items.</li></ol>

              </div>
              </div>
              <div id="contact_beg_borrow_steal" class="tab-pane fade">
               <div class="modal_text_style">
Ramanan - 9447786101

               </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Treasure Hunt Modal -->
      <div class="modal fade" id="treasure_hunt_modal" role="dialog">
        <div class="modal-dialog">

          <!--Treasure Hunt Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Treasure Hunt</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_treasure_hunt">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_treasure_hunt">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_treasure_hunt">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_treasure_hunt" class="tab-pane fade in active">
                <div class="modal_text_style">
    <p>If you&#39;re fascinated by a ride through a maze of questions leading you (and sometimes misleading) to more intriguing ones, here&#39;s an adventure that is guaranteed to give you the thrill of a lifetime.</p>
    <p>Round 1 : Written round</p>
     <p>Round 2 : Actual Treasure hunt</p>
     <b>Total Prize Money - &#8377; 1,500 </b>
    </div>
              </div>
              <div id="rules_treasure_hunt" class="tab-pane fade">
                <div class="modal_text_style">
                  <ol>
    <li>The team should contain a minimum of 3 members and a maximum of 4 members.</li>
    <li>The preliminary round will be a written round which will be time constrained.</li>
    <li>Use of phones, laptops, discussions with non-team members unless otherwise allowed as part of event will lead to instant disqualification of the team.</li>
    <li>Location of hunt will consist of any available/allowed area within the college campus and a walkable radius outside it. Exact boundaries and specific rules will be revealed at the start of the event.</li>
    <li>In case of any conflicts, decision of the organizers will be final and binding.</li></ol>

                </div>
              </div>
              <div id="contact_treasure_hunt" class="tab-pane fade">
                <div class="modal_text_style">
    <p>Lakshmi Mohan - 9447436525</p>
           <p>Reema Mathew - 8943197473</p>

                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Crime Scene Modal -->
      <div class="modal fade" id="crime_scene_modal" role="dialog">
        <div class="modal-dialog">

          <!--Crime Scene Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Crime Scene</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_crime_scene">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_crime_scene">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_crime_scene">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_crime_scene" class="tab-pane fade in active">
             <div class = "modal_text_style">
    <q>When you have eliminated the impossible, whatever remains, however improbable, must be the truth</q>. 
    <p>Participate and let the mysteries unfold. Generate the best fitted theory which explains the single truth of the mystery that seduces the intellectual. There will be multiple paths, all seems for sure misleading. Take a step back and eliminate the odds and chase the truth.</p>

    <q style="margin-bottom: 10px;">The world is full of obvious things which nobody by any chance ever observes.</q>
    <p>So, Look, Observe, Solve</p>
			<b>Total Prize Money - &#8377; 1,500 </b>
             </div>
              </div>
              <div id="rules_crime_scene" class="tab-pane fade">
             <div class = "modal_text_style">
    There are two missions Detective<br>
    Objective 1 : A question paper round.<br>
    Objective 2 : Jump in for some fieldwork. A clue based round in which you have to deduce the way the crime was committed by observing the crime scene and investigating the objects.
     <ol>
    <li>Maximum of 2 in a team.</li>
    <li>The preliminary round will be marked based on the answers.</li>
    <li>Top 7 teams will be selected for solving the actual crime scene.</li>
    <li>The marks for the final round will be based on the relative closeness to the real solution of the problem, creativity, money unexpended and the residual time from submission.</li>
    <li>In case of conflict, decision of the judges would be final.</li>
    </ol>
             </div>
              </div>
              <div id="contact_crime_scene" class="tab-pane fade">
                <div class="modal_text_style">
    Debottam - 9447786083                 
                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Fashion Show Modal -->
      <div class="modal fade" id="fashion_show_modal" role="dialog">
        <div class="modal-dialog">

          <!--Fashion Show Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Fashion Show</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_fashion_show">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_fashion_show">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_fashion_show">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_fashion_show" class="tab-pane fade in active">
                <div class="modal_text_style">
    <q>Fashion is a way to say who you are without having to speak.</q>
              <p>Fashion is an expression, an art form which beautifies. It requires immense passion and creativity. Fashion is what defines us. Do the flashing lights, the eager crowd, the jazzy music and the glamour entice you? Here is a chance to showcase the inner artist in you.  Come and join us for this dazzling event oozing with style and glamour.</p>
				<b>Total Prize Money - &#8377; 33,000 </b>
                </div>
              </div>
              <div id="rules_fashion_show" class="tab-pane fade">
             <div class="modal_text_style">
    <ol><li>A minimum of 8 models per team.</li>
    <li>Team size: Maximum 15, inclusive of designer, make-up artist and backstage help.</li>
    <li>Time limit allotted for each team is 15 minutes including the stage preparation.</li>
    <li>The music format should be mp3 and is to be submitted at the help desk 30 minutes prior to the event.</li>
    <li>Presenting banners, posters or other materials directly displaying the theme is strictly prohibited.</li>
    <li>The event is open only for college students and every member of the team should produce their college ids compulsorily.</li></ol>

             </div>
              </div>
              <div id="contact_fashion_show" class="tab-pane fade">
                <div class="modal_text_style">
    <p>Kaninika Pant - 9497300467</p>
             <p>Sayali Shinde - 9497300440</p>

                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Mr and Ms Dhanak Modal -->
      <div class="modal fade" id="mr_and_ms_dhanak_modal" role="dialog">
        <div class="modal-dialog">

          <!--Mr and MS Dhanak Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Mr And Ms Dhanak</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_mr_and_ms_dhanak">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_mr_and_ms_dhanak">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_mr_and_ms_dhanak">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_mr_and_ms_dhanak" class="tab-pane fade in active">
                <div class="modal_text_style">
    <q>Because the people who are crazy enough to think that they can change the world are the ones who do</q>
    <p align="right"> - Steve Jobs</p>
      <p>Mr. and Ms. Dhanak, a hunt for the best personality at Asia&#39;s only space college&#39;s cultural festival. What are you waiting for? Amazing prizes are at stake and who knows you might even rediscover yourself. So come on, let the pop flow through you.</p>
    <p>It is the best place for you to showcase your subtle wit, crackling sense of humour, impeccable charm and that covetous glamour and leave an everlasting impression on the mind of every attendant of Dhanak! After all who wouldn&#39;t want to be recognised for something you do the best - being your gorgeous self.</p>
    <p>Format:-</p>
    <p>1.  Written Round</p>
    <p>2.  Personal interview</p>
    <p>3.  On street task</p>
    <p>4.  Ramp walk and stage presence</p>
		<b>Total Prize Money - &#8377; 4,000 </b>

                </div>
              </div>
              <div id="rules_mr_and_ms_dhanak" class="tab-pane fade">
                <div class="modal_text_style">
    There ain't no rules except one - Be yourself
                </div>
              </div>
              <div id="contact_mr_and_ms_dhanak" class="tab-pane fade">
                <div class="modal_text_style">
    Adithya Krishnan - 9619915201
                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Dostana Modal -->
      <div class="modal fade" id="dostana_modal" role="dialog">
        <div class="modal-dialog">

          <!--Dostana Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Dostana</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_dostana">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_dostana">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_dostana">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_dostana" class="tab-pane fade in active">
                <div class="modal_text_style">
                 <p>Come and indulge in this fascinating and crazy quest of your friendship and prove to be the best of best.</p>
                 <b>Total Prize Money - &#8377; 1,000 </b>
                </div>
              </div>
              <div id="rules_dostana" class="tab-pane fade">
                <div class="modal_text_style">
                  
    Round 1: <q>Let the truth be told</q>
    <ol>
    <li>Questions will be given separately to each member of the team to judge the level
    of understanding they share.
    </li>
    <li>Partners will be seated in different rooms.
      </li>
    <li>Use of messaging or any kind of contact amongst the team members will lead to
    immediate disqualification.
    </li>
    </ol>
    Round 2 and Round 3: <q>Act to react</q>
    <ol>
    Each team will be given a task to perform , subject to time constraints.
					</ol>
 <ol>
	 <li>Number of Team Members: 2</li>
   <li> Help from others will not be entertained.</li>
   <li> Evaluation and judgment will be in the hands of coordinators and organisers. Their
    decision should be final and binding.</li>
                </ol>

                </div>
              </div>
              <div id="contact_dostana" class="tab-pane fade">
                <div class="modal_text_style">
    Kalyani - 9447785014 <br>
               Shailesha - 9447785699
                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
        </div>

    <!--ONLINE-->
    <div id="online_model">
    <!--Movie Making  Modal -->
      <div class="modal fade" id="movie_making_modal" role="dialog">
        <div class="modal-dialog">

          <!--Movie Making Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Movie Making</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_movie_making">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_movie_making">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_movie_making">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_movie_making" class="tab-pane fade in active">
                  <h4 style="text-align:center">Last date for Submission - 20 October 2017</h4>
                <div class="modal_text_style">
                Philme sirf teen wajah se chalti hai, wo hai - <br>
                <p align="center"> ENLIGHTEN ENGAGE ENTERTAIN <p>
            Movie making is an imagination fleshed out into a visible script.
        The competitions is open to innovative, entertaining and celebratory short films and Dhanak 2k17 gives you the platform to unleash your thoughts and explore your horizons.
        <br><br>
        <b>Total Prize Money - &#8377; 5,000 </b>
    </div>
              </div>
              <div id="rules_movie_making" class="tab-pane fade">
                <div class="modal_text_style">
                <ol>
                <li>Time limit shouldn't exceed 15 minutes and minimum should be 3 minutes - including titles and credits.</li>
    <li>Movie can be of any language, but must have English subtitles.</li>
    <li>The competition does not have a theme.</li>
    <li> Copying of videos clips from other movies is not permitted.</li>
    <li>Judging will be based on script, sound design, camera skills, direction, editing and acting.</li>
    <li>The decisions of judges are final and binding.</li>
    <li>All the entries should be mailed at onlineevents.dhanak@gmail.com.</li>
    <li> If the file is too large to attach in mail, you can use other alternative methods like Google drive, Dropbox etc.</li>
            </ol>

              </div>
              </div>
              <div id="contact_movie_making" class="tab-pane fade">
                 <div class="modal_text_style">
               Ankit Gupta - 9447785149

              </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Let's Meme  Modal -->
      <div class="modal fade" id="lets_meme_modal" role="dialog">
        <div class="modal-dialog">

          <!--Let's Meme Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Let&#39;s Meme</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_lets_meme">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_lets_meme">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_lets_meme">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_lets_meme" class="tab-pane fade in active">
                  <h4 style="text-align:center">The event has been closed.</h4>
                <div class="modal_text_style">
                <p>Year 2050, the Indian Government has banned memes,but wait, wait, wait, Dhanak 2k17 presents you with an opportunity, still legal, to show the world the memester inside you!!</p>
				
                </div>
              </div>
              <div id="rules_lets_meme" class="tab-pane fade">
                <div class="modal_text_style">
                <p>This is a weekly event, held on Facebook and Instagram, which commences 3rd September 2017, with prize money worth Rs. 2500.</p>
                <ol>
    <li>The entry must not contain material that offends any particular group of people or religion DIRECTLY.</li>
    <li>An entry can contain single/mixture of images.</li>
    <li> Copying of meme isn't permitted, although ideas can be taken and presented in an unfamiliar way.</li>
    <li>A maximum of 3 memes are allowed per person throughout the competition.</li>
    <li>Maximum size: 5MB.</li>
    <li>The photos can be of any format: .jpg, .jpeg, .png.</li>
    <li>Equal weight-age shall be given to likes (FB and Insta) and judges’ decision to decide upon the winner.</li>
    <li> All the entries should be mailed at onlineevents.dhanak@gmail.com.</li>
    <li>Participants are required to provide links to their Facebook and/or Instagram accounts so as to let us tag them.</li>
    <li>The events commences every Thursday (00.00 hrs) and concludes the next Thursday (00.00 hrs).</li>
    </ol>

                </div>
              </div>
              <div id="contact_lets_meme" class="tab-pane fade">
                <div class="modal_text_style">
                Ankit Gupta - 9447785149 

                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Dubsmash  Modal -->
      <div class="modal fade" id="dubsmash_modal" role="dialog">
        <div class="modal-dialog">

          <!--Dubsmash Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Dubsmash</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_dubsmash">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_dubsmash">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_dubsmash">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_dubsmash" class="tab-pane fade in active">
                  <h4 style="text-align:center">The event has been closed</h4>
                <div class="modal_text_style">
                  <q>A friend should always underestimate your virtues
    and an enemy overestimate your faults </q>
					<p align="right">- Don Corleone(The Godfather)</p>
					<p>Dialogues are easy to read but the emotions aren't so easy to unveil.</p>
   <p> A shout-out to the actor within you!! Don't miss the chance to be part of the Kerala's biggest fest, Dhanak 2k17 inviting you to show your acting talent.</p>
   <b>Total Prize Money - &#8377; 2,000 </b>

                </div>
              </div>
              <div id="rules_dubsmash" class="tab-pane fade">
                <div class="modal_text_style">
               <p>  This is a weekly event which commences 3rd September 2017, with prize money worth Rs. 2500.</p>
     <ol>
    <li>Compilations of videos can be done.</li>
    <li>Only the person enacting should send the mail.</li>
    <li>Videos can be in any language.</li>
    <li>Maximum time - 30 sec.</li>
    <li>A maximum of 3 dubsmash videos are allowed per person throughout the competition.</li>
    <li>Maximum size: 20 MB.</li>
         <li>Equal weight-age shall be given to likes(FB and Insta)</li> <li>All the entries should be mailed at onlineevents.dhanak@gmail.com, containing the original source of the dialogue.</li>
    <li>Participants are required to provide links to their Facebook and/or Instagram accounts so as to let us tag them.</li>
    <li>The events commences every Wednesday (00.00 hrs) and concludes the next Wednesday (00.00 hrs).</li>
    </ol>

                </div>
              </div>
              <div id="contact_dubsmash" class="tab-pane fade">
                <div class="modal_text_style">
                Ankit Gupta - 9447785149 
                </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Storywriting  Modal -->
      <div class="modal fade" id="storywriting_modal" role="dialog">
        <div class="modal-dialog">

          <!--Storywriting Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Storywriting</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_storywriting">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_storywriting">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_storywriting">Contact</a></li>    
              </ul>

              <div class="tab-content">
                    <h4 style="text-align:center">Last date for Submission - 20 October 2017</h4>
            <div id="home_storywriting" class="tab-pane fade in active">
                  <div class="modal_text_style">
               <p> Each one of us is a story. But all these stories have one thing in common- with all your imperfections, you are the hero of your story, each one of us is entitled to that joy. No matter how feeble others may feel it to be, this story is all we have of ourselves- the thread through all our consciousness, the legacy of our very existence. Can one imagine a better world than that in which every human's story is someone's favourite?</p>
               <b>Total Prize Money - &#8377; 1,500 </b>
                </div>
              </div>
              <div id="rules_storywriting" class="tab-pane fade">
              <div class="modal_text_style">
              <ol>
               <li>   Submit your entry via mail to onlineevents.dhanak@gmail.com</li>
    <li>Your entry must be in English.</li>
    <li>Categories:
              <ol>
               		<li>  Genre: Short Story (Mystery, romance, Horror, etc.)</li>
                 	<li> Mainstream/Literary Short Story
                  Children&#39;s&#47; Young Adult Fiction</li>
       	 		</ol>
       	 		</li>
    <li>Max word count: 2000 words</li>
    <li>Only one entry is allowed per person.</li>
    <li>The deadline for the entries is 12 midnight on 20th October 2017.</li>
    <li>The filename of online entries must be the title of the entry and it must be either a .doc, .docx, .pdf or .txt file.</li>
    </ol>
            </div>
              </div>
              <div id="contact_storywriting" class="tab-pane fade">
                     <div class="modal_text_style">
                        Garima Aggarwal - 9497300090
              </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Poetry  Modal -->
      <div class="modal fade" id="poetry_modal" role="dialog">
        <div class="modal-dialog">

          <!--Poetry Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Poetry</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_poetry">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_poetry">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_poetry">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_poetry" class="tab-pane fade in active">
                    <h4 style="text-align:center">Last date for Submission - 20 October 2017</h4>
              <div class="modal_text_style">
                <p> Poetry is not a turning loose of emotion, but an escape from emotion; it is not the expression of personality, but an escape from personality. But, of course, only those who have personality and emotions know what it means to want to escape from these things. Hey&#46;&#46;wait!! It&#39; not really complicated!! If you cannot be a poet, be the poem. DHANAK 2k17 brings forth to you the opportunity to express your true potential.</p>
                <b>Total Prize Money - &#8377; 1,500 </b>
              </div>
              </div>
              <div id="rules_poetry" class="tab-pane fade">
                <div class="modal_text_style">
                <ol>
                  <li>     Submit your entry via mail to onlineevents.dhanak@gmail.com</li>
    <li> Your entry must be in English, Hindi or Malayalam, each of which will be judged separately.</li>
    <li> Categories:
            <ol>
              <li>    Narrative</li>
                <li>  Dramatic</li>
              <li>    Satirical</li>
               <li>   Lyric</li>
                <li>  Speculative
                  Prose</li>
                </ol>
    </li>
    <li>Max word count: 200 words</li>
    <li>Only one entry is allowed per person</li>
    <li>The deadline for the entries is 12 midnight on 20th October 2017.</li>
    <li>The filename of online entries must be the title of the entry and it must be either a .doc, .docx, .pdf or .txt file.</li>
    <li>No content of it should be copied.</li>
    </ol>.
              </div>
              </div>
              <div id="contact_poetry" class="tab-pane fade">
               <div class="modal_text_style">
                        Garima Aggarwal - 9497300090
              </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--The Picturesque  Modal -->
      <div class="modal fade" id="the_picturesque_modal" role="dialog">
        <div class="modal-dialog">

          <!--The Picturesque Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">The Picturesque</h4>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_the_picturesque">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_the_picturesque">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_the_picturesque">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_the_picturesque" class="tab-pane fade in active">
                  <h4 style="text-align:center">Last date for Submission - 20 October 2017</h4>
                 <div class="modal_text_style">

                     <p>   Photographs, as they say, speak a million words. But beyond what the cliche stands to offer, these pictures also provide a sneaky window for our selves, to the words left unspoken, to the nostalgia buried under our sturdy conscience and to the feelings that never got articulated.</p>

    Theme:
    <ol>
    <li>  Topography Lite</li>
    <li>      Expression</li>
    <li>      Food. Wedding. Family</li>
    <li>       Weather</li>
    <li>     Travelogue</li>
    <li>      Documentary</li>
    <li>      Wildlife</li>
    </ol>
    <br>
    <b>Total Prize Money - &#8377; 3,000 </b>
              </div>
              </div>
              <div id="rules_the_picturesque" class="tab-pane fade">
                 <div class="modal_text_style">

                        <ol>
                       <li> Each participant can submit a MAXIMUM of 3 entries in any of the mentioned themes as they deem fit.</li>
    <li>All photographs should be sent by the participant, to onlineevents.dhanak@gmail.com along with your name, college name and contact details.</li>
    <li>  Images submitted must be in JPEG format and at least 640 pixels on the shorter side</li>
    <li>       It is mandatory that the photographs contain a proper caption (not exceeding 50 words) accompanying each picture. The images must be coloured pr monochrome.</li>
    <li>       Submitted pictures must be ORIGINAL and taken by the participant.</li>
    <li>      All submitted photos must contain the original EXIF metadata information. However there must be no borders, logos, copyright marks and/or references on the image.</li>
    <li>       Basic editing, including colour enhancement, use of filters and cropping of the photo(s) is acceptable, provided any such editing does not affect the authenticity and /or genuineness of the photo(s).</li>
    <li>       The winning photographs will be exhibited during the Dhanak Photography Exhibition.</li>
    </ol>
              </div>
              </div>
              <div id="contact_the_picturesque" class="tab-pane fade">
               <div class="modal_text_style">
                        Garima Aggarwal - 9497300090
              </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    <!--Webbed  Modal -->
      <div class="modal fade" id="webbed_modal" role="dialog">
        <div class="modal-dialog">

          <!--Webbed Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Webbed</h4>    
              <a href="webbed.php" target="_blank" style="color: red;font-weight: bold">Play</a>

            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs">
                <li class="about"><a data-toggle="tab" href="#home_webbed">About</a></li>
                <li class="rules"><a data-toggle="tab" href="#rules_webbed">Rules</a></li>
                <li class="contact"><a data-toggle="tab" href="#contact_webbed">Contact</a></li>    
              </ul>

              <div class="tab-content">
              <div id="home_webbed" class="tab-pane fade in active">
                <div class="modal_text_style">
                     <p> If last year&#39;s ride through the maze of questions that led &#40;and misled&#41; you to more
    intriguing ones fascinated you, here&#39;s a virtual adventure that is guaranteed to
    give the thrill of a lifetime. Webbed is back &#45; with murkier corners, crazier
    questions, innumerable twists and turns and a huge amount of fun!</p>
<b>Total Prize Money - &#8377; 5,000 </b>
              </div>
              </div>
              <div id="rules_webbed" class="tab-pane fade">
               <div class="modal_text_style">
                   Format:
                   <ol>
    <li>        What you have to do:
    Your mission should you choose to accept is to navigate from one webpage to
    another, using all of the information available on it. You may need more than just a mouse and a keyboard for accomplishing your tasks.</li>
                       <li>      What you will need:</li>
    <ol>
    <li>Lateral Thinking <br>
    Two skew lines may or may not meet at only one point. In short, thinking straight is a not a good idea.</li>
    <li>Common Sense<br>
    Voltaire was right about a lot of things, but never did he hit the nail right on its head so hard.</li>
    <li>Sense of Humor<br>
    Stop by a question once in a while and smell the roses. See the lighter side of things.</li>
    <li>General Knowledge<br>
    Neither necessary nor sufficient, it usually helps. GIYF, in any case.</li>
    <li>Perseverance and Integrity</li>
    </ol>
    <li>Cheaters never prosper. No tomfoolery of this sort will be tolerated.</li>
    </ol>
              </div>
              </div>
              <div id="contact_webbed" class="tab-pane fade">
               <div class="modal_text_style">
                       Sneha - 9497071826 <br>
    Amal RS - 9497022600

              </div>
              </div>

              </div>

            </div>

          </div>

        </div>
      </div>
        </div>

    
    
 
 
 
<script>
	var a = $(window).width();
	var q = 1;	
	var b = $(window).height();
	var bn = 0;
    var BrowserDetect = {
        init: function () {
            this.browser = this.searchString(this.dataBrowser) || "Other";
            this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
        },
        searchString: function (data) {
            for (var i = 0; i < data.length; i++) {
                var dataString = data[i].string;
                this.versionSearchString = data[i].subString;

                if (dataString.indexOf(data[i].subString) !== -1) {
                    return data[i].identity;
                }
            }
        },
        searchVersion: function (dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index === -1) {
                return;
            }

            var rv = dataString.indexOf("rv:");
            if (this.versionSearchString === "Trident" && rv !== -1) {
                return parseFloat(dataString.substring(rv + 3));
            } else {
                return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
            }
        },

        dataBrowser: [
            {string: navigator.userAgent, subString: "Edge", identity: "MS Edge"},
            {string: navigator.userAgent, subString: "MSIE", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Trident", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Firefox", identity: "Firefox"},
            {string: navigator.userAgent, subString: "Opera", identity: "Opera"},  
            {string: navigator.userAgent, subString: "OPR", identity: "Opera"},  

            {string: navigator.userAgent, subString: "Chrome", identity: "Chrome"}, 
            {string: navigator.userAgent, subString: "Safari", identity: "Safari"}       
        ]
    };
    
    BrowserDetect.init();

	function update(m) {		
	if(a>768){
    	var h = $("#img").height();		
		h=h+20;	
    	$(".tab").css({top:h});
		$("#Tab" + m).css({right:0});
		$(".tab").css({left: '0px'});
		$(".tab").css("display","block");
		$(".close_button").css("display","none");
		$(".tablinks").css("height","12.5vh");
		
	}	
		else if(a>600&&a<=768&&b>=500){
			var h = $("#img").height();		
		h=h+20;	
    	$(".tab").css({top:h});
		$("#Tab" + m).css({right:0});
		$(".tab").css({left: '0px'});
		$(".tab").css("display","block");
		$(".close_button").css("display","none");
		var p = $(window).height();
		var r = $("#img").height();	
		$(".tab").height(p-r);
			$(".tablinks").css("height","12.5vh");
		}
		else if(a>600&&a<=768&&b<=500){		
		$(".tab").css({top: '0px'});
			var p = $(window).height();
		var r = $("#img").height();	
		$(".tab").height(p-r);
			$(".tablinks").css("height","12.5vh");
		}
		
	else if(a<=600){
		tab_center(m);
		$(".tab").css("display","none");
		var p = $(window).height();
		var r = $("#img").height();	
		$(".tab").height(p-r);
		$(".desktop_text").css("display","none");
		$(".mobile_text").css("display","block");
		$(".tablinks").css("height","11.7vh");
		if(BrowserDetect.browser == 'Chrome'){
			//$(".navtab").css("height","120vh");
			//$(".navtab").height(b);
			$(".def").css("height","93vh");
			$(".abc").css("height","93vh");
			$(".tablinks").css("height","11vh");
		}
	}
		
}	
	function tab_center(i){
		var b = $("#Tab" + i).width();
		var c = (a-b)/2;
		$("#Tab" + i).css({right:c});
		$(".mobile_header").width(a);
	}	
		$(window).on('resize', function () {
    	update(q);
		var bk = $(window).width();
		a = bk;
			if($("#id01").css('display') == 'none')
           		location.reload();
			//var kl = $(".def").width();
		//$(".text").width(kl);
	});	
		$(window).on('load',function(){
		
		q=1;
   		update(q);
		var bl = $(window).width();
		a = bl; 
		//var kl = $(".def").width();
		//$(".text").width(kl);
	});
	update(q);
	$(document).ready(function(){
    $(this).scrollTop(0);
		$(".tablinks").click(function() {
		var tab_id = $(this).attr('data-tab');
		$(".tabcontent").css("display","none");		
		$(".tablinks").removeClass("active");		
		$("#"+tab_id).css("display","block");
		$(this).addClass("active");
		if(a<600){
			$(".tab").css("display","none");
			$("#log").css("display","block");
		}		
    });
		$(".tablinks").click(function() {		
		var i = $(this).index();
		q = i;
		update(q);
        var w = $(window).width();
        if(w < 481){
            var k = $(".navtab").width();
              $(".navtab").animate({left: -k});
            //write code to delay program flow for 1 sec, enough for animation to happen
              $(".navtab").css("display","none");
        }
    });
        $(".other").click(function() {		
		if((window.innerHeight < window.innerWidth)&&(bn==0))
			location.reload();
			if((window.innerHeight > window.innerWidth)&&(bn==1))
			location.reload();
    });
		$("#loginbut").click(function() {
		if(window.innerHeight < window.innerWidth){
			 bn = 1;
		}	
    });
		
		$(".ham").click(function() {
		var k = $(".navtab").width();
		$(".navtab").css({top: '0px'});
		$(".navtab").css({left: -k});
        $(".navtab").css("display","block");
		$(".close_button").css("display","block");
		$(".navtab").animate({left: '0px'});
		$("#log").css("display","none");	
    });
		$(".close_button").click(function() {
		var k = $(".navtab").width();
		  $(".navtab").animate({left: -k});
		//write code to delay program flow for 1 sec, enough for animation to happen
		  $(".navtab").css("display","none");
		$("#log").css("display","block");
    });
	
});
	
	$(".about1").click(function() {
		$(".about").children().trigger("click");
		$(".about").addClass("active");
		$(".rules").removeClass("active");
		$(".contact").removeClass("active");
		
    });
	$(".rules1").click(function() {
		$(".rules").children().trigger("click");		
		$(".about").removeClass("active");
		$(".rules").addClass("active");
		$(".contact").removeClass("active");
		
    });
	$(".contact1").click(function() {
		$(".contact").children().trigger("click");
		$(".about").removeClass("active");
		$(".rules").removeClass("active");
		$(".contact").addClass("active");		
    });
	
	
/*$(".tab").on('touchmove', function(e){
	e.stopPropagation();
})*/
//	var $s = $(".tab");
//	$s.bind('touchstart',function(ev){
//		var $this = $(this);
//		var s = $s.get(0);
//		if($this.scrollTop() === 0) $this.scrollTop(1);
//		var sTop = s.scrollTop;
//		var sHeight = s.scrollHeight;
//		var offsetHeight = s.offsetHeight;
//		var contentHeight = sHeight - offsetHeight;
//		if(contentHeight == scrollTop) $this.scrollTop(scrollTop - 1);
//	});
/*document.addEventListener('touchmove',function(event){
	if(event.target.parentNode.className.indexOf('noBounce')!=-1||event.target.className.indexOf('noBounce')!=-1){
		event.preventDefault();
	console.log("hi");}
},false);*/
</script>    
</body>
</html> 
