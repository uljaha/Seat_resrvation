
<?php error_reporting($level = null);
session_start();
if(!$_SESSION['new']) 
{
header('Location:admin.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>BUS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>

<div class="header"> 

</div>

<style>
body{
	background-image:url(u.jpg);
	background-size:100%;
	background-position:cover;
}

</style>

<nav class="nav1">
    <ul>
	<li><a href="adminhome.php"><span>Home</span></a></li>
		<li><a href="addbus1.php"><span>Add Buses</span></a></li>
		<li><a href="busview.php"><span>View Buses</span></a></li>
		<li><a href="passengerview.php"><span>View Passengers</span></a></li>
		<li><a href="logout.php"><span>Logout</span></a></li>
    </ul>
</nav>   

<div class="container">
<table class="table" border="3" style="background-color:white">
<tr>
<th>slno</th>
<th>Trip Code</th>
<th>Bus No</th>
<th>Origin</th>
<th>Destination</th>
<th>Total seats</th>
<th>Departure</th>
<th>Arrival</th>
<th>Cost</th>
<th>Available seats</th>

<th>delete bus</th>


</tr>


 <?php error_reporting($level = null);
include('config.php');

//$file=file_get_contents("san.txt");
$sqll="select trip_code,bus_no,origin,destination,no_of_seats,departure,arrival,cost,avail_seats from bus";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{
$tripcode=$row['trip_code'];
$busno=$row['bus_no'];
$origin=$row['origin'];
$destination=$row['destination'];
$numseats=$row['no_of_seats'];
$d=$row['departure'];
$a=$row['arrival'];
//$ddate=$row['depart_date'];
//$adate=$row['arrival_date'];
$cost=$row['cost'];
$avlseats=$row['avail_seats'];
echo '<tr>
<td>'.$i.'</td>
<td>'.$tripcode.'</td>
<td>'.$busno.'</td>
<td>'.$origin.'</td>
<td>'.$destination.'</td>
<td>'.$numseats.'</td>
<td>'.$d.'</td>
<td>'.$a.'</td>
<td>'.$cost.'</td>
<td>'.$avlseats.'</td>
<td><form method="get" action="delete.php"><button class="btn btn-danger btn-xs" name="san" value="'.$tripcode.'">x</button></form></td>
</tr>';$i++;
    }
?> 

</table>
</div> 

</div>
<h2 style="color: white;position:relative;top:50px;"></h2>	
</body>
</html>
