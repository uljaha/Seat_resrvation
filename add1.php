
    <table cellspacing="0" cellpadding="15">
	<tr><td><a href="adminhome.php"><span><font size="5">Home</font></span></a></td>
		<td><a href="addbus.php"><span><font size="5">Add Buses</font></span></a></td>
		<td><a href="busview.php"><span><font size="5">View Buses</font></span></a></td>            
		<td><a href="update.php"><span><font size="5">Update  Buses</font></span></a></td>
		<td><a href="logout.php"><span><font size="5">Logout</span></font></a></li><tr></td></font>
    </table>
<?php
echo "<style>".
"body{
	background-image:url(travel1.jpg);
	background-size:100%;
	background-position:bottom;
}"."</style>";
session_start();
	include('config.php');
$tripcode=$_POST['tripcode'];
$_SESSION['tripcode']=$tripcode;
$busno=$_POST['busno'];
$origin=$_POST['origin'];
$dest=$_POST['dest'];
$numseats=40;
$d=$_POST['dtime'];
$a=$_POST['atime'];
//$ddate=$_POST['ddate'];
//$adate=$_POST['adate'];
$cost=$_POST['cost'];
$seatlayout="0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0";
$availseats=40;
$insert_query="insert into bus(trip_code,bus_no,origin,destination,no_of_seats,departure,arrival,cost,seat_layout,avail_seats) values
('$tripcode','$busno','$origin','$dest',$numseats,'$d','$a',$cost,'$seatlayout',$availseats)";
//$result=mysqli_query($conn,$insert_query);

//$rate="select * from rating where bus_no='$busno'";
//$rating=mysqli_query($conn,$rate) or die(mysqli_error($conn));
//$rated=mysqli_num_rows(mysqli_query($conn,$rate));
//if($rated==0)
//{
	//$rate1="insert into rating values ('$bus_no',0)";
    //$rating1=mysqli_query($conn,$rate) or die(mysqli_error($conn));
	
//}


echo "<font color='yellow' size='8'>";
	$result=mysqli_query($conn,$insert_query) or die("This bus already exists!!! Change the bus id and try again");
	if($result)
	{
		//echo("error description:".mysqli_error(mysqli_query($conn,$insert_query)));
		header("Location:board.php");
	}
	echo "</font>";
		//echo "<br>"."<a href='addbus.php'>Add few more buses</a>"."<br>";
		//echo "<a href='adminhome.php'>Return to home page</a>"."<br>";
	
?>