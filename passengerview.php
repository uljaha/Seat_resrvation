
<?php error_reporting($level = null);
session_start();
if(!$_SESSION['new']) 
{
header('Location:admin.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>


<style>
body{
	background-image:url(buss.jpg);
	background-size:100%;
	background-position:cover;
}

</style>


<nav class="nav1">
    <ul>
	<li><a href="adminhome.php"><span>Home</span></a></li>
		<li><a href="addbus1.php"><span>Add Buses</span></a></li>
		
<li><a href="passengerview.php"><span>View Passenger</span></a></li> 		
		<li><a href="logout.php"><span>Logout</span></a></li>
    </ul>
</nav>   

<div class="container">
<table class="table" border="3" style="background-color:white">
<tr>
<th>slno</th>
<th>PNR</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Age</th>
<th>Category</th>
<th>Gender</th>
<th>Trip Code</th>
<th>Seat No</th>
<th>Board Point</th>
</tr>


 <?php error_reporting($level = null);
include('config.php');

//$file=file_get_contents("san.txt");
$sqll="select * from passenger";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{
$pasid=$row['pnr'];
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
$age=$row['age'];
$agecat=$row['age_cat'];
$gender=$row['gender'];
$tripcode=$row['trip_code'];
$busno=$row['bus_no'];
$board=$row['board_point'];
$drop=$row['drop_point'];
$seat=$row['seat_no'];
echo '<tr>
<td>'.$i.'</td>
<td>'.$pasid.'</td>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$phone.'</td>
<td>'.$age.'</td>
<td>'.$agecat.'</td>
<td>'.$gender.'</td>
<td>'.$tripcode.'</td>
<td>'.$seat.'</td>
<td>'.$board.'</td>
</tr>';
    }
?> 

</table>

<h2 style="color: white;position:relative;top:50px;"></h2>	
</body>
</html>
