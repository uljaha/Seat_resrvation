<!DOCTYPE html>
<html lang="en">
<head>

</style>
  <title>BOOK</title>
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
	background-image:url(rate.jpg);
	background-size:100%;
	background-position:cover;
}

</style>

<?php
include('config.php');

$r1=mysqli_query($conn,"select distinct bus_no from bus");
echo '<form method="post" action="rating2.php">';
echo "<font color='white' size='4'><b>"."BUS NO"."</b></font>"."<select name='busno'>";
	echo "<option selected disabled>Select</option>";
	while($row=mysqli_fetch_array($r1))
	{
		echo "<option value='".$row['bus_no']."'>".$row['bus_no']."</option>";
	}
	echo "</select>"."<br><br><br>";
echo "<font color='white' size='4'><b>"."Ratings"."</b></font>"."<select name='rate'>
<option selected disabled>select</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select><br><br>
<button class='btn btn-success' name='action' value='submit'>Rate</button>

<form>";
?>
