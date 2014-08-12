<?php
  session_start(); 
 
$code = trim($_POST['code']); 
if($code==$_SESSION["code"]){ 
   echo '1'; 
} 
?>