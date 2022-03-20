<?php
    error_reporting(0);
	require 'connect.php';
	if($db->connect_error){
		die('Currently encountering problems');
	}
	else{
		if($_POST){
            $name = test_input($_COOKIE['name']);
            $cat  = test_input($_POST['cat']);
            $q = "CREATE TABLE  $cat (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                Name VARCHAR(100) NOT NULL,
                Contact BIGINT(100) NOT NULL
            )";
            if($name != ""){
                if($create = $db->query($q)){
                    $check = $db->query("SELECT * FROM $cat WHERE Name = '".$name."'");
				    if(!$check->num_rows){
                        $info = $db->query("SELECT * FROM login WHERE Name = '".$name."'");
                        $i = mysqli_fetch_assoc($info);
                        if($insert = $db->query("INSERT INTO $cat (Name,Contact) VALUES('{$i['Name']}','{$i['Contact']}')")){
                            echo('Thank You for registering');
                        }
                        else{
                            echo('Currently registering problems.Retry logging in again.');
                        }
                    }
                    else{
                        echo("You are already registered");
                    }
                }
                else{
                    $check = $db->query("SELECT * FROM $cat WHERE Name = '".$name."'");
				    if(!$check->num_rows){
                        $info = $db->query("SELECT * FROM login WHERE Name = '".$name."'");
                        $i = mysqli_fetch_assoc($info);
                        if($insert = $db->query("INSERT INTO $cat (Name,Contact) VALUES('{$i['Name']}','{$i['Contact']}')")){
                            echo('Thank You for registering');
                        }
                        else{
                            echo('Currently registering problems.Retry logging in again.');
                        }
                    }
                    else{
                        echo("You are already registered");
                    }
                }
            }
            else{
                echo("Login to continue");
            }
        }
    }
?>