<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>
	<style>.container{position:absolute;top:200;left:60;}</style>

<?php
session_start();

echo "<style>".
"body{
	background-image:url(c.jpg);
	background-size:100%;
	background-position:center;
}"."</style>";
	include('config.php');
	$pnr=$_GET['cancelseat'];
	//$_SESSION['pnr']=$pnr;
	$query="select * from passenger where pnr=$pnr";
	$res=mysqli_query($conn,$query) or die(mysqli_error($conn));
	//$res=$conn->query($query);
	$num=mysqli_affected_rows($conn);
	
	
$i=1;
if($num>0)
{
	echo '<div class="container">';
	echo "<font color='red' size='6'>"."Ticket Cancellation"."</font>";
	echo '<table class="table" border="3" style="background-color:white">
	<tr>
	<th>slno</th>
	<th>Passenger ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>Age</th>
	<th>Gender</th>
	<th>Bus ID</th>
	<th>Seat No</th>
	<th>Board Point</th>
	</tr>';
while($row=$res->fetch_assoc()) 
{
	$pasid=$row['pnr'];
	$name=$row['name'];
	$phone=$row['phone'];
	$email=$row['email'];
	$age=$row['age'];
	$gender=$row['gender'];
	$tripcode=$row['trip_code'];
	$board=$row['board_point'];
	$seat=$row['seat_no'];
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$pasid.'</td>
	<td>'.$name.'</td>
	<td>'.$email.'</td>
	<td>'.$phone.'</td>
	<td>'.$age.'</td>
	<td>'.$gender.'</td>
	<td>'.$tripcode.'</td>
	<td>'.$seat.'</td>
	<td>'.$board.'</td>
	</tr>';
		}
	echo "</table>"; 
	//echo $pnr;
	//echo $busid;
	$_SESSION['tripcode']=$tripcode;
	$_SESSION['seat']=$seat;
	//echo $_SESSION['busid'];
	echo '<form method="get" action="cancelconfirm.php"><button class="btn btn-success btn-xs" name="pnr" value="'.$pnr.'" >Confirm</button></form>';
	echo '<form method="get" action="cancelerror.php"><button class="btn btn-danger btn-xs" name="san" value="'.$pnr.'">Its Not You??</button></form>';
}
else
 {
	 echo "<font color='red' size='5'>"."No passenger details found matching your PNR"."</font>";
	 echo '<form method="get" action="cancel.php"><button class="btn btn-danger btn-xs" name="pnr" value="'.$pnr.'" >TRY AGAIN</button></form>';
 }
 echo "</div>";
	?>	
