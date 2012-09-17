<?php

include('/includes.php');

if(mysql_num_rows(mysql_query("SELECT * from users WHERE username='" . $_POST['username'] . "'")) == 1){
   header("location:/register.php?nav=register&error=1");
}
else if($_POST['password'] != $_POST['retype-password']){
   header("location:/register.php?nav=register&error=2");
}
else if(strlen($_POST['username']) > 15){
   header("location:/register.php?nav=register&error=3");
}
else if(strlen($_POST['username']) < 6){
   header("location:/register.php?nav=register&error=4");
}
else if(strlen($_POST['password']) > 15){
   header("location:/register.php?nav=register&error=5");
}
else if(strlen($_POST['password']) < 6){
   header("location:/register.php?nav=register&error=6");
}
else if(preg_match('/[^0-9A-Za-z]/',$_POST['username'])){
   header("location:/register.php?nav=register&error=7");
}
else if(preg_match('/[^0-9A-Za-z]/',$_POST['password'])){
   header("location:/register.php?nav=register&error=8");
}
else{
   mysql_query("INSERT into users VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$companyid."')") or die(mysql_error());
   header("location:/register.php?nav=register&error=9");
}
?>