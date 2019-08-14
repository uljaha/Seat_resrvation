<?php

	$host="localhost";
	$username="root";
	$password="";
	$db_name="p1";
	
	$conn=mysqli_connect($host,$username,$password);
	if(!$conn)
	{
	echo("Database not connected");
	}
	if(!mysqli_select_db($conn,'p2'))
	{
		echo 'database no selected';
	}
	
	$FROM=$_POST['FROM'];
	$TO=$_POST['TO'];
    $myquery="insert into bus (Origin,Dest) values ('$FROM','$TO')";
	//echo '<table class="table table-striped table-bordered table-hover">';
	//echo "<tr>
		// <th>BUS_ID</th>
		 //<th>COST</th>
		 //</tr>";
	//while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	//{
		//echo "<tr><td>";
		//echo $row['bus_id'];
		//echo "</tr><?td>";
		//echo "<tr><td>";
		//echo $row['cost'];
		//echo "</tr><?td>";
	//}
//echo "</table>";
if(!mysqli_query($conn,$myquery))
{
	echo 'not inserted!!';
	}
else
{
	echo 'INSERTED';
}

		 
	
?>