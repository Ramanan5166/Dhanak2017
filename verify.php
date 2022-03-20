<?php
//	error_reporting(0);
    require 'connect.php';
	$err = "";
	if($db->connect_error){
		die('Currently encountering problems');
	}
	else{
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            $email = $_GET['email']; 
            $hash = $_GET['hash'];
            if($check = $db->query("SELECT * FROM webbed_reg WHERE Email='".$email."' AND Verify='".$hash."' AND active='0'")){
                if($check->num_rows){
                    if($db->query("UPDATE webbed_reg SET active='1' WHERE Email='".$email."' AND Verify='".$hash."' AND active='0' ")){
                        echo '<script><alert("Your account has been activated, you can now login");</script>';
                        echo("Redirecting to a different page...");
                        header("Location: webbed.php");
                    }
                    else{
                        echo('currently Encountering Problems');
                    }
                    }
                else{
                    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                }
            }   
            else{
                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
            }
            
            }
		if(isset($_POST['type']) && $_POST['type']== "log"){
			$name = test_input($_POST['name']);
			$pass = test_input($_POST['pass']);
			$log = $db->query("SELECT * FROM webbed_reg WHERE Name = '".$name."'");
			$logi = mysqli_fetch_assoc($log);
			if(!empty($name) && !empty($pass)){
				if($logi['Name']){
                    if($logi['Password'] == $pass){
                        if($logi['active'] == 1){
                            $err = "success";
                        }
                        else{
                            $err = "Please verify your account";
                        }
                    }
                    else{
                        $err = "Wrong Password";
                    }
				}
				else{
					$err = "Username doesn't exist.Please signup.";
				}
			}
			else{
				$err = "Enter values";
			}
	echo($err);
				//header('Location:test.php');
		}
		if(isset($_POST['type']) && $_POST['type'] == "sign"){
			$name   = test_input($_POST["name"]);
			$mail   = test_input($_POST["mail"]);
			$clg    = test_input($_POST["clg"]);
			$tel    = test_input($_POST["tel"]);
			$pass = test_input($_POST["pass"]);
			if(!empty($name) && !empty($mail) && !empty($tel) && !empty($pass) && !empty($clg)){
				$check = $db->query("SELECT * FROM webbed_reg WHERE Name = '".$name."'");
				if(!$check->num_rows){
                    if(preg_match('/^\d{10}$/',$tel)){
                        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $c = $db->query("SELECT * FROM webbed_reg WHERE Email = '".$mail."'");
                            if(!$c->num_rows){
                                if(strlen($pass)>=8 && strlen($pass)<=20){
                                    $hash = md5( rand(0,1000) );
                                    if($insert = $db->query("INSERT INTO webbed_reg (Name,Phone,Password,Email,Clg,Level,Verify,active) VALUES('{$name}','{$tel}','{$pass}','{$mail}','{$clg}','1','{$hash}','0')")){
                                  

										$to      = $mail;
                                        $subject = 'Signup Verification | Webbed Dhanak 2017'; 

$message = '
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Thanks for signing up!</p>
<p>Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.</p>
<p> 
------------------------<br>
Username: '.$name.'<br>
Password: '.$pass.'<br>
Mobile: '.$tel.'<br>
College: '.$clg.'<br>

------------------------
</p> 
<h2>Please click this link to activate your account:</h2>
<a href="dhanak.co.in/verify.php?email='.$mail.'&hash='.$hash.'">Activate your account</a>


</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webbed@dhanak.co.in>' . "\r\n";
										mail($to, $subject, $message, $headers); 
                                        echo('success');
                                    }
                                    else{
                                        echo($db->error);
                                    }
                                }
                                else{
                                    echo('Password needs to be 8 to 20 characters');
                                }
                            }
                            else{
                                echo('Email exists');
                            }
                        }
                        else{
                            echo('Enter a valid email address');
                        }
                    }
                    else{
                        echo('Enter a valid mobile number');
                    }
                }                
				else{
					echo('Username exists');
				}
			}
			else{
				echo("Input data");
			}
		}
		if(isset($_POST['type']) && $_POST['type'] == "verify"){
            $ans = $_POST['ans'];
            $name = $_COOKIE['wname'];
            $check = $db->query("SELECT * FROM webbed_reg WHERE Name = '".$name."'");
            $info = mysqli_fetch_assoc($check);
            if($check->num_rows){
                $lvl = $info['Level'];
                $comp = $db->query("SELECT * FROM level WHERE Level = '".$lvl."'");
                $cans = mysqli_fetch_assoc($comp);
                if($cans['answer'] === $ans){
                    if($update = $db->query("UPDATE webbed_reg SET Level=".($lvl+1).",Time= CURRENT_TIME WHERE Name = '".$name."'")){
                        echo("success");
                    }
                    else{
                        echo($db->error);
                    }
                }
                else{
                    echo("Try again");
                }
            }
            else{
                echo("User doesn't exist.Please login");
            }
        }
	}
?>