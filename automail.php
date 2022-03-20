<?php
require 'connect.php';
$info = $db->query("SELECT *FROM webbed_reg WHERE active = '0'");
foreach($info as $i){
	

$mail = $i['Email'];
$name = $i['Name'];
$pass = $i['Password'];
$tel = $i['Phone'];
$clg = $i['Clg'];
$hash = $i['Verify'];
echo($name);
$to = $mail;
$subject = 'Signup Verification | Webbed Dhanak 2017'; 

$message = '
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>It seems like you have not verified your account.</p>
<p> 
------------------------<br>
Username: '.$name.'<br>
Password: '.$pass.'<br>
Mobile: '.$tel.'<br>
College: '.$clg.'<br>

------------------------
</p> 
<h2>Here is the link to activate your account:</h2>
<a href="dhanak.co.in/verify.php?email='.$mail.'&hash='.$hash.'">Activate your account</a>


</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webbed@dhanak.co.in>' . "\r\n";

if(mail($to,$subject,$message,$headers)){
	echo("success");
}
	else{
		echo("f");
	}
}
?>