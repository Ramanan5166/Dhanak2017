<?php
	error_reporting(0);
    require 'connect.php';
	$err = "";
	if($db->connect_error){
		die('Currently encountering problems');
	}
	else{
		if($_POST){
			$name = test_input($_POST['name']);
			$pass = test_input($_POST['pass']);
			$log = $db->query("SELECT * FROM login WHERE Name = '".$name."'");
			$logi = mysqli_fetch_assoc($log);
			if(!empty($name) && !empty($pass)){
				if($logi['Name']){
					if($logi['Password'] == $pass){
						$err = "success";
					}
					else{
						$err = "wrong password";
					}
				}
				else{
					$err = "Username doesn't exist.Pls signup.";
				}
			}
			else{
				$err = "Enter values";
			}
	echo($err);
				//header('Location:test.php');
		}
	}

?>