
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$uname=$_POST['txt1'];
$pass=$_POST['txt2'];

$_SESSION["name"]=$uname;
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
 if( trim($uname) == '' || trim($pass) == '')
{
	echo "<script>alert('Please fill the Fields Properly.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=login.html'/>";
    
}
else 
{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
} 


$sql="SELECT * FROM details WHERE username='$uname' AND password = '$pass'";
$result = $conn->query($sql);
if($result->num_rows == 0)
{
	// header("Location: invalid.html");
       echo "<script>alert('Invalid E-mail/Password. Please try again.')</script>";
       echo "<meta http-equiv='refresh' content='0.1;url=login.html'/>";
}
else
	 echo "<style>input[type='submit']:hover{background: #DC143C;color: white;}input[type='submit']{margin-left:30px;background-color: #ff276e;border-radius: 4px;color: white;padding: 8px 16px;text-align: center;border: none;cursor: pointer;transition-duration: 0.4s;}.txt{margin-left:30px}.log{position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 1150px;height: 300px;padding:40px;box-sizing: border-box;background: rgba(0,0,0,.5);border-radius: 6px; }.rad{display:inline;margin-left:30px;font-size:20px;}p{margin-right:40px;margin-top:20px;text-align: right;}.btn{float:right;margin-right:40px;background-color: #ff276e;border-radius: 4px;color: white;padding: 8px 16px;text-align: center;border: none;cursor: pointer;transition-duration: 0.4s;}.btn:hover{background: #DC143C;color: white;}</style>";
	 echo "<html><body>";
	 echo "<p><font color='white' size='4'>Welcome: </font>";
	 echo "<font color='#efed40' size='5'><b>".$_SESSION['name']."</b></font></p>";
     echo "<a href='login.html'><button class='btn'>Logout</button></a>";
	 echo "</html></body>";
$conn->close();
}
?>
<html>
<head>
<link rel="stylesheet" href="loginphp.css">
</head>
<body>
<a href="index.html"><img src="assets/images/logo.jpg" height="100" width="132" class="logo"></a>
<div class="log">
<form method="post" action="sms.php">
<div class="rad">
<font color='white' size='4'><b>Choose service:</b></font>
<input type="radio" name="service" value="Mechanic"><font color='#efed40'><b>Mechanic</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="service" value="Stationary"><font color='#efed40'><b>Stationary</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="service" value="Carpenter"><font color='#efed40'><b>Carpenter</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="service" value="Plumber"><font color='#efed40'><b>Plumber</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="service" value="Electrician"><font color='#efed40'><b>Electrician</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="service" value="Painter"><font color='#efed40'><b>Painter</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
<div class="txt"><font color='white' size='4'><b>Registered Phone No:</b></font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phone"><br><br></div>
<input type="submit" value="Submit">
</div>
</form>
</div>
</body>
</html>