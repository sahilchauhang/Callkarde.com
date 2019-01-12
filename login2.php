<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" href="loginphp.css">
</head>
<body>
<a href="index.html"><img src="assets/images/logo.jpg" height="100" width="132" class="logo" align="left"></a>
<p><font color='white' size='4'>Welcome: </font>
	 <font color='#efed40' size='5'><b><?php echo $_SESSION['name']; ?></b></font></p>
     <a href='destroy.php'><button class='btn'>Logout</button></a>
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