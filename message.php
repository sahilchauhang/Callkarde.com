
<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$name=$_POST['txt1'];
$email=$_POST['txt2'];
$phone=$_POST['txt3'];
$message=$_POST['txt4'];

/*if (empty($name) || empty($phone) ||empty($email) || empty($message)) {
    echo "<script>alert('Please fill all the Fields.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=index.html'/>";
  }*/
 if( trim($email) == '' || trim($name) == '' || trim($phone) == '' || trim($message) == '')
{
	echo "<script>alert('Please fill the Fields Properly.')</script>";
    echo "<meta http-equiv='refresh' content='0.1;url=index.html'/>";
	
}
else if (!preg_match('/^[7-9][0-9]{9}$/', $phone))
	{
        echo "<script>alert('Please Enter valid 10 digit number.')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=index.html'/>";
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

$sql = "insert into message(Name,Email,PhoneNo,Message) values('$name','$email',$phone,'$message')";

if ($conn->query($sql) === TRUE) {
   // echo "Data inserted successfully <a href='login.html'>";
      //header("Location: message.html");
	  echo "<script>alert('We will contact you soon.')</script>";
     echo "<meta http-equiv='refresh' content='0.1;url=index.html'/>";
} else {
    echo "Error:" . $conn->error;
}

$conn->close();
}
?>
