<?php
	error_reporting(0);
	require 'connect.php';
	if($db->connect_error){
		die('Currently encountering problems');
	}
	else{
		if($_POST){
			$name   = test_input($_POST["name"]);
			$mail   = test_input($_POST["mail"]);
			$clg    = test_input($_POST["clg"]);
			$tel    = test_input($_POST["tel"]);
			$branch = test_input($_POST["branch"]);
			if(!empty($name) && !empty($mail) && !empty($tel) && !empty($branch) && !empty($clg)){
				$check = $db->query("SELECT * FROM ca WHERE Name = '".$name."'");
				if(!$check->num_rows){
                    if(preg_match('/^\d{10}$/',$tel)){
                        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            if($insert = $db->query("INSERT INTO ca (Name,Contact,Branch,Email,College) VALUES('{$name}','{$tel}','{$branch}','{$mail}','{$clg}')")){
                                echo('success');
                            }
                            else{
                                echo('Currently encountering problems');
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
	}
?>