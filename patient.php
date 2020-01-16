<?php

include("connection.php");
include("session.php");

//Doctors Id 9705305721086

if(isset($_POST['save']))
{

	$email = $_SESSION['email'];
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$time = mysqli_real_escape_string($conn,$_POST['time']);
	$urgency = mysqli_real_escape_string($conn,$_POST['urgency']);
	$docId = 9705305721086;

	$patient = "";

	$sql = "SELECT `id` FROM `patient` WHERE `email` = '$email'";

	$query = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_array($query))
	{
		$patient = $row['id'];
	}

	$book = "INSERT INTO `appointment`(`date`, `time`, `urgency`, `status`, `patientId`, `doctorId`)
	VALUES('$date','$time','$urgency','Awaiting',$patient,$docId) ";

	if(mysqli_query($conn,$book))
	{
		header("location:details.php");
	}

}

?>
<html>

<head>

<title>Doctors_UNITE</title>
<div class="jumbotron jumbotron-fluid">
<h1 style="font-size:40px; background-color:white;text-align: center;color:blue;" >WELCOME TO winUCutie HOSPITAL</h1>

</div>




</head>

<body style="background-color:lightblue; font-size:40px;">


<a href="#" style="margin-left:900px;"><?php echo $_SESSION['email']; ?></a><br>
<br>
<br>
<center>
<a href="patient.php" style="font-size:40px;">Make an Appointment</a>
<a href="details.php" style="font-size:40px;"  >View Appointment</a>
<a href="logout.php"  style="font-size:40px;"  >logout</a>
<div class="container" >


<form class="form" method="post" action="patient.php">



<h2 style="color:white" >Make an Appointment</h2>

<div class="input-group">
<label>Check in Date</label></br>
<input type="date" name="date" id ="date" maxlength="11">
</div>
<div class="input-group">
</br>
<label>Check in Time</label></br>
<input type="time" name="time" id ="time" maxlength="11">
<br>
</div>


<div class="input-group">
<label>Emergency</label></br>

<select name="urgency">
<option value="High">High</option>
<option value="Normal">Normal</option>

</select>

</div>
<br>


<div class="button">
<input type="submit" name="save" value="Make Appointment">
</div>

</center>

</form>


</div>



<body>



</html>
