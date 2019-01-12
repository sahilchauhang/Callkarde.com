<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "Callkarde";
$service = $_POST['service'];
$phone = $_POST['phone'];
$numbers='';
$name=$_SESSION["name"];
   /*if(empty($service))
	    echo "<script>alert('Please choose service.')</script>";
	    echo "<meta http-equiv='refresh' content='0.1;url=login.html'/>";*/
   if(!preg_match('/^[7-9][0-9]{9}$/', $phone) || empty($service))
   {
        echo "<script>alert('Please enter valid 10 digit Phone Number. or choose a service.')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=login2.php'/>";
	   
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

       $sql="SELECT * FROM details WHERE phoneno='$phone' and username='$name'";
       $res = $conn->query($sql);
       if($res->num_rows == 0)
       {
	      // header("Location: invalid.html");
          echo "<script>alert('You have entered wrong phone number.')</script>";
		  //header("Location: login.html");
          echo "<meta http-equiv='refresh' content='0.1;url=login2.php'/>";
       }
       else
       {
	     // Authorisation details.
	     $username = "sahil.aryan1997@gmail.com";
	      $hash = "414bd94a23e5748335fa502e65dab9a9b4d5a52018dade29c6fa170cf963a780";

	      // Config variables. Consult http://api.textlocal.in/docs for more info.
	      $test = "0";

	       // Data for text message. This is the text message data.
	      $sender = "TXTLCL";		  // This is who the message appears to be from.
		  if($service=='Mechanic')
		     $numbers = "8901122303"; // A single number or a comma-seperated list of number
		  if($service=='Stationary')
	         $numbers = "8979688655";
		  if($service=='Carpenter')
		     $numbers = "9149137048";
		  if($service=='Plumber')
			 $numbers = "9670462816";
          if($service=='Electrician')
	         $numbers = "7017387944";
          if($service=='Painter')
	         $numbers = "8901122303";
	      // 612 chars or less
	      // A single number or a comma-seperated list of numbers
		  //$numbers = "8901122303"; // A single number or a comma-seperated list of numbers
	      //$message = "Our Team will ".$phone." contact you soon.Thank you for using CallKarde.com.";
		  $message = "Please contact this phone number ".$phone." required for your service.";
	      $message = urlencode($message);
	      $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	      $ch = curl_init('http://api.textlocal.in/send/?');
	      curl_setopt($ch, CURLOPT_POST, true);
	      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	      $result = curl_exec($ch); // This is the result from the API
	      curl_close($ch);
	
	      //echo "<pre>";
	      //print_r($result);exit;
		 // echo $result;
		  echo "<style>.log{position: absolute;top: 30%;left: 50%;transform: translate(-50%,-50%);width: 750px;height: 150px;padding:40px 40px 40px 55px;box-sizing: border-box;background: rgba(0,0,0,.5);border-radius: 6px; }</style>";
		  echo "<a href='index.html'><img src='assets/images/logo.jpg' height='100' width='132' class='logo'></a>";
		  echo "<div class='log'>";
		  echo "<font color='white' size='5'>You requested for </font>"."<font color='#efed40' size='6'><b>".$service."</b></font>"."<font color='white' size='5'> our Team will contact you soon.</font>";
	      echo "</div>";
        }
	    $conn->close();
    } 
?>
<html>
<head>
<link rel="stylesheet" href="loginphp.css">
</head>
</html>