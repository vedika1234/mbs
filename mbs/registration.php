<!DOCTYPE HTML>
<?php
error_reporting(0);
ini_set('display_errors',false);


$conn=mysql_connect('localhost','root','','mbs');
if(!$conn)
{
die("ERROR: Could not Connect To The MySql Server.". mysql_connect_error());
}

mysql_select_db('mbs');

$f_name=$l_name=$mobilenumber=$email=$username=$password=" ";

if($_POST){


  if(empty($_POST["f_name"])){
      $f_nameerror="First Name is Required";
   }  
   else{
      $f_name=test_input($_POST["f_name"]); 
   }

if(empty($_POST["l_name"])){
  $l_nameerror="Last Name is Required";

}
else{
$l_name=test_input($_POST["l_name"]);
}




if(empty($_POST["mobilenumber"])){
        $mobilenumbererror="Mobile Number Is Required";

}

else{        
$mobilenumber=test_input($_POST["mobilenumber"]);
}



if(empty($_POST["email"])){
     $emailerror="Your Email Is Required";
}
else{
$email=test_input($_POST["email"]);
 if (!filter_var($email, FILTER_VALIDATE_EMAIL))

$emailerror="Please Enter A Valid Email Address";
}



if(empty($_POST["username"]))
{
$usernameerror="Your Username is Required";
}

else {

$sql='SELECT * FROM `login` WHERE username="'.$_POST['username'].'";';

$search=mysql_num_rows(mysql_query($sql));

$username=$_POST["username"];


if($search>0)
{
$usernameerror="This Username Has Already Been Taken";
}

else{
$username=$_POST["username"];
}



}



if(empty($_POST["password"]))
{
$passworderror="Please Enter a Password";
}
else 
{

$password=test_input($_POST["password"]);

}


if(!empty($f_nameerror)){ echo $f_nameerror; }
elseif(!empty($l_nameerror)){ echo $l_nameerror; }
elseif(!empty($mobilenumbererror)){ echo $mobilenumbererror; }
elseif(!empty($emailerror)){ echo $emailerror; }
elseif(!empty($usernameerror)){ echo $usernameerror; }
elseif(!empty($passworderror)){ echo $passworderror; }
else {

$first_name=mysql_real_escape_string($_POST["f_name"]);
$last_name=mysql_real_escape_string($_POST["l_name"]);
$mobilenumber=mysql_real_escape_string($_POST["mobilenumber"]);
$email=mysql_real_escape_string($_POST["email"]);
$username=mysql_real_escape_string($_POST["username"]);
$password=mysql_real_escape_string($_POST["password"]);

$sql="INSERT INTO `login` (`username`, `password`, `first_name`, `l_name`, `mobilenumber`, `email`) VALUES ('$username', '$password', '$first_name', '$last_name', '$mobilenumber', '$email');";
mysql_query($sql) or die(mysql_error());
echo "Account Created :)";
}

}

function test_input($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}


?>



<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>

<div class="registration-form">
<div class="form">

<form class="registration-form" action="" method="POST"> 
<input type="text" placeholder="First Name" name="f_name"/>
<input type="text" placeholder="Last Name" name="l_name"/>
<input type="text" placeholder="Mobile Number" name="mobilenumber"/>
<input type="text" placeholder="E-mail" name="email"/>
<input type="text" placeholder="Username" name="username"/>
<input type="password" placeholder="Password" name="password"/>
<button onclick="login.php"> Register</button>
<a href="login.php">Go To Login Page</a>
</form>
</div>
</div>
</body>
</html>

