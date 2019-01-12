
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
	 header("Location: login2.php");
$conn->close();
}
?>