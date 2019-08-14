<?php
	include('config.php');
?>
<html>

<head>
<style>
body{
	background-image:url("shutterstock.jpg");
	background-position: bottom;
			background-repeat:no-repeat;
			background-size:100%;
			position:fixed;
}
</style>


</head>
<body>

<font color='white'size='5.3'>BUS RESERVATION SYSTEM
<br><br><br><br>
<font color='green' size='5'>
<b>
<nav>
<ul>
<li><a href="admin.php">Admin</a></li>
<li><a href="user_page.php">User</a></li>
<li><a href="cancel.php">Cancel My Ticket</a></li>
<li><a href="rating.php">Rate bus</a></li>
<li><a href="user.php">Log Out</a></li>
</ul>
</nav>
</b>
</font>
<?php
$r1=mysqli_query($conn,"select distinct origin from bus");
$r2=mysqli_query($conn,"select distinct destination from bus");
echo "<br><br><br><br><br>";
echo "<form action='query2.php' method='POST' style='width: 15000px;'>";

echo "<font color='white' size='4'><b>"."FROM"."</b></font>"."<select name='FROM'>";
	echo "<option selected disabled>Select</option>";
	while($row=mysqli_fetch_array($r1))
	{
		echo "<option value='".$row['origin']."'>".$row['origin']."</option>";
	}
	echo "</select>"."<br><br><br>";
	
echo "<font color='white' size='4'><b>"."TO"."</b></font>"."<select name='TO'>";
	echo "<option selected disabled>Select</option>";
	while($row=mysqli_fetch_array($r2))
	{
		echo "<option value='".$row['destination']."'>".$row['destination']."</option>";
	}
	echo "</select>"."<br><br><br>";
	$today=date("Y-m-d");
   echo "<font color='white' size='4'><b>"."DATE OF JOURNEY:"."</b></font>"."<input type='date' name='Day' min=$today />"."<br><br>";
   echo "<input type='submit' value='Submit'/>"."</form>";
   echo "</body>"."</html>";
?>