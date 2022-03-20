<?php
//    error_reporting(0);
//$db = new mysqli('localhost','ramana5166','dhanak2017','dhanak');
$db = new mysqli('127.0.0.1','root','','test');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>