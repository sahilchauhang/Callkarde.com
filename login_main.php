<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<html>
<head>
   <meta charset="utf-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<a href="index.html"><img src="assets/images/logo.jpg" height="100" width="132" class="logo"></a>
 <div class="loginbox">
 <!--<img src="images\logo.jpg" class="user">-->
<h2>Log In Here</h2>
<form method="post" action="">
<p>Username</p>
<input type="text" name= "txt1" placeholder="Enter Here" required>
<p>Password</p>
<input type="password" name="txt2" placeholder="******" required>
<input type="submit" name="" value="Sign In">
<a href="forget.html">Forget  Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.html">Register</a>
</form>
 </div>
</body>
</html>