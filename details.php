<?php
include("connection.php");
include("session.php");


?>
<html>

<head>
<title>Hospital Management</title>
 <style>
		html{
				background: url('../stethoscope-1366x768.jpg')no-repeat center center fixed;
				-webkit-background-size:cover;
				-moz-background-size:cover;
				-o-background-size: cover;
				background-size: cover;

			}
	</style>




</head>

<body style="background-color:pink; font-size: 15px;">

<a href="#" style="margin-left:900px;"><?php echo $_SESSION['email']; ?></a><br>
<br>
<br>
<center>
<a href="patient.php" style="font-size:40px;">Make an Appointment</a>
<a href="details.php" style="font-size:40px;"  >View Appointment</a>
<a href="logout.php"  style="font-size:40px;"  >logout</a>
</center>
<div class="container" >


<center>

<h2>Appointments</h2>

 <table width="100%" colspan = "2" border = "5" cellspacing = "3">

 <tr>
   <th>Appointment Date</th>
   <th>Time</th>
   <th>Urgency</th>
   <th>status</th>
   <th>Action</th>
 </tr>


 <tr>

	<?php

	     $date = "";
		  $time = "";
		  $urgency = "";
		  $status = "";

	$email = $_SESSION['email'];
	  $query = "SELECT a.* FROM appointment a, patient p WHERE p.id = a.patientId AND p.email = '$email'";

	  $results = mysqli_query($conn,$query);

	  while($row = mysqli_fetch_array($results))
	  {
          $id = $row['id'];
		  $date = $row['date'];
		  $time = $row['time'];
		  $urgency = $row['urgency'];
		  $status = $row['status'];

		  ?>

	  <td><?php echo $date; ?></td>
	 <td><?php echo $time; ?></td>
	 <td><?php echo $urgency; ?></td>
	 <td><?php echo $status; ?></td>
	 <td><a href="cancel.php?id=<?php echo $id; ?>" >Cancel Appointment</a><br>

		  <?php
	  }

	?>

 </tr>


 </table>





</center>



</div>



<body>



</html>
