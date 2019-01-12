
<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$email=$_POST['txt1'];
$pass=$_POST['txt2'];

 if( trim($email) == '' || trim($pass) == '')
{
	echo "<script>alert('Please fill the Fields Properly.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=setpass.html'/>";
	
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
$sql = "UPDATE details SET password='$pass' WHERE email='$email'";
$result = $conn->query($sql);
if(!$result)
	 header("Location: invalid.html");
else
	 echo "<script>alert('Record updated Successfully')</script>";
     echo "<meta http-equiv='refresh' content='0.1;url=login.html'/>";    
    // header("Location: login.html");
$conn->close();
}
?>
