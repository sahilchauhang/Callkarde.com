
<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$phone=$_POST['txt1'];

 if( trim($phone) == '')
{
	echo "<script>alert('Please fill the Fields Properly.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=forget.html'/>";
	
}
else if (!preg_match('/^[7-9][0-9]{9}$/', $phone))
	{
        echo "<script>alert('Please enter valid 10 digit Phone Number.')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=forget.html'/>";
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


$sql="SELECT * FROM details WHERE phoneno='$phone'";
$result = $conn->query($sql);
if($result->num_rows == 0)
	 header("Location: invalid.html");
else
	 header("Location: setpass.html");
$conn->close();
}
?>
