<?php
	error_reporting(0);
	require 'connect.php';
	if($db->connect_error){
		die('Currently encountering problems');
	}
	else{
		if($_POST){
			$name = test_input($_POST["name"]);
			$mail = test_input($_POST["mail"]);
			$clg  = test_input($_POST["clg"]);
			$pass = test_input($_POST["pass"]);
			if(!empty($name) && !empty($mail) && !empty($pass)){
				$check = $db->prepare("SELECT Name FROM login WHERE Name = ?");
                $check->bind_param("s",$name);
                $check->execute();
                $check->bind_result($no);
                $check->fetch();
				if(!$no){
                    $check->close();
                    if(preg_match('/^\d{10}$/',$mail)){
                        if(strlen($pass)>=8 && strlen($pass)<=20){
                            $insert = $db->prepare("INSERT INTO login (Name,Contact,Password,College) VALUES(?,?,?,?)");
                            $insert->bind_param("siss",$name,$mail,$pass,$clg);
                            if($insert->execute()){
                                $insert->close();
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
	}
?>