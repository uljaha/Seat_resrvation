
<nav class="nav1">
    <ul>
	<li><a href="adminhome.php"><span>Home</span></a></li>
		<li><a href="addbus.php"><span>Add Buses</span></a></li>
		<li><a href="busview.php"><span>View Buses</span></a></li>             
		<li><a href="update.php"><span>Update Buses</span></a></li>
		<li><a href="logout.php"><span>Logout</span></a></li>
    </ul>
</nav> 
<?php
	include('config.php');
$busid=$_POST['busid'];
$busno=$_POST['busno'];
$origin=$_POST['origin'];
$dest=$_POST['dest'];
$numseats=40;
$dtime=$_POST['dtime'];
$atime=$_POST['atime'];
$ddate=$_POST['ddate'];
$adate=$_POST['adate'];
$cost=$_POST['cost'];
$seatlayout="0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0";
$availseats=40;
$insert_query="insert into bus(bus_id,bus_no,origin,destination,no_of_seats,depart_time,arrival_time,depart_date,arrival_date,cost,seat_layout,avail_seats) values
('$busid','$busno','$origin','$dest',$numseats,'$dtime','$atime','$ddate','$adate',$cost,'$seatlayout',$availseats)";
//$result=mysqli_query($conn,$insert_query);
	$result=mysqli_query($conn,$insert_query) or die("This bus already exists!!! Change the bus id and try again");
	if($result)
	{
		//echo("error description:".mysqli_error(mysqli_query($conn,$insert_query)));
		echo "New bus added";
		echo "<br>"."<a href='addbus.php'>Add few more buses</a>"."<br>";
		echo "<a href='adminhome.php'>Return to home page</a>"."<br>";
	}
?>