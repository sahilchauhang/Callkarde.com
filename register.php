
<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$uname = $_POST['txt0'];
$name=$_POST['txt1'];
$email=$_POST['txt2'];
$pass=$_POST['txt3'];
$phone=$_POST['txt4'];
$address=$_POST['txt5'];

if( trim($uname) == '' || trim($name) == '' || trim($pass) == '' || trim($address) == '')
{
	echo "<script>alert('Please fill the Fields Properly.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=register.html'/>";
	
}
else
{
if (!preg_match('/^[7-9][0-9]{9}$/', $phone))
{
        echo "<script>alert('Please enter valid 10 digit Phone Number.')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=register.html'/>";
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



$sql = "insert into details(Username,Name,Email,Password,PhoneNo,Address) values('$uname','$name','$email','$pass',$phone,'$address')";

if ($conn->query($sql) === TRUE) {
   // echo "Data inserted successfully <a href='login.html'>";
     // header("Location: reg_success.html");
	 echo "<script>alert('Registration Successfull.')</script>";
     echo "<meta http-equiv='refresh' content='0.1;url=login.html'/>";
}

 else
{
    //echo "Error:" . $conn->error;
	echo "<script>alert('Registration Unsuccessfull either due an error or Username is already taken.')</script>";
     echo "<meta http-equiv='refresh' content='0.1;url=register.html'/>";
}

$conn->close();
}
}
?>
